<?php

namespace Database\Seeders;

use App\Models\Instantie;
use Illuminate\Database\Seeder;

class InstantieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $instantie1 = new Instantie();
        $instantie1->name = "Overheidsinstanties";
        $instantie1->save();

        $instantie2 = new Instantie();
        $instantie2->name = "Bedrijven";
        $instantie2->save();

        $instantie3 = new Instantie();
        $instantie3->name = "ICE CUBE";
        $instantie3->save();
    }
}
