<?php

namespace Database\Seeders;

use App\Models\Profile;
use App\Models\Vote;
use Carbon\Carbon;
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
            // Assicurati di avere almeno 12 voti
            $voteCount = count($votes);
            $requiredVotes = 20; // Numero di voti desiderati

            // Se ci sono meno voti disponibili, ripeti gli elementi
            if ($voteCount < $requiredVotes) {
                $randomVotes = array_merge($votes->toArray(), array_fill(0, $requiredVotes - $voteCount, $votes->toArray()));
            } else {
                $randomVotes = $faker->randomElements($votes, $requiredVotes);
            }

            // Attacca i voti al profilo
            foreach ($randomVotes as $voteId) {
                $profile->votes()->attach($voteId, [
                    'created_at' => Carbon::now()->subMonth(rand(1, 24))->subDays(rand(0, 30)), // timestamp casuale fino a 30 giorni fa
                    'updated_at' => Carbon::now()->subMonth(rand(1, 24))->subDays(rand(0, 30)) // timestamp casuale fino a 30 giorni fa
                ]);
            }
        }
    }
}
