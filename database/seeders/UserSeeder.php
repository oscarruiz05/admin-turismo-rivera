<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'nombres' => 'Oscar',
                'apellidos' => 'Ruiz',
                'email' => 'oscarruiz2614@gmail.com',
                'password' => Hash::make('12345')
            ],
            [
                'nombres' => 'Sebastian',
                'apellidos' => 'Tovar Chavez',
                'email' => 'sebastiantovarchavez304@gmail.com',
                'password' => Hash::make('12345')
            ],
        ];

        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}
