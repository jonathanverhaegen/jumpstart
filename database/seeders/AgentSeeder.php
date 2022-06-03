<?php

namespace Database\Seeders;

use App\Models\Agent;
use Illuminate\Database\Seeder;

class AgentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $agent1 = new Agent();
        $agent1->info = "ondernemerscoach ICECUBE";
        $agent1->phone = "0498413706";
        $agent1->vergaderdagen = "maandag tem woensdag";
        $agent1->uren = "10u - 15u";
        $agent1->instantie_id = 3;
        $agent1->user_id = 1;
        $agent1->save();
        
        $agent2 = new Agent();
        $agent2->info = "ondernemerscoach VLAIO";
        $agent2->phone = "0498413706";
        $agent2->vergaderdagen = "maandag tem woensdag";
        $agent2->uren = "10u - 15u";
        $agent2->instantie_id = 1;
        $agent2->user_id = 2;
        $agent2->save();
    }
}
