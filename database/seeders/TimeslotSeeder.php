<?php

namespace Database\Seeders;

use App\Models\Timeslot;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Label84\HoursHelper\Facades\HoursHelper;

class TimeslotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
//        $startDateTime = '2024-03-28 09:00';
//        $endDateTime = '2024-04-1 21:00';

        $today = date('Y-m-d');

        // Set the start time to 9:00 AM
        $startDateTime = $today . ' 09:00';

        // Calculate the end date by adding 3 days to today's date
        $endDate = date('Y-m-d', strtotime($today . ' + 3 days'));

        // Set the end time to 9:00 PM
        $endDateTime = $endDate . ' 21:00';


        $interval = 20;
        $format = 'Y-m-d H:i';

        $timeslots = [];

        $startDate = Carbon::createFromFormat($format, $startDateTime)->startOfDay();
        $endDate = Carbon::createFromFormat($format, $endDateTime)->startOfDay();

// Iterate over each day within the date range
        for ($date = $startDate; $date <= $endDate; $date->addDay()) {
            // Generate time slots from 9am to 9pm for the current day
            $dayStart = $date->copy()->setHour(9)->setMinute(0);
            $dayEnd = $date->copy()->setHour(20)->setMinute(40); // 9pm

            // Create time slots for the current day
            $dayTimeSlots = HoursHelper::create($dayStart, $dayEnd, $interval, $format);

            // Merge the time slots for the current day with the overall time slots
            $timeslots = array_merge($timeslots, $dayTimeSlots->toArray());
        }

        foreach ($timeslots as $startTime) {

            $endTime = (new \DateTime($startTime))->modify("+20 minutes")->format('Y-m-d H:i');
            Timeslot::create([
                'start_time' => $startTime,
                'end_time' => $endTime,
                'booked_count' => 0,
            ]);
        }
    }
}
