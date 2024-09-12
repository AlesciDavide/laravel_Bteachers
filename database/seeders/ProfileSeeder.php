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
                'address' => '987 Personal Street, Springfield',
                'telephone_number' => '123-456-7890',
                'service' => 'Matematica - Algebra e Geometria',
                'visible' => true,
                'user_id' => 1,
            ],
            [
                'cv' => 'cv/jane_smith.pdf',
                'photo' => 'photos/jane_smith.jpg',
                'address' => '654 Home Avenue, Shelbyville',
                'telephone_number' => '987-654-3210',
                'service' => 'Inglese - Letteratura e Composizione',
                'visible' => true,
                'user_id' => 2,
            ],
            [
                'cv' => 'cv/michael_jones.pdf',
                'photo' => 'photos/michael_jones.jpg',
                'address' => '123 Residence Road, Capital City',
                'telephone_number' => '555-666-7777',
                'service' => 'Scienze - Biologia e Chimica',
                'visible' => true,
                'user_id' => 3,
            ],
            [
                'cv' => 'cv/emily_clark.pdf',
                'photo' => 'photos/emily_clark.jpg',
                'address' => '456 Private Lane, Ogdenville',
                'telephone_number' => '333-222-1111',
                'service' => 'Storia - Storia Antica e Medievale',
                'visible' => true,
                'user_id' => 4,
            ],
            [
                'cv' => 'cv/lucas_wilson.pdf',
                'photo' => 'photos/lucas_wilson.jpg',
                'address' => '789 Home Street, North Haverbrook',
                'telephone_number' => '111-222-3333',
                'service' => 'Fisica - Meccanica e Termodinamica',
                'visible' => true,
                'user_id' => 5,
            ],
            [
                'cv' => 'cv/ava_evans.pdf',
                'photo' => 'photos/ava_evans.jpg',
                'address' => '321 Quiet Path, Ogdenville',
                'telephone_number' => '444-555-6666',
                'service' => 'Letteratura - Poesia e Narrativa',
                'visible' => true,
                'user_id' => 6,
            ],
            [
                'cv' => 'cv/oliver_brown.pdf',
                'photo' => 'photos/oliver_brown.jpg',
                'address' => '564 Elmwood Drive, Springfield',
                'telephone_number' => '777-888-9999',
                'service' => 'Informatica - Programmazione e Reti',
                'visible' => true,
                'user_id' => 7,
            ],
            [
                'cv' => 'cv/sophia_taylor.pdf',
                'photo' => 'photos/sophia_taylor.jpg',
                'address' => '987 Maple Street, North Haverbrook',
                'telephone_number' => '222-333-4444',
                'service' => 'Arte - Disegno e Pittura',
                'visible' => true,
                'user_id' => 8,
            ],
            [
                'cv' => 'cv/james_davis.pdf',
                'photo' => 'photos/james_davis.jpg',
                'address' => '234 Birch Avenue, Shelbyville',
                'telephone_number' => '555-444-3333',
                'service' => 'Scienze - Fisica e Chimica',
                'visible' => true,
                'user_id' => 9,
            ],
            [
                'cv' => 'cv/isabella_white.pdf',
                'photo' => 'photos/isabella_white.jpg',
                'address' => '678 Oak Lane, Springfield',
                'telephone_number' => '111-222-3333',
                'service' => 'Matematica - Algebra e Geometria',
                'visible' => true,
                'user_id' => 10,
            ],
            [
                'cv' => 'cv/william_harris.pdf',
                'photo' => 'photos/william_harris.jpg',
                'address' => '345 Sunset Boulevard, Capital City',
                'telephone_number' => '444-555-6666',
                'service' => 'Geografia - Cartografia e Climatologia',
                'visible' => true,
                'user_id' => 11,
            ],
            [
                'cv' => 'cv/mia_martinez.pdf',
                'photo' => 'photos/mia_martinez.jpg',
                'address' => '876 Riverbank Road, Ogdenville',
                'telephone_number' => '777-888-9999',
                'service' => 'Storia - Storia Moderna',
                'visible' => true,
                'user_id' => 12,
            ],
            [
                'cv' => 'cv/elijah_robinson.pdf',
                'photo' => 'photos/elijah_robinson.jpg',
                'address' => '432 Hillside Drive, Shelbyville',
                'telephone_number' => '111-222-3333',
                'service' => 'Letteratura - Teatro e Drammaturgia',
                'visible' => true,
                'user_id' => 13,
            ],
            [
                'cv' => 'cv/charlotte_moore.pdf',
                'photo' => 'photos/charlotte_moore.jpg',
                'address' => '654 Pine Circle, Capital City',
                'telephone_number' => '555-444-3333',
                'service' => 'Biologia - Zoologia e Botanica',
                'visible' => true,
                'user_id' => 14,
            ],
            [
                'cv' => 'cv/liam_thompson.pdf',
                'photo' => 'photos/liam_thompson.jpg',
                'address' => '321 Park Avenue, North Haverbrook',
                'telephone_number' => '444-555-6666',
                'service' => 'Chimica - Analisi e Sintesi',
                'visible' => true,
                'user_id' => 15,
            ],
            [
                'cv' => 'cv/amelia_garcia.pdf',
                'photo' => 'photos/amelia_garcia.jpg',
                'address' => '876 Forest Road, Springfield',
                'telephone_number' => '777-888-9999',
                'service' => 'Matematica - Calcolo e Statistica',
                'visible' => true,
                'user_id' => 16,
            ],
            [
                'cv' => 'cv/henry_martinez.pdf',
                'photo' => 'photos/henry_martinez.jpg',
                'address' => '213 Valley View Lane, Capital City',
                'telephone_number' => '111-222-3333',
                'service' => 'Fisica - Elettromagnetismo e Ottica',
                'visible' => true,
                'user_id' => 17,
            ],
            [
                'cv' => 'cv/grace_lopez.pdf',
                'photo' => 'photos/grace_lopez.jpg',
                'address' => '345 Maple Avenue, Shelbyville',
                'telephone_number' => '222-333-4444',
                'service' => 'Storia - Storia Medievale',
                'visible' => true,
                'user_id' => 18,
            ],
            [
                'cv' => 'cv/mason_anderson.pdf',
                'photo' => 'photos/mason_anderson.jpg',
                'address' => '678 Cedar Street, North Haverbrook',
                'telephone_number' => '555-666-7777',
                'service' => 'Informatica - Sviluppo Software',
                'visible' => true,
                'user_id' => 19,
            ],
            [
                'cv' => 'cv/lily_hernandez.pdf',
                'photo' => 'photos/lily_hernandez.jpg',
                'address' => '432 Oak Boulevard, Ogdenville',
                'telephone_number' => '333-222-1111',
                'service' => 'Scienze - Fisica e Biologia',
                'visible' => true,
                'user_id' => 20,
            ],
            [
                'cv' => 'cv/benjamin_clark.pdf',
                'photo' => 'photos/benjamin_clark.jpg',
                'address' => '789 High Street, Springfield',
                'telephone_number' => '777-888-9999',
                'service' => 'Chimica - Chimica Organica',
                'visible' => true,
                'user_id' => 21,
            ],
            [
                'cv' => 'cv/evelyn_lewis.pdf',
                'photo' => 'photos/evelyn_lewis.jpg',
                'address' => '123 Meadow Lane, Shelbyville',
                'telephone_number' => '555-444-3333',
                'service' => 'Letteratura - Poesia e Saggistica',
                'visible' => true,
                'user_id' => 22,
            ],
            [
                'cv' => 'cv/evelyn_lewis.pdf',
                'photo' => 'photos/evelyn_lewis.jpg',
                'address' => '123 Meadow Lane, Shelbyville',
                'telephone_number' => '555-444-3333',
                'service' => 'Lezioni online',
                'visible' => true,
                'user_id' => 23,
            ],
            [
                'cv' => 'cv/evelyn_lewis.pdf',
                'photo' => 'photos/evelyn_lewis.jpg',
                'address' => '123 Lake Barbare, Shelbyville',
                'telephone_number' => '555-444-3333',
                'service' => 'Lezioni al mio studio',
                'visible' => true,
                'user_id' => 24,
            ],
            [
                'cv' => 'cv/evelyn_lewis.pdf',
                'photo' => 'photos/evelyn_lewis.jpg',
                'address' => '123 Viva i Test, Shelbyville',
                'telephone_number' => '555-444-3333',
                'service' => 'Lezioni online oppure dal mio studio',
                'visible' => true,
                'user_id' => 25,
            ],
        ];


        foreach ($ProfilesTest as $profile) {
            Profile::create($profile);
        }
    }
}
