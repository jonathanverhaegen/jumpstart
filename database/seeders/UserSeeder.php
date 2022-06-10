<?php

namespace Database\Seeders;

use App\Models\Roadmap;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = "Sarah Van Eynde";
        $user->email = "sarah@hotmail.com";
        $user->password = Hash::make("Test12345");
        $user->bio = "Get the real shit done! De stap zetten naar ondernemerschap is groots. Voor de durvers, voor de doeners, voor de dromers. You’re not alone in this! ICE Cube ondersteunt, we bieden een schouder, we bouwen een tribe, we bieden contacten aan. Kom op de koffie, we kijken er naar uit je te ontmoeten.";
        $user->avatar = "sarah.png";
        $user->isAgent = 1;
        $user->birth_date = "1998-02-18";
        $user->save();

        $userA = new User();
        $userA->name = "Annelies Leynen";
        $userA->email = "annelies@hotmail.com";
        $userA->password = Hash::make("Test12345");
        $userA->bio = "Get the real shit done! De stap zetten naar ondernemerschap is groots. Voor de durvers, voor de doeners, voor de dromers. You’re not alone in this! ICE Cube ondersteunt, we bieden een schouder, we bouwen een tribe, we bieden contacten aan. Kom op de koffie, we kijken er naar uit je te ontmoeten.";
        $userA->avatar = "annelies.png";
        $userA->isAgent = 1;
        $userA->birth_date = "1998-02-18";
        $userA->save();

        $user3 = new User();
        $user3->name = "Peeters Sarah";
        $user3->birth_date = "1998-03-14";
        $user3->email = "r1234567@student.thomasmore.be";
        $user3->password = Hash::make("Test12345");
        $user3->avatar = "sarahp.png";
        $user3->bio = "Dit is de bio van Sarah";
        $user3->isAgent = 0;
        $user3->save();

        $roadmap = new Roadmap();
        $roadmap->user_id = $user3->id;
        $roadmap->stage = 1;
        $roadmap->check = 0;
        $roadmap->extra = 0;
        $roadmap->save();

        $user1 = new User();
        $user1->name = "Cole Laurens";
        $user1->birth_date = "2001-06-12";
        $user1->email = "r1346790@student.thomasmore.be";
        $user1->password = Hash::make("Test12345");
        $user1->avatar = "Laurens.png";
        $user1->bio = "Dit is de bio van Laurens";
        $user1->isAgent = 0;
        $user1->save();

        $roadmap1 = new Roadmap();
        $roadmap1->user_id = $user1->id;
        $roadmap1->stage = 1;
        $roadmap1->check = 0;
        $roadmap1->extra = 0;
        $roadmap1->save();

        $user2 = new User();
        $user2->name = "Van Rompaey Kris";
        $user2->birth_date = "1996-10-18";
        $user2->email = "r9876543@student.thomasmore.be";
        $user2->password = Hash::make("Test12345");
        $user2->avatar = "kris.png";
        $user2->bio = "Dit is de bio van Kris";
        $user2->isAgent = 0;
        $user2->save();
    }
}
