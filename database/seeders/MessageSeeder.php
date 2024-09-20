<?php

namespace Database\Seeders;

use App\Models\Message;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $messages = [
            [
                'name' => 'Michael',
                'surname' => 'Johnson',
                'email' => 'michael.johnson@gmail.com',
                'telephone_number' => '3334567890',
                'message_text' => 'Michael tested the feature successfully.',
                'profile_id' => '1',
            ],
            [
                'name' => 'Emily',
                'surname' => 'Williams',
                'email' => 'emily.williams@hotmail.com',
                'telephone_number' => '3339876543',
                'message_text' => 'Emily tried it and was impressed.',
                'profile_id' => '1',
            ],
            [
                'name' => 'James',
                'surname' => 'Brown',
                'email' => 'james.brown@yahoo.com',
                'telephone_number' => '3331234567',
                'message_text' => 'James found the process smooth and easy.',
                'profile_id' => '1',
            ],
            [
                'name' => 'Sarah',
                'surname' => 'Davis',
                'email' => 'sarah.davis@outlook.com',
                'telephone_number' => '3332345678',
                'message_text' => 'Sarah had no issues with the service.',
                'profile_id' => '1',
            ],
            [
                'name' => 'David',
                'surname' => 'Miller',
                'email' => 'david.miller@gmail.com',
                'telephone_number' => '3333456789',
                'message_text' => 'David tested it and gave positive feedback.',
                'profile_id' => '1',
            ],
            [
                'name' => 'Jessica',
                'surname' => 'Taylor',
                'email' => 'jessica.taylor@hotmail.com',
                'telephone_number' => '3334567891',
                'message_text' => 'Jessica reported a great experience.',
                'profile_id' => '1',
            ],
            [
                'name' => 'Daniel',
                'surname' => 'Anderson',
                'email' => 'daniel.anderson@gmail.com',
                'telephone_number' => '3335678901',
                'message_text' => 'Daniel was happy with the outcome.',
                'profile_id' => '1',
            ],
            [
                'name' => 'Amanda',
                'surname' => 'Thomas',
                'email' => 'amanda.thomas@yahoo.com',
                'telephone_number' => '3336789012',
                'message_text' => 'Amanda had a positive experience.',
                'profile_id' => '1',
            ],
            [
                'name' => 'Matthew',
                'surname' => 'Jackson',
                'email' => 'matthew.jackson@gmail.com',
                'telephone_number' => '3337890123',
                'message_text' => 'Matthew found the feature useful.',
                'profile_id' => '1',
            ],
            [
                'name' => 'Ashley',
                'surname' => 'White',
                'email' => 'ashley.white@hotmail.com',
                'telephone_number' => '3338901234',
                'message_text' => 'Ashley tested it and liked the results.',
                'profile_id' => '1',
            ],
            [
                'name' => 'Joshua',
                'surname' => 'Harris',
                'email' => 'joshua.harris@gmail.com',
                'telephone_number' => '3339012345',
                'message_text' => 'Joshua was satisfied with the performance.',
                'profile_id' => '1',
            ],
            [
                'name' => 'Elizabeth',
                'surname' => 'Martin',
                'email' => 'elizabeth.martin@hotmail.com',
                'telephone_number' => '3330123456',
                'message_text' => 'Elizabeth found the service to be smooth.',
                'profile_id' => '1',
            ],
            [
                'name' => 'Andrew',
                'surname' => 'Thompson',
                'email' => 'andrew.thompson@gmail.com',
                'telephone_number' => '3331234560',
                'message_text' => 'Andrew gave a positive review.',
                'profile_id' => '1',
            ],
            [
                'name' => 'Samantha',
                'surname' => 'Garcia',
                'email' => 'samantha.garcia@gmail.com',
                'telephone_number' => '3332345670',
                'message_text' => 'Samantha liked the overall experience.',
                'profile_id' => '1',
            ],
            [
                'name' => 'Christopher',
                'surname' => 'Martinez',
                'email' => 'christopher.martinez@hotmail.com',
                'telephone_number' => '3333456780',
                'message_text' => 'Christopher gave useful feedback.',
                'profile_id' => '1',
            ],
            [
                'name' => 'Olivia',
                'surname' => 'Rodriguez',
                'email' => 'olivia.rodriguez@gmail.com',
                'telephone_number' => '3334567890',
                'message_text' => 'Olivia found the feature helpful.',
                'profile_id' => '1',
            ],
            [
                'name' => 'Ethan',
                'surname' => 'Lee',
                'email' => 'ethan.lee@hotmail.com',
                'telephone_number' => '3335678902',
                'message_text' => 'Ethan had a good experience with the system.',
                'profile_id' => '1',
            ],
            [
                'name' => 'Mia',
                'surname' => 'Perez',
                'email' => 'mia.perez@gmail.com',
                'telephone_number' => '3336789013',
                'message_text' => 'Mia tested the system and enjoyed the process.',
                'profile_id' => '1',
            ],
            [
                'name' => 'Benjamin',
                'surname' => 'Hall',
                'email' => 'benjamin.hall@hotmail.com',
                'telephone_number' => '3337890124',
                'message_text' => 'Benjamin reported great functionality.',
                'profile_id' => '1',
            ],
            [
                'name' => 'Isabella',
                'surname' => 'Lopez',
                'email' => 'isabella.lopez@gmail.com',
                'telephone_number' => '3338901235',
                'message_text' => 'Isabella tested it and was very pleased.',
                'profile_id' => '1',
            ]
        ];


        foreach ($messages as $messageData) {
            $message = new Message();
            $message->name = $messageData['name'];
            $message->surname = $messageData['surname'];
            $message->email = $messageData['email'];
            $message->telephone_number = $messageData['telephone_number'];
            $message->message_text = $messageData['message_text'];
            $message->profile_id = $messageData['profile_id'];
            $randomMonthsAgo = rand(1, 24);
            $randomDate = Carbon::now()->subMonths($randomMonthsAgo)->subDays(rand(0, 30));
            $message->created_at = $randomDate;
            $message->updated_at = $randomDate;
            $message->save();
        }
    }
}
