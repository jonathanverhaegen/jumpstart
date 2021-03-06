<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            GroupSeeder::class,
            UserGroupSeeder::class,
            FaqSeeder::class,
            CategorySeeder::class,
            SubcategorySeeder::class,
            ActivitySeeder::class,
            AgentSeeder::class,
            InstantieSeeder::class,
            EducationSeeder::class
        ]);
    }
}
