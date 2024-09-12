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
            [
                'name' => 'Ava',
                'surname' => 'Evans',
                'email' => 'ava.evans@example.com',
                'password' => Hash::make('password123'),
                'email_verified_at' => now(),
                'address' => '321 Quiet Path, Ogdenville',
            ],
            [
                'name' => 'Oliver',
                'surname' => 'Brown',
                'email' => 'oliver.brown@example.com',
                'password' => Hash::make('password123'),
                'email_verified_at' => now(),
                'address' => '564 Elmwood Drive, Springfield',
            ],
            [
                'name' => 'Sophia',
                'surname' => 'Taylor',
                'email' => 'sophia.taylor@example.com',
                'password' => Hash::make('password123'),
                'email_verified_at' => now(),
                'address' => '987 Maple Street, North Haverbrook',
            ],
            [
                'name' => 'James',
                'surname' => 'Davis',
                'email' => 'james.davis@example.com',
                'password' => Hash::make('password123'),
                'email_verified_at' => now(),
                'address' => '234 Birch Avenue, Shelbyville',
            ],
            [
                'name' => 'Isabella',
                'surname' => 'White',
                'email' => 'isabella.white@example.com',
                'password' => Hash::make('password123'),
                'email_verified_at' => now(),
                'address' => '678 Oak Lane, Springfield',
            ],
            [
                'name' => 'William',
                'surname' => 'Harris',
                'email' => 'william.harris@example.com',
                'password' => Hash::make('password123'),
                'email_verified_at' => now(),
                'address' => '345 Sunset Boulevard, Capital City',
            ],
            [
                'name' => 'Mia',
                'surname' => 'Martinez',
                'email' => 'mia.martinez@example.com',
                'password' => Hash::make('password123'),
                'email_verified_at' => now(),
                'address' => '876 Riverbank Road, Ogdenville',
            ],
            [
                'name' => 'Elijah',
                'surname' => 'Robinson',
                'email' => 'elijah.robinson@example.com',
                'password' => Hash::make('password123'),
                'email_verified_at' => now(),
                'address' => '432 Hillside Drive, Shelbyville',
            ],
            [
                'name' => 'Charlotte',
                'surname' => 'Moore',
                'email' => 'charlotte.moore@example.com',
                'password' => Hash::make('password123'),
                'email_verified_at' => now(),
                'address' => '654 Pine Circle, Capital City',
            ],
            [
                'name' => 'Liam',
                'surname' => 'Thompson',
                'email' => 'liam.thompson@example.com',
                'password' => Hash::make('password123'),
                'email_verified_at' => now(),
                'address' => '321 Park Avenue, North Haverbrook',
            ],
            [
                'name' => 'Amelia',
                'surname' => 'Garcia',
                'email' => 'amelia.garcia@example.com',
                'password' => Hash::make('password123'),
                'email_verified_at' => now(),
                'address' => '876 Forest Road, Springfield',
            ],
            [
                'name' => 'Henry',
                'surname' => 'Martinez',
                'email' => 'henry.martinez@example.com',
                'password' => Hash::make('password123'),
                'email_verified_at' => now(),
                'address' => '213 Valley View Lane, Capital City',
            ],
            [
                'name' => 'Grace',
                'surname' => 'Lopez',
                'email' => 'grace.lopez@example.com',
                'password' => Hash::make('password123'),
                'email_verified_at' => now(),
                'address' => '345 Maple Avenue, Shelbyville',
            ],
            [
                'name' => 'Mason',
                'surname' => 'Anderson',
                'email' => 'mason.anderson@example.com',
                'password' => Hash::make('password123'),
                'email_verified_at' => now(),
                'address' => '678 Cedar Street, North Haverbrook',
            ],
            [
                'name' => 'Lily',
                'surname' => 'Hernandez',
                'email' => 'lily.hernandez@example.com',
                'password' => Hash::make('password123'),
                'email_verified_at' => now(),
                'address' => '432 Oak Boulevard, Ogdenville',
            ],
            [
                'name' => 'Benjamin',
                'surname' => 'Clark',
                'email' => 'benjamin.clark@example.com',
                'password' => Hash::make('password123'),
                'email_verified_at' => now(),
                'address' => '789 High Street, Springfield',
            ],
            [
                'name' => 'Evelyn',
                'surname' => 'Lewis',
                'email' => 'evelyn.lewis@example.com',
                'password' => Hash::make('password123'),
                'email_verified_at' => now(),
                'address' => '123 Meadow Lane, Shelbyville',
            ],
            [
                'name' => 'Samuel',
                'surname' => 'Walker',
                'email' => 'samuel.walker@example.com',
                'password' => Hash::make('password123'),
                'email_verified_at' => now(),
                'address' => '456 River Road, Springfield',
            ],
            [
                'name' => 'Ella',
                'surname' => 'Scott',
                'email' => 'ella.scott@example.com',
                'password' => Hash::make('password123'),
                'email_verified_at' => now(),
                'address' => '321 Hilltop Drive, Capital City',
            ],
            [
                'name' => 'Alexander',
                'surname' => 'Green',
                'email' => 'alexander.green@example.com',
                'password' => Hash::make('password123'),
                'email_verified_at' => now(),
                'address' => '654 Cedar Lane, North Haverbrook',
            ]
        ];


        foreach ($UsersTest as $user) {
            User::create($user);
        }
    }
}
