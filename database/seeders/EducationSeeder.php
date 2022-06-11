<?php

namespace Database\Seeders;

use App\Models\Education;
use Illuminate\Database\Seeder;

class EducationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $e1 = new Education();
        $e1->title = "Interactive Multimedia Design";
        $e1->save();

        $e2 = new Education();
        $e2->title = "Media en Entertainment Business";
        $e2->save();

        $e3 = new Education();
        $e3->title = "Journalistiek";
        $e3->save();

        $e4 = new Education();
        $e4->title = "Interieurvormgeving";
        $e4->save();

        $e5 = new Education();
        $e5->title = "Communicatie";
        $e5->save();

    }
}
