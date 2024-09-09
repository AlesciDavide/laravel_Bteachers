<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            ProfileSeeder::class,
            MessageSeeder::class,
            ReviewSeeder::class,
            VoteSeeder::class,
            SponsorSeeder::class,
            SpecializationSeeder::class,
            ProfileSpecializationSeeder::class,
            ProfileSponsorSeeder::class,
            ProfileVoteSeeder::class,
        ]);
    }
}
