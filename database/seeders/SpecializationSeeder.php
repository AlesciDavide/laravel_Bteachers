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
                'name' => 'Educational Psychology',
                'field' => 'Psychology'
            ],
            [
                'name' => 'Mathematics Education',
                'field' => 'Mathematics'
            ],
            [
                'name' => 'Computer Science Teaching',
                'field' => 'Computer Science'
            ],
            [
                'name' => 'Italian Literature',
                'field' => 'Literature'
            ],
            [
                'name' => 'Organic Chemistry',
                'field' => 'Chemistry'
            ],
            [
                'name' => 'Music Theory and Composition',
                'field' => 'Music'
            ],
            [
                'name' => 'Foreign Language Teaching',
                'field' => 'Linguistics'
            ],
            [
                'name' => 'Renaissance Art History',
                'field' => 'Art History'
            ],
            [
                'name' => 'Moral Philosophy',
                'field' => 'Philosophy'
            ],
            [
                'name' => 'Particle Physics',
                'field' => 'Physics'
            ],
            [
                'name' => 'Sociology of Education',
                'field' => 'Sociology'
            ],
            [
                'name' => 'International Economics',
                'field' => 'Economics'
            ],
            [
                'name' => 'Clinical Psychology',
                'field' => 'Psychology'
            ],
            [
                'name' => 'Civil Engineering',
                'field' => 'Engineering'
            ],
            [
                'name' => 'Biotechnology',
                'field' => 'Biology'
            ],
            [
                'name' => 'Special Education Pedagogy',
                'field' => 'Pedagogy'
            ],
            [
                'name' => 'Comparative Literature',
                'field' => 'Literature'
            ],
            [
                'name' => 'Mathematical Analysis',
                'field' => 'Mathematics'
            ],
            [
                'name' => 'Quantum Physics',
                'field' => 'Physics'
            ],
            [
                'name' => 'Environmental Management',
                'field' => 'Environmental Science'
            ]
        ];


        foreach ($specializations as $specialization){
            Specialization::create($specialization);
        }
    }
}
