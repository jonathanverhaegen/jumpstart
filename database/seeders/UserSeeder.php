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
        $user->avatar = "avatar.png";
        $user->bio = "";
        $user->isAgent = 0;
        $user->save();

        $roadmap = new Roadmap();
        $roadmap->user_id = $user->id;
        $roadmap->stage = 1;
        $roadmap->check = 0;
        $roadmap->extra = 0;
        $roadmap->save();
    }
}
