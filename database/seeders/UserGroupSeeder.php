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

        $usergroup5 = new UsersGroup();
        $usergroup5->user_id = 2;
        $usergroup5->group_id = 1;
        $usergroup5->save();

        $usergroup6 = new UsersGroup();
        $usergroup6->user_id = 3;
        $usergroup6->group_id = 1;
        $usergroup6->save();

        $usergroup7 = new UsersGroup();
        $usergroup7->user_id = 4;
        $usergroup7->group_id = 1;
        $usergroup7->save();

        $usergroup8 = new UsersGroup();
        $usergroup8->user_id = 5;
        $usergroup8->group_id = 1;
        $usergroup8->save();

        $usergroup9 = new UsersGroup();
        $usergroup9->user_id = 3;
        $usergroup9->group_id = 6;
        $usergroup9->save();

        $usergroup10 = new UsersGroup();
        $usergroup10->user_id = 4;
        $usergroup10->group_id = 6;
        $usergroup10->save();

        $usergroup11 = new UsersGroup();
        $usergroup11->user_id = 5;
        $usergroup11->group_id = 6;
        $usergroup11->save();

    }
}
