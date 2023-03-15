<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $user = User::where('email', '=', 'admin@gmail.com')->exists();
        // if ($user == 'false') {
            User::create([
                'name' => 'Admin',
                'last_name' => 'Test',
                'email' => 'admin@gmail.com',
                'password' => Hash::make(123456789),
                'city_id' => NULL,
                'gender' => NULL,
                'status' => 'unapproved'
            ]);
        // }
    }
}
