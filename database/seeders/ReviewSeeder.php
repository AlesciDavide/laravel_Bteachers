<?php

namespace Database\Seeders;

use App\Models\Review;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{

    public function run(): void
    {

        $reviews = [
            [
                'name' => 'John',
                'surname' => 'Doe',
                'email' => 'johndoe@example.com',
                'review_text' => 'Ottimo prodotto! Lo consiglio vivamente.',
                'profile_id' => 1,
            ],
            [
                'name' => 'Jane',
                'surname' => 'Smith',
                'email' => 'janesmith@example.com',
                'review_text' => 'Non sono soddisfatta della qualità, potrebbe essere migliore.',
                'profile_id' => 2,
            ],
            [
                'name' => 'John',
                'surname' => 'Doe',
                'email' => 'johndoe@example.com',
                'review_text' => 'Test secondo mesaggio ad un \'utente',
                'profile_id' => 1,
            ],
        ];

        foreach ($reviews as $reviewData) {
            $review = new Review();
            $review->name = $reviewData["name"];
            $review->surname = $reviewData["surname"];
            $review->email = $reviewData["email"];
            $review->review_text = $reviewData["review_text"];
            $review->profile_id = $reviewData["profile_id"];
            $review->save();
        }
    }
}
