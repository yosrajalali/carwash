<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeReservationRequest;
use App\Http\Requests\storeUpdateRequest;
use App\Models\Reservation;
use App\Models\Service;
use App\Models\Timeslot;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Label84\HoursHelper\Facades\HoursHelper;
use Ramsey\Uuid\Type\Time;

class ReservationController extends Controller
{
    public function create($id)
    {
        $service_id = $id;
        $service = Service::findOrFail($id);
        $durationMinutes = $service->duration_minutes;

        $currentTime = now();


        if ($durationMinutes == 20) {
            $availableTimeSlots = TimeSlot::where('booked_count', '<', 2)
                ->where('start_time', '>', $currentTime)
                ->get();
        }

        if ($durationMinutes == 40 ){
            $availableTimeSlots = $this->getTimeSlotsWith40MinuteIntervals();
        }

        if ($durationMinutes == 60 ){
            $availableTimeSlots = $this->getTimeSlotsWith60MinuteIntervals();
        }



        $earliestTimeSlot = $availableTimeSlots->min('start_time') ?? null;

        if (Auth::check()) {
            return view('reservations.create', compact('service_id', 'earliestTimeSlot', 'availableTimeSlots'));
        } else {
            return redirect()->route('login.show')->with('error', 'Please log in to proceed with your reservation.');
        }
    }

    public function getTimeSlotsWith40MinuteIntervals()
    {
        // Get the current time
        $now = Carbon::now();

        // Fetch all TimeSlots that start after the current time, ordered by start_time
        $timeSlots = TimeSlot::where('start_time', '>', $now)
//            ->where('booked_count', '<', 2)
            ->orderBy('start_time', 'asc')
            ->get();

        // Group TimeSlots by their date
        $groupedByDate = $timeSlots->groupBy(function ($timeSlot) {
            return Carbon::parse($timeSlot->start_time)->format('Y-m-d');
        });

        $filteredSlots = collect();

        // Iterate over each group and filter based on the 40-minute interval
        foreach ($groupedByDate as $date => $slots) {
            $previousTime = null;
            foreach ($slots as $slot) {
                if (!$previousTime || Carbon::parse($slot->start_time)->diffInMinutes($previousTime) >= 40) {
                    $filteredSlots->push($slot);
                    $previousTime = Carbon::parse($slot->start_time);
                }
            }
        }

        // Additional filtering to ensure no time slots before 'now' are included
        // This might be redundant due to the initial query condition but ensures robustness
        $filteredAndFutureSlots = $filteredSlots->filter(function ($slot) use ($now) {
            return Carbon::parse($slot->start_time)->isFuture();
        });

        return $filteredAndFutureSlots;
    }

    public function getTimeSlotsWith60MinuteIntervals()
    {

        $now = Carbon::now();
        if ($now->minute > 0) {
            $now = $now->copy()->addHour(0)->startOfHour(); // Ensure we're working with a copy to avoid modifying the original instance
        }

        // Fetch all TimeSlots that start after the current time, ordered by start_time
        $timeSlots = TimeSlot::where('start_time', '>', $now)
            ->orderBy('start_time', 'asc')
            ->get();

        // Filter out TimeSlots that do not start on the hour
        $onTheHourSlots = $timeSlots->filter(function ($timeSlot) {
            return Carbon::parse($timeSlot->start_time)->format('i') == '00';
        });

        // Group TimeSlots by their date
        $groupedByDate = $onTheHourSlots->groupBy(function ($timeSlot) {
            return Carbon::parse($timeSlot->start_time)->format('Y-m-d');
        });

        $filteredSlots = collect();

        // Iterate over each group and filter based on the 60-minute interval
        foreach ($groupedByDate as $date => $slots) {
            $previousTime = null;
            foreach ($slots as $slot) {
                if (!$previousTime || Carbon::parse($slot->start_time)->diffInMinutes($previousTime) >= 60) {
                    $filteredSlots->push($slot);
                    $previousTime = Carbon::parse($slot->start_time);
                }
            }
        }

        return $filteredSlots;
    }

    public function edit($id)
    {
        $reservation = Reservation::findOrFail($id);
        $currentTime = Carbon::now();
        $reservationTime = Carbon::parse($reservation->reservation_time);
        $service_id = $reservation->service_id;
        $services = Service::all();
        $user = Auth::user();
        $availableTimeSlots = collect(); // Default to an empty collection
        $service = $reservation->service;

        if ($reservationTime->subDay()->lessThan($currentTime)) {
            return redirect()->back()->with('error', 'You cannot edit this reservation less than 24 hours before the scheduled time.');
        }


        $durationMinutes = $service->duration_minutes;
        if ($durationMinutes == 20) {
            $slots = TimeSlot::where('start_time', '>', $currentTime)
                ->get();
            $availableTimeSlots = collect($slots);
        } elseif ($durationMinutes == 40) {
            $availableTimeSlots = collect($this->getTimeSlotsWith40MinuteIntervals());
        } elseif ($durationMinutes == 60) {
            $availableTimeSlots = $this->getTimeSlotsWith60MinuteIntervals();
        }


        // Filter the available time slots to get only those that start after the current time
        $availableTimeSlotsAfterNow = $availableTimeSlots->filter(function ($timeSlot) use ($currentTime) {
            return $timeSlot->start_time >= $currentTime && $timeSlot->booked_count < 2;
        });

        $earliestTimeSlot = $availableTimeSlotsAfterNow->min(function ($timeSlot) {
            return $timeSlot->start_time;
        });


        return view('reservations.edit', compact('reservation', 'services', 'availableTimeSlots', 'earliestTimeSlot', 'service_id', 'user'));
    }


    public function store(storeReservationRequest $request)
    {

        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'You need to be logged in to make a reservation.');
        }

        $validated = $request->validated();

        $service = Service::findOrFail($validated['service_id']);

        $user = auth()->user();
        $timeSlot = Timeslot::where('start_time', $validated['reservation_time'])->first();
        $durationMinutes = $service->duration_minutes;
        $neededSlots = $durationMinutes / 20;

        $trackingCode = random_int(1000,9000000);

        // Verify the availability of consecutive time slots
        $availableSlots = TimeSlot::where('start_time', '>=', $timeSlot->start_time)
            ->orderBy('start_time', 'asc')
            ->take($neededSlots)
            ->get();

        if ($availableSlots->count() < $neededSlots || $availableSlots->where('booked_count', '>=', 2)->count() > 0) {

            return redirect()->back()->withInput()->with('not_available', 'The selected time slot is not available.');

        }

        DB::beginTransaction();
        try {
            foreach ($availableSlots as $slot) {
                $slot->increment('booked_count');
            }

            $reservation = new Reservation();
            $reservation-> reservation_time =  $validated['reservation_time'];
            $reservation-> service_id =  $validated['service_id'];
            $reservation-> tracking_code =  $trackingCode;
            $reservation->time_slot_id = $timeSlot->id;

            $user->reservations()->save($reservation);


            DB::commit();
            return redirect()->route('home.index', ['user_id' => $user->id])->with('tracking_code', $trackingCode);
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'An error occurred while creating the reservation.');
        }
    }


    public function show($id)
    {
        $reservation = Reservation::findOrFail($id);
//        $service_id = $reservation->service_id;
        $service_id = $id;

        return view('reservations.show', compact('reservation', 'service_id'));
    }

    public function update(Request $request, $reservationId)
    {
        if (!auth()->check()) {
            return redirect()->route('login.show')->with('error', 'You need to be logged in to make a reservation.');
        }

        $newReservationTime = $request->reservation_time;
        $newServiceId = $request->service_id;
        $currentReservation = Reservation::findOrFail($reservationId);
        $currentTime = Carbon::now();

        $newTimeSlot = TimeSlot::where('start_time', $newReservationTime)->first();
//        dd($newTimeSlot->id, $currentReservation->time_slot_id);

        if($newTimeSlot->id != $currentReservation->time_slot_id){
            if (!$newTimeSlot || $newTimeSlot->booked_count >= 2) {
                return redirect()->back()->with('error', 'This time slot is not available.');
            }
        }


        if (Carbon::parse($newTimeSlot->start_time)->lessThan($currentTime)) {
            return redirect()->back()->with('error', 'You cannot book a time slot in the past.');
        }

        DB::beginTransaction();
        try {
//            decrease the booked_count based on the previous service
            $this->adjustBookedCountForPreviousService($currentReservation);

//            increase the booked_count based on the new service
            $this->adjustBookedCountForNewService($newTimeSlot, $newServiceId);


//            update reservation
            $currentReservation->reservation_time = $newReservationTime;
            $currentReservation->service_id = $newServiceId;
            $currentReservation->save();


            DB::commit();
            return redirect()->route('profile.show', $reservationId)->with('success', 'Reservation successfully updated.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'An error occurred while updating the reservation.');
        }
    }





    public function destroy($id)
    {
        $reservation = Reservation::findOrFail($id);
        $currentTime = Carbon::now();
        $reservationTime = $reservation->reservation_time;
        $serviceId = $reservation->service_id;


        if ($currentTime->diffInHours($reservationTime, false) < 24) {
            return redirect()->back()->with('error', 'You cannot cancel this reservation less than 24 hours before the scheduled time.');
        }

        DB::beginTransaction();
        try {
            // کاهش booked_count برای تایم اسلات‌های مرتبط با سرویس
            $this->adjustBookedCountForCancellation($reservationTime, $serviceId);

            $reservation->delete();

            DB::commit();
            return redirect()->back()->with('success', 'Reservation successfully cancelled.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'An error occurred while cancelling the reservation.');
        }
    }


    private function adjustBookedCountForPreviousService($reservation)
    {
        $serviceId = $reservation->service_id;
        $reservationTime = $reservation->reservation_time;
        $incrementMinutes = $this->getServiceTimeIncrement($serviceId);

        $slotsToAdjust = TimeSlot::where('start_time', '>=', $reservationTime)
            ->orderBy('start_time', 'asc')
            ->take($incrementMinutes / 20)
            ->get();

        foreach ($slotsToAdjust as $slot) {
            if ($slot->booked_count > 0) {
                $slot->decrement('booked_count');
            }
        }
    }

    private function adjustBookedCountForNewService($newTimeSlot, $newServiceId)
    {
        $incrementMinutes = $this->getServiceTimeIncrement($newServiceId);

        $slotsToAdjust = TimeSlot::where('start_time', '>=', $newTimeSlot->start_time)
            ->orderBy('start_time', 'asc')
            ->take($incrementMinutes / 20)
            ->get();

        foreach ($slotsToAdjust as $slot) {
            if ($slot->booked_count < 2) {
                $slot->increment('booked_count');
            }
        }
    }

    private function adjustBookedCountForCancellation($reservationTime, $serviceId)
    {
        $incrementMinutes = $this->getServiceTimeIncrement($serviceId);
        $slotsNeeded = $incrementMinutes / 20;

        $slotsToAdjust = TimeSlot::where('start_time', '>=', $reservationTime)
            ->orderBy('start_time', 'asc')
            ->take($slotsNeeded)
            ->get();

        foreach ($slotsToAdjust as $slot) {
            if ($slot->booked_count > 0) {
                $slot->decrement('booked_count');
            }
        }
    }


    private function getServiceTimeIncrement($serviceId)
    {
        switch ($serviceId) {
            case 1:
                return 20;
            case 2:
                return 40;
            case 3:
                return 60;
            default:
                return 0;
        }
    }

    public function getTimeSlots(Request $request)
    {
        $serviceId = $request->service_id;
        $service = Service::findOrFail($serviceId);
        $durationMinutes = $service->duration_minutes;
        $currentTime = Carbon::now();
        $availableTimeSlots = collect(); // Default to an empty collection

        if ($durationMinutes == 20) {
            $slots = TimeSlot::where('start_time', '>', $currentTime)
                ->get();
            $availableTimeSlots = collect($slots);
        } elseif ($durationMinutes == 40) {
            $availableTimeSlots = collect($this->getTimeSlotsWith40MinuteIntervals());
        } elseif ($durationMinutes == 60) {
            $availableTimeSlots = $this->getTimeSlotsWith60MinuteIntervals();
        }

        // Use toJson() for explicit conversion and manual formatting
        $formattedSlots = $availableTimeSlots->map(function ($slot) {
            // Ensure $slot is an object. Adjust based on actual structure if necessary
            $slot->start_time = Carbon::parse($slot->start_time)->format('Y-m-d H:i:s');
            return $slot;
        });

        // Directly return a collection or array as JSON
        return response()->json($formattedSlots);
    }
}
