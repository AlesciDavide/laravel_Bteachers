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
        //

        $UsersTest = [
            [
                'name' => 'John',
                'surname' => 'Doe',
                'email' => 'john.doe@example.com',
                'password' => Hash::make('password123'),
                'email_verified_at' => now(),
                'address' => '987 Personal Street, Springfield',
            ],
            [
                'name' => 'Jane',
                'surname' => 'Smith',
                'email' => 'jane.smith@example.com',
                'password' => Hash::make('password123'),
                'email_verified_at' => now(),
                'address' => '654 Home Avenue, Shelbyville',
            ],
            [
                'name' => 'Michael',
                'surname' => 'Jones',
                'email' => 'michael.jones@example.com',
                'password' => Hash::make('password123'),
                'email_verified_at' => now(),
                'address' => '123 Residence Road, Capital City',
            ],
            [
                'name' => 'Emily',
                'surname' => 'Clark',
                'email' => 'emily.clark@example.com',
                'password' => Hash::make('password123'),
                'email_verified_at' => now(),
                'address' => '456 Private Lane, Ogdenville',
            ],
            [
                'name' => 'Lucas',
                'surname' => 'Wilson',
                'email' => 'lucas.wilson@example.com',
                'password' => Hash::make('password123'),
                'email_verified_at' => now(),
                'address' => '789 Home Street, North Haverbrook',
            ],
        ];

        foreach ($UsersTest as $user) {
            User::create($user);
        }
    }
}
