<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
            $this->call([
            HotelSeeder::class,
            RoomSeeder::class,
            EmployeeSeeder::class,
            UserSeeder::class,
            ReservationSeeder::class,
            PaymentSeeder::class,
            ReviewSeeder::class,
            PanicButtonSeeder::class,
        ]);
    }
}
