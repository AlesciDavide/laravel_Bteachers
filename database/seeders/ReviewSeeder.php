<?php

namespace Database\Seeders;

use App\Models\Review;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{

    public function run(): void
    {

        $reviews = [
            [
                'name' => 'Michael',
                'surname' => 'Johnson',
                'email' => 'michael.johnson@gmail.com',
                'review_text' => 'Great product! I highly recommend it.',
                'profile_id' => 1,
            ],
            [
                'name' => 'Emily',
                'surname' => 'Williams',
                'email' => 'emily.williams@hotmail.com',
                'review_text' => 'The service was excellent and exceeded my expectations.',
                'profile_id' => 1,
            ],
            [
                'name' => 'James',
                'surname' => 'Brown',
                'email' => 'james.brown@yahoo.com',
                'review_text' => 'I found this product to be very useful in my daily routine.',
                'profile_id' => 1,
            ],
            [
                'name' => 'Sarah',
                'surname' => 'Davis',
                'email' => 'sarah.davis@outlook.com',
                'review_text' => 'Not bad, but there is definitely room for improvement.',
                'profile_id' => 1,
            ],
            [
                'name' => 'David',
                'surname' => 'Miller',
                'email' => 'david.miller@gmail.com',
                'review_text' => 'I was really impressed by the speed of delivery.',
                'profile_id' => 1,
            ],
            [
                'name' => 'Jessica',
                'surname' => 'Taylor',
                'email' => 'jessica.taylor@hotmail.com',
                'review_text' => 'The product quality is amazing for the price.',
                'profile_id' => 1,
            ],
            [
                'name' => 'Daniel',
                'surname' => 'Anderson',
                'email' => 'daniel.anderson@gmail.com',
                'review_text' => 'Customer service was very helpful and responsive.',
                'profile_id' => 1,
            ],
            [
                'name' => 'Amanda',
                'surname' => 'Thomas',
                'email' => 'amanda.thomas@yahoo.com',
                'review_text' => 'It met my expectations perfectly.',
                'profile_id' => 1,
            ],
            [
                'name' => 'Matthew',
                'surname' => 'Jackson',
                'email' => 'matthew.jackson@gmail.com',
                'review_text' => 'I had a few issues with it, but overall it\'s a solid product.',
                'profile_id' => 1,
            ],
            [
                'name' => 'Ashley',
                'surname' => 'White',
                'email' => 'ashley.white@hotmail.com',
                'review_text' => 'Definitely worth the money. I will buy again!',
                'profile_id' => 1,
            ],
            [
                'name' => 'Joshua',
                'surname' => 'Harris',
                'email' => 'joshua.harris@gmail.com',
                'review_text' => 'The product did not meet my expectations, unfortunately.',
                'profile_id' => 1,
            ],
            [
                'name' => 'Elizabeth',
                'surname' => 'Martin',
                'email' => 'elizabeth.martin@hotmail.com',
                'review_text' => 'I appreciate the detailed instructions included.',
                'profile_id' => 1,
            ],
            [
                'name' => 'Andrew',
                'surname' => 'Thompson',
                'email' => 'andrew.thompson@gmail.com',
                'review_text' => 'Fast shipping and great packaging!',
                'profile_id' => 1,
            ],
            [
                'name' => 'Samantha',
                'surname' => 'Garcia',
                'email' => 'samantha.garcia@gmail.com',
                'review_text' => 'The product is very easy to use and user-friendly.',
                'profile_id' => 1,
            ],
            [
                'name' => 'Christopher',
                'surname' => 'Martinez',
                'email' => 'christopher.martinez@hotmail.com',
                'review_text' => 'I had a great experience with this purchase.',
                'profile_id' => 1,
            ],
            [
                'name' => 'Olivia',
                'surname' => 'Rodriguez',
                'email' => 'olivia.rodriguez@gmail.com',
                'review_text' => 'I will recommend this product to my friends and family.',
                'profile_id' => 1,
            ],
            [
                'name' => 'Ethan',
                'surname' => 'Lee',
                'email' => 'ethan.lee@hotmail.com',
                'review_text' => 'It arrived faster than expected, very happy with that.',
                'profile_id' => 1,
            ],
            [
                'name' => 'Mia',
                'surname' => 'Perez',
                'email' => 'mia.perez@gmail.com',
                'review_text' => 'Great value for the price!',
                'profile_id' => 1,
            ],
            [
                'name' => 'Benjamin',
                'surname' => 'Hall',
                'email' => 'benjamin.hall@hotmail.com',
                'review_text' => 'I was pleasantly surprised by the quality.',
                'profile_id' => 1,
            ],
            [
                'name' => 'Isabella',
                'surname' => 'Lopez',
                'email' => 'isabella.lopez@gmail.com',
                'review_text' => 'The product works as advertised and is very reliable.',
                'profile_id' => 1,
            ]
        ];



        foreach ($reviews as $reviewData) {
            $review = new Review();
            $review->name = $reviewData["name"];
            $review->surname = $reviewData["surname"];
            $review->email = $reviewData["email"];
            $review->review_text = $reviewData["review_text"];
            $review->profile_id = $reviewData["profile_id"];
            $randomMonthsAgo = rand(1, 24);
            $randomDate = Carbon::now()->subMonths($randomMonthsAgo)->subDays(rand(0, 30));
            $review->created_at = $randomDate;
            $review->updated_at = $randomDate;
            $review->save();
        }
    }
}
