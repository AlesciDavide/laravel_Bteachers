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
                'name' => 'Renaissance Art History',
                'field' => 'Art History'
            ],
            [
                'name' => 'Biotechnology',
                'field' => 'Biology'
            ],
            [
                'name' => 'Organic Chemistry',
                'field' => 'Chemistry'
            ],
            [
                'name' => 'Civil Engineering',
                'field' => 'Engineering'
            ],
            [
                'name' => 'Environmental Management',
                'field' => 'Environmental Science'
            ],
            [
                'name' => 'Foreign Language Teaching',
                'field' => 'Linguistics'
            ],
            [
                'name' => 'Italian Literature',
                'field' => 'Literature'
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
                'name' => 'Mathematics Education',
                'field' => 'Mathematics'
            ],
            [
                'name' => 'Music Theory and Composition',
                'field' => 'Music'
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
                'name' => 'Quantum Physics',
                'field' => 'Physics'
            ],
            [
                'name' => 'Educational Psychology',
                'field' => 'Psychology'
            ],
            [
                'name' => 'Clinical Psychology',
                'field' => 'Psychology'
            ],
            [
                'name' => 'Sociology of Education',
                'field' => 'Sociology'
            ],
            [
                'name' => 'Computer Science Teaching',
                'field' => 'Computer Science'
            ],
            [
                'name' => 'Special Education Pedagogy',
                'field' => 'Pedagogy'
            ],
            [
                'name' => 'International Economics',
                'field' => 'Economics'
            ]
        ];



        foreach ($specializations as $specialization){
            Specialization::create($specialization);
        }
    }
}
