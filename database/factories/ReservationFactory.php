<?php

namespace Database\Factories;

use App\Models\Service;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reservation>
 */
class ReservationFactory extends Factory
{
    public function definition(): array
    {
        $usersCount = User::count();
        $servicesCount = Service::count();
        $reservationDateTime = $this->faker->dateTimeBetween('-1 month', '+1 month');


        return [
           'user_id'=>fake()->numberBetween(1, $usersCount),
            'service_id'=>fake()->numberBetween(1, $servicesCount),
            'reservation_date'=>$reservationDateTime->format('Y-m-d'),
            'reservation_time'=>$reservationDateTime->format('H:i:s'),
            'tracking_code'=>random_int(1000,9000000),
        ];
    }
}
