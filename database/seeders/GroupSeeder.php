<?php

namespace Database\Seeders;

use App\Models\Group;
use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $group1 = new Group();
        $group1->name = "Boekhouden";
        $group1->bio = "Bio boekhouden";
        $group1->goverment = 0;
        $group1->save();

        $group2 = new Group();
        $group2->name = "Administratie";
        $group2->bio = "Bio administratie";
        $group2->goverment = 0;
        $group2->save();

        $group3 = new Group();
        $group3->name = "Adverteren";
        $group3->bio = "Bio adverteren";
        $group3->goverment = 0;
        $group3->save();

        $group4 = new Group();
        $group4->name = "Marketing";
        $group4->bio = "Bio marketing";
        $group4->goverment = 0;
        $group4->save();

        $group5 = new Group();
        $group5->name = "Social Media";
        $group5->bio = "Bio social media";
        $group5->goverment = 0;
        $group5->save();

        $group6 = new Group();
        $group6->name = "Ice Cube";
        $group6->bio = "Bio ice cube";
        $group6->goverment = 1;
        $group6->save();

        $group7 = new Group();
        $group7->name = "Sinc";
        $group7->bio = "Bio sinc";
        $group7->goverment = 1;
        $group7->save();

        $group8 = new Group();
        $group8->name = "Manenstarters";
        $group8->bio = "Bio manenstarters";
        $group8->goverment = 1;
        $group8->save();
    }
}
