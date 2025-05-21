<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Room;
use App\Models\Hotel;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $hotels = Hotel::all();

        foreach ($hotels as $hotel) {
            // Tambahkan 3 kamar per hotel
            Room::create([
                'hotel_id' => $hotel->id,
                'tipe' => 'Standard',
                'harga' => 300000,
                'status' => 'tersedia'
            ]);

            Room::create([
                'hotel_id' => $hotel->id,
                'tipe' => 'Deluxe',
                'harga' => 500000,
                'status' => 'tersedia'
            ]);

            Room::create([
                'hotel_id' => $hotel->id,
                'tipe' => 'Suite',
                'harga' => 750000,
                'status' => 'tersedia'
            ]);
        }
    }
}
