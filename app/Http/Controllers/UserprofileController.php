<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileRequest;
use App\Models\Reservation;
use App\Models\Timeslot;
use App\Models\User;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserprofileController extends Controller
{

    public function show()
    {
        $user = Auth::user();
        $reservations = Reservation::query()->where('user_id', $user->id)->get();

        $earliestTimeSlot = Timeslot::query()
            ->where('start_time', '>=', now())
            ->where('booked_count', '<', 2)
            ->orderBy('start_time')
            ->value('start_time');

        $service_id = 1;
        if ($service_id == 1) {
            $availableTimeSlots = Timeslot::where('booked_count', '<', 2)
                ->get();
        } elseif ($service_id == 2 || $service_id == 3) {
            $interval = $service_id == 2 ? 40 : 60;

            $availableTimeSlots = Timeslot::whereIn('start_time', function ($query) use ($interval) {
                $query->select(DB::raw("TIMESTAMPADD(MINUTE, $interval * (t.rn - 1), (SELECT MIN(start_time) FROM timeslots)) AS target_time"))
                    ->from(DB::raw('(SELECT ROW_NUMBER() OVER (ORDER BY start_time) AS rn FROM timeslots) as t'));
            })
                ->where('booked_count', '<', 2)
                ->get();
        } else {
            abort(404);
        }

        if (Auth::check()){
            return view('profile.show', compact('user','reservations', 'availableTimeSlots', 'earliestTimeSlot'));
        }
        else {
            return redirect()->route('login.show')->with('error','Please log in to proceed with your reservation.');
        }
//        return view('profile.show',compact('user', 'reservations'));
    }

    public function edit()
    {

    }

    /**
     * @throws AuthorizationException
     */
    public function update(UpdateProfileRequest $request)
    {
        $user = Auth::user();
        $this->authorize('update', $user);
        $user->update($request->all());
        return redirect()->route('home.index')->with('success', 'Profile updated successfully.');
    }
}
