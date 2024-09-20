<?php

namespace Database\Seeders;

use App\Models\Vote;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $voteList = [
            [
                "name" => "Needs Improvement",
                "vote" => "1"
            ],
            [
                "name" => "Below Average",
                "vote" => "2"
            ],
            [
                "name" => "Satisfactory",
                "vote" => "3"
            ],
            [
                "name" => "Very Good",
                "vote" => "4"
            ],
            [
                "name" => "Outstanding",
                "vote" => "5"
            ],
        ];

        foreach ($voteList as $singleVote) {
            $newVote = new Vote();
            $newVote->name = $singleVote["name"];
            $newVote->vote = $singleVote["vote"];
            $newVote->save();
        }
    }
}
