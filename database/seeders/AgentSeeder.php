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
        $agent1->firstname = "Sarah";
        $agent1->lastname = "Van Eynde";
        $agent1->info = "ondernemerscoach ICECUBE";
        $agent1->bio = "Get the real shit done! De stap zetten naar ondernemerschap is groots. Voor de durvers, voor de doeners, voor de dromers. You’re not alone in this! ICE Cube ondersteunt, we bieden een schouder, we bouwen een tribe, we bieden contacten aan. Kom op de koffie, we kijken er naar uit je te ontmoeten.";
        $agent1->avatar = 'sarah.png';
        $agent1->email = "test@hotmail.com";
        $agent1->phone = "0498413706";
        $agent1->vergaderdagen = "maandag tem woensdag";
        $agent1->uren = "10u - 15u";
        $agent1->instantie_id = 3;
        $agent1->save();
        
        $agent2 = new Agent();
        $agent2->firstname = "Annelies";
        $agent2->lastname = "Leysen";
        $agent2->info = "ondernemerscoach VLAIO";
        $agent2->bio = "Get the real shit done! De stap zetten naar ondernemerschap is groots. Voor de durvers, voor de doeners, voor de dromers. You’re not alone in this! ICE Cube ondersteunt, we bieden een schouder, we bouwen een tribe, we bieden contacten aan. Kom op de koffie, we kijken er naar uit je te ontmoeten.";
        $agent2->avatar = 'annelies.png';
        $agent2->email = "test@hotmail.com";
        $agent2->phone = "0498413706";
        $agent2->vergaderdagen = "maandag tem woensdag";
        $agent2->uren = "10u - 15u";
        $agent2->instantie_id = 1;
        $agent2->save();
    }
}
