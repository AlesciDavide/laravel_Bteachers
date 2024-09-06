<?php

namespace Database\Seeders;

use App\Models\Profile;
use App\Models\Specialization;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ProfileSpecializationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $profiles = Profile::all();
        $specializations = Specialization::all()->pluck('id');
        foreach ($profiles as $profile) {
            $profile->specializations()->attach($faker->randomElements($specializations, rand(1, 2))); // creazione della relazione
        }
    }
}
