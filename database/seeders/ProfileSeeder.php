<?php

namespace Database\Seeders;

use App\Models\Profile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ProfilesTest = [
            [
            'cv' => 'cv/john_doe.pdf',
            'photo' => 'photos/john_doe.jpg',
            'address' => '123 Main Street, Springfield',
            'telephone_number' => '123-456-7890',
            'service' => 'Matematica - Algebra e Geometria',
            'visible' => true,
        ],
        [
            'cv' => 'cv/jane_smith.pdf',
            'photo' => 'photos/jane_smith.jpg',
            'address' => '456 Oak Avenue, Shelbyville',
            'telephone_number' => '987-654-3210',
            'service' => 'Inglese - Letteratura e Composizione',
            'visible' => true,
        ],
        [
            'cv' => 'cv/michael_jones.pdf',
            'photo' => 'photos/michael_jones.jpg',
            'address' => '789 Pine Road, Capital City',
            'telephone_number' => '555-666-7777',
            'service' => 'Scienze - Biologia e Chimica',
            'visible' => true,
        ],
        [
            'cv' => 'cv/emily_clark.pdf',
            'photo' => 'photos/emily_clark.jpg',
            'address' => '321 Maple Street, Ogdenville',
            'telephone_number' => '333-222-1111',
            'service' => 'Storia - Storia Antica e Medievale',
            'visible' => true,
        ],
        [
            'cv' => 'cv/lucas_wilson.pdf',
            'photo' => 'photos/lucas_wilson.jpg',
            'address' => '654 Birch Boulevard, North Haverbrook',
            'telephone_number' => '111-222-3333',
            'service' => 'Fisica - Meccanica e Termodinamica',
            'visible' => true,
        ],
    ];

    foreach ($ProfilesTest as $profile){
        Profile::create($profile);
    }
    }
}
