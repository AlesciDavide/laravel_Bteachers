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
                'name' => 'John Doe',
                'email' => 'john.doe@example.com',
                'password' => Hash::make('password123'),
                'address' => '987 Personal Street, Springfield',
                'telephone_number' => '987-123-4567',
            ],
            [
                'name' => 'Jane Smith',
                'email' => 'jane.smith@example.com',
                'password' => Hash::make('password123'),
                'address' => '654 Home Avenue, Shelbyville',
                'telephone_number' => '321-654-9870',
            ],
            [
                'name' => 'Michael Jones',
                'email' => 'michael.jones@example.com',
                'password' => Hash::make('password123'),
                'address' => '123 Residence Road, Capital City',
                'telephone_number' => '111-222-3333',
            ],
            [
                'name' => 'Emily Clark',
                'email' => 'emily.clark@example.com',
                'password' => Hash::make('password123'),
                'address' => '456 Private Lane, Ogdenville',
                'telephone_number' => '444-555-6666',
            ],
            [
                'name' => 'Lucas Wilson',
                'email' => 'lucas.wilson@example.com',
                'password' => Hash::make('password123'),
                'address' => '789 Home Street, North Haverbrook',
                'telephone_number' => '777-888-9999',
            ],
        ];

        foreach ($UsersTest as $user) {
            User::create($user);
        }
    }
}
