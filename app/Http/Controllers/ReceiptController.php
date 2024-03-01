<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;

class ReceiptController extends Controller
{
    public function show($user_id)
    {
        $user = User::findOrFail($user_id);
        $reservations = $user->reservations;
        return view('receipt.show', compact('reservations', 'user'));
    }
}
