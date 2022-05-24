<?php

namespace Database\Seeders;

use App\Models\Subcategory;
use Illuminate\Database\Seeder;

class SubcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        //category1
        $sub1 = new Subcategory();
        $sub1->name = "Fotografie";
        $sub1->category_id = 1;
        $sub1->save();

        $sub2 = new Subcategory();
        $sub2->name = "Grafisch ontwerp";
        $sub2->category_id = 1;
        $sub2->save();

        $sub3 = new Subcategory();
        $sub3->name = "Videografie";
        $sub3->category_id = 1;
        $sub3->save();

        //category2
        $sub4 = new Subcategory();
        $sub4->name = "Programmeren";
        $sub4->category_id = 2;
        $sub4->save();

        $sub5 = new Subcategory();
        $sub5->name = "Webhosting";
        $sub5->category_id = 2;
        $sub5->save();

        $sub6 = new Subcategory();
        $sub6->name = "ICT-consultancy";
        $sub6->category_id = 2;
        $sub6->save();

        //category3
        $sub7 = new Subcategory();
        $sub7->name = "Sportclubs";
        $sub7->category_id = 3;
        $sub7->save();

        $sub8 = new Subcategory();
        $sub8->name = "Fitness";
        $sub8->category_id = 3;
        $sub8->save();

        $sub9 = new Subcategory();
        $sub9->name = "Kermis";
        $sub9->category_id = 3;
        $sub9->save();

        //category4
        $sub10 = new Subcategory();
        $sub10->name = "Restaurant";
        $sub10->category_id = 4;
        $sub10->save();

        $sub11 = new Subcategory();
        $sub11->name = "Catering";
        $sub11->category_id = 4;
        $sub11->save();

        $sub12 = new Subcategory();
        $sub12->name = "Café";
        $sub12->category_id = 4;
        $sub12->save();

        $sub13 = new Subcategory();
        $sub13->name = "Nachtclub";
        $sub13->category_id = 4;
        $sub13->save();
        
    }
}
