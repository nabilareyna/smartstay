<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@smartstay.com',
            'password' => bcrypt('12345678'),
            'role' => '1',
            'no_telepon' => '081234567890'
        ]);

        User::factory()->create([
            'name' => 'Kia Noémie',
            'email' => 'kia@gmail.com',
            'password' => bcrypt('12345678'),
            'role' => '0',
            'no_telepon' => '081100110011'
        ]);

        User::factory()->create([
            'name' => 'John Doe',
            'email' => 'john@smartstay.com',
            'password' => bcrypt('12345678'),
            'role' => '0',
            'no_telepon' => '081100110011'
        ]);

        User::factory()->create([
            'name' => 'Jane Smith',
            'email' => 'jane@smartstay.com',
            'password' => bcrypt('12345678'),
            'role' => '0',
            'no_telepon' => '081200220022'
        ]);

        User::factory()->create([
            'name' => 'Bob Johnson',
            'email' => 'bob@smartstay.com',
            'password' => bcrypt('12345678'),
            'role' => '0',
            'no_telepon' => '081300330033'
        ]);
    }
}
