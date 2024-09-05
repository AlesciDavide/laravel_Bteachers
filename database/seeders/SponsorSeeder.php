<?php

namespace Database\Seeders;

use App\Models\Sponsor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class SponsorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sponsorPlane = [
            [
                "name" => "Bronze",
                "price" => "2.99",
                "level" => "1",
                "sponsorship_time" => "24",
            ],
            [
                "name" => "Silver",
                "price" => "5.99",
                "level" => "2",
                "sponsorship_time" => "72",
            ],
            [
                "name" => "Gold",
                "price" => "9.99",
                "level" => "3",
                "sponsorship_time" => "144",
            ],

        ];

        foreach ($sponsorPlane as $singleSponsorPlane) {
            $newsponsorPlane = new Sponsor();
            $newsponsorPlane->name = $singleSponsorPlane["name"];
            $newsponsorPlane->price = $singleSponsorPlane["price"];
            $newsponsorPlane->level = $singleSponsorPlane["level"];
            $newsponsorPlane->sponsorship_time = $singleSponsorPlane["sponsorship_time"];
            $newsponsorPlane->save();
        }
    }
}
