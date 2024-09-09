<?php

namespace Database\Seeders;

use App\Models\Profile;
use App\Models\Vote;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ProfileVoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $profiles = Profile::all();
        $votes = Vote::all()->pluck('id');
        foreach ($profiles as $profile) {
                $profile->votes()->attach($faker->randomElements($votes, rand(1, 5))); // creazione della relazione
        }
    }
}
