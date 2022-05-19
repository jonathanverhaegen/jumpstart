<?php

namespace Database\Seeders;

use App\Models\UsersGroup;
use Illuminate\Database\Seeder;

class UserGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usergroup1 = new UsersGroup();
        $usergroup1->user_id = 1;
        $usergroup1->group_id = 1;
        $usergroup1->save();

        $usergroup2 = new UsersGroup();
        $usergroup2->user_id = 1;
        $usergroup2->group_id = 2;
        $usergroup2->save();

        $usergroup3 = new UsersGroup();
        $usergroup3->user_id = 1;
        $usergroup3->group_id = 3;
        $usergroup3->save();

        $usergroup4 = new UsersGroup();
        $usergroup4->user_id = 1;
        $usergroup4->group_id = 6;
        $usergroup4->save();

    }
}
