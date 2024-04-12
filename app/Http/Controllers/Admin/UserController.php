<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with(['reservations' => function($query) {
            $query->where('reservation_time', '>=', Carbon::now()->subMonths(3));
        }])->paginate(10);

        // Assign colors and activity status to each user
        $users->each(function($user) {
            $activityCount = $user->reservations->count();
            $user->activity_status = $this->determineActivityStatus($activityCount);
            $user->activity_status_color = $this->determineActivityStatusColor($user->activity_status);
            $user->total_payments = $user->reservations->sum('service.price');
            $user->last_service_used_at = $user->reservations->max('reservation_time') ?? 'N/A';
        });

        $reservationCount = Reservation::count();
        $usersCount = User::count();

        return view('admin.users.index', compact('users', 'reservationCount', 'usersCount'));
    }

    public function show($id)
    {
        $user = User::with(['reservations.service'])->findOrFail($id);
        $user->total_payments = $user->reservations->sum('service.price');
        $user->last_service_used_at = $user->reservations->max('reservation_time') ?? 'N/A';
        $activityCount = $user->reservations->count();
        $user->activity_status = $this->determineActivityStatus($activityCount);
        $user->activity_status_color = $this->determineActivityStatusColor($user->activity_status);

        return view('admin.users.show', compact('user'));
    }

    private function determineActivityStatus($activityCount)
    {
        if ($activityCount > 5) {
            return 'Active';
        } elseif ($activityCount >= 2) {
            return 'Moderately Active';
        } else {
            return 'Inactive';
        }
    }

    private function determineActivityStatusColor($activityStatus)
    {
        return match($activityStatus) {
            'Active' => 'green',
            'Moderately Active' => 'orange',
            'Inactive' => 'red',
            default => 'black',
        };
    }
}
