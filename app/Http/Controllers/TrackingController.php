<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeTrackingRequest;
use App\Models\Reservation;
use Illuminate\Http\Request;

class TrackingController extends Controller
{
    public function index()
    {
        return view('tracking.index');

    }

    public function store(storeTrackingRequest $request)
    {
        $validated = $request->validated();

        $reservation = Reservation::query()
            ->where('tracking_code', $validated['tracking_code'])
            ->first();



        if (!$reservation) {

            return redirect()->back()->withInput()->with('fail', 'No reservation found.');
        }
        $phoneNumber = $reservation->user->phone_number;

        if (!$phoneNumber){
            return redirect()->back()->withInput()->with('fail', 'No reservation found.');
        }

        return redirect()->route('reservation.show', $reservation->id);

    }
}
