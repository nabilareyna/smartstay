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
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@smartstay.com',
            'password' => bcrypt('admin123'),
            'role' => '1',
            'no_telepon' => '081234567890'
        ]);

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
