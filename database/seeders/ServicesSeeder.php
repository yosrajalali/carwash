<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            ['name' => 'interior', 'duration_minutes' => 20, 'price' => 20],
            ['name' => 'exterior', 'duration_minutes' => 40, 'price' => 30],
            ['name' => 'washing', 'duration_minutes' => 60, 'price' => 80],
        ];


        DB::table('services')->insert($services);
    }
}
