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
        $user->name = "Verhaegen Jonathan";
        $user->birth_date = "1998-02-18";
        $user->email = "r0670495@student.thomasmore.be";
        $user->password = Hash::make("Test12345");
        $user->avatar = "persoon1.png";
        $user->bio = "";
        $user->isAgent = 0;
        $user->save();

        $roadmap = new Roadmap();
        $roadmap->user_id = $user->id;
        $roadmap->stage = 1;
        $roadmap->check = 0;
        $roadmap->extra = 0;
        $roadmap->save();

        $user1 = new User();
        $user1->name = "Staetenburg Surinde";
        $user1->birth_date = "1998-02-18";
        $user1->email = "r0547896@student.thomasmore.be";
        $user1->password = Hash::make("Test12345");
        $user1->avatar = "persoon2.png";
        $user1->bio = "";
        $user1->isAgent = 0;
        $user1->save();

        $roadmap1 = new Roadmap();
        $roadmap1->user_id = $user1->id;
        $roadmap1->stage = 1;
        $roadmap1->check = 0;
        $roadmap1->extra = 0;
        $roadmap1->save();

        $user2 = new User();
        $user2->name = "Storms Bob";
        $user2->birth_date = "1998-02-18";
        $user2->email = "r0789456@student.thomasmore.be";
        $user2->password = Hash::make("Test12345");
        $user2->avatar = "persoon3.png";
        $user2->bio = "";
        $user2->isAgent = 0;
        $user2->save();

        $roadmap2 = new Roadmap();
        $roadmap2->user_id = $user2->id;
        $roadmap2->stage = 1;
        $roadmap2->check = 0;
        $roadmap2->extra = 0;
        $roadmap2->save();
    }
}
