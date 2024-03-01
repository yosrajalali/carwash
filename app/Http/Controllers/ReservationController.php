<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeReservationRequest;
use App\Models\Reservation;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ReservationController extends Controller
{

    public function create($id)
    {
        $service_id = $id;
        return view('reservations.create', compact('service_id'));
    }

    public function store(storeReservationRequest $request)
    {
        $trackingCode = random_int(1000,9000000);

        $validated = $request->validated();
        $service_id = intval($request->input('service_id'));

        $user = User::where('phone_number', $validated['phone_number'])->first();

        if (!$user) {
            $user = User::query()->create([
                'first_name' => $validated['first_name'],
                'last_name' => $validated['last_name'],
                'phone_number' => $validated['phone_number'],
            ]);
        }


        $reservation = new Reservation();
        $reservation-> reservation_date =  $validated['reservation_date'];
        $reservation-> reservation_time =  $validated['reservation_time'];
        $reservation-> service_id =  $service_id;
        $reservation-> tracking_code =  $trackingCode;
        $user->reservations()->save($reservation);

        $user_id = $user->id;

        return redirect()->route('home.index', ['user_id' => $user_id])->with('tracking_code', $trackingCode);
    }
}
