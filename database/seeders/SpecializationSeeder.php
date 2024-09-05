<?php

namespace Database\Seeders;

use App\Models\Specialization;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SpecializationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $specializations = [
            [
                'name' => 'Psicologia dell\'educazione',
                'field' => 'Psicologia',
            ],
            [
                'name' => 'Didattica della matematica',
                'field' => 'Matematica',
            ],
            [
                'name' => 'Insegnamento di informatica',
                'field' => 'Informatica',
            ],
            [
                'name' => 'Letteratura italiana',
                'field' => 'Letteratura',
            ],
            [
                'name' => 'Chimica organica',
                'field' => 'Chimica',
            ],
            [
                'name' => 'Teoria musicale e composizione',
                'field' => 'Musica',
            ],
            [
                'name' => 'Didattica delle lingue straniere',
                'field' => 'Linguistica',
            ],
            [
                'name' => 'Storia dell\'arte rinascimentale',
                'field' => 'Storia dell\'arte',
            ],
            [
                'name' => 'Filosofia morale',
                'field' => 'Filosofia',
            ],
            [
                'name' => 'Fisica delle particelle',
                'field' => 'Fisica',
            ],
            [
                'name' => 'Sociologia dell\'educazione',
                'field' => 'Sociologia',
            ],
            [
                'name' => 'Economia internazionale',
                'field' => 'Economia',
            ],
            [
                'name' => 'Psicologia clinica',
                'field' => 'Psicologia',
            ],
            [
                'name' => 'Ingegneria civile',
                'field' => 'Ingegneria',
            ],
            [
                'name' => 'Biotecnologie',
                'field' => 'Biologia',
            ],
            [
                'name' => 'Pedagogia speciale',
                'field' => 'Pedagogia',
            ],
            [
                'name' => 'Letteratura comparata',
                'field' => 'Letteratura',
            ],
            [
                'name' => 'Analisi matematica',
                'field' => 'Matematica',
            ],
            [
                'name' => 'Fisica quantistica',
                'field' => 'Fisica',
            ],
            [
                'name' => 'Gestione ambientale',
                'field' => 'Scienze ambientali',
            ],
        ];

        foreach ($specializations as $specialization){
            Specialization::create($specialization);
        }
    }
}
