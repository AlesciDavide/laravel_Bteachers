<?php

namespace Database\Seeders;

use App\Models\Message;
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
                'name' => 'jojo',
                'surname' => 'jotaro',
                'email' => 'jojo@gmail.com',
                'telephone_number' => '3332224566',
                'message_text' => 'jojo tested it',
                'profile_id' => '1',
            ],
            [
                'name' => 'mr.',
                'surname' => 'muscle',
                'email' => 'muscle@gmail.com',
                'telephone_number' => '3332224566',
                'message_text' => 'muscle tested it',
                'profile_id' => '1',
            ],
        ];

        foreach ($messages as $messageData) {
            $message = new Message();
            $message->name = $messageData['name'];
            $message->surname = $messageData['surname'];
            $message->email = $messageData['email'];
            $message->telephone_number = $messageData['telephone_number'];
            $message->message_text = $messageData['message_text'];
            $message->profile_id = $messageData['profile_id'];

            $message->save();
        }
    }
}
