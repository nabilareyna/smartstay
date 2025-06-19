<?php

namespace Database\Seeders;

use App\Models\Reservation;
use Carbon\Carbon;
use App\Models\Room;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Reservation::create([
            'room_id' => 1, // Deluxe Room 205
            'user_id' => 1, // John Doe
            'checkin' => Carbon::parse('2024-01-15'),
            'checkout' => Carbon::parse('2024-01-16'),
            'status' => 'confirmed',
        ]);

        Reservation::create([
            'room_id' => 2, // Suite Room 301
            'user_id' => 2, // Jane Smith
            'checkin' => Carbon::parse('2024-01-16'),
            'checkout' => Carbon::parse('2024-01-17'),
            'status' => 'pending',
        ]);

        Reservation::create([
            'room_id' => 3, // Standard Room 102
            'user_id' => 3, // Bob Johnson
            'checkin' => Carbon::parse('2024-01-17'),
            'checkout' => Carbon::parse('2024-01-18'),
            'status' => 'confirmed',
        ]);
    }
}
