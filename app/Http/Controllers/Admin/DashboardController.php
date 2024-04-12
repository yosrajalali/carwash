<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $reservationCount = Reservation::count();
        $usersCount = User::count();
        return view('admin.dashboard.index', compact('user', 'reservationCount', 'usersCount'));
    }
}
