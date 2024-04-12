<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function index(Request $request)
    {
        $query = Reservation::with(['user', 'service']);

        if ($request->filled('time')) {

            $time = $request->input('time');
            // Convert the DateTime to string in a format suitable for LIKE comparison
            $timeString = date('Y-m-d', strtotime($time));

            $query->where('reservation_time', 'LIKE', '%' . $timeString . '%');
        }

        if ($request->filled('service')) {

            $service = $request->input('service');

            $query->where('service_id', 'LIKE', '%' . $service . '%');
        }

        $userCount = User::count();
        $reservationCount = $query->count();
        $reservations = $query->paginate(10);
        $user = Auth::user();

        return view('admin.reservations.index', compact('reservations', 'user', 'reservationCount', 'userCount'));
    }
}
