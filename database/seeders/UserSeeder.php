<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create Admin User
        User::create([
            'nik' => date('Ymd') . rand(100, 999),
            'name' => 'Admin User',
            'email' => 'angga@gmail.com',
            'password' => bcrypt('123456'), // Hashed password
            'alamat' => 'Admin Address',
            'tlp' => '1234567890',
            'role' => 1,
            'tglLahir' => '1990-01-01',
            'is_active' => 1,
            'is_mamber' => 0,
            'is_admin' => 1,

        ]);

        // Create Customer User
        User::create([
            'nik' => date('Ymd') . rand(100, 999),
            'name' => 'Customer User',
            'email' => 'customer@example.com',
            'password' => bcrypt('123456'), // Hashed password
            'alamat' => 'Customer Address',
            'tlp' => '0987654321',
            'role' => 0,
            'tglLahir' => '1995-01-01',
            'is_active' => 1,
            'is_mamber' => 1,
            'is_admin' => 0,

        ]);

        // Additional Random Users
        for ($i = 0; $i < 5; $i++) {
            $password = Str::random(8);
            User::create([
                'nik' => date('Ymd') . rand(100, 999),
                'name' => 'User ' . $i,
                'email' => 'user' . $i . '@example.com',
                'password' => bcrypt($password), // Hashed password
                'alamat' => 'Random Address ' . $i,
                'tlp' => '012345678' . $i,
                'role' => rand(0, 1),
                'tglLahir' => '2000-01-01',
                'is_active' => 1,
                'is_mamber' => rand(0, 1),
                'is_admin' => rand(0, 1),
                
            ]);
        }
    }
}
