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
        $userId = User::query()->inRandomOrder()->value('id');
        $serviceId = Service::query()->inRandomOrder()->value('id');

        if (is_null($userId) || is_null($serviceId)) {
            throw new \Exception('Users and Services must exist before creating a Reservation.');
        }

        $reservationDateTime = $this->faker->dateTimeBetween('-1 month', '+1 month');

        return [
            'user_id' => $userId,
            'service_id' => $serviceId,
            'reservation_time' => $reservationDateTime->format('Y-m-d H:i:s'),
            // Assuming tracking codes don't have to be unique across the entire table, but adjust if needed
            'tracking_code' => $this->faker->numberBetween(1000, 9000000),
        ];
    }
}
