<?php

namespace Database\Seeders;

use App\Models\Profile;
use App\Models\Sponsor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ProfileSponsorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $profiles = Profile::all();
        $sponsors = Sponsor::all()->pluck('id');
        foreach ($profiles as $profile) {
            $profile->sponsors()->attach($faker->randomElements($sponsors, rand(1, 2))); // creazione della relazione
        }
    }
}
