<?php

namespace Database\Seeders;

use App\Models\Activity;
use Illuminate\Database\Seeder;

class ActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        //sub1
        $a1 = new Activity();
        $a1->code = "74201";
        $a1->name = "Activiteiten van fotografen, met uitzondering van persfotografen";
        $a1->subcategory_id = 1;
        $a1->save();

        $a2 = new Activity();
        $a2->code = "74202";
        $a2->name = "Activiteiten van persfotografen";
        $a2->subcategory_id = 1;
        $a2->save();

        $a3 = new Activity();
        $a3->code = "74209";
        $a3->name = "Overige fotografische activiteiten";
        $a3->subcategory_id = 1;
        $a3->save();

        //sub2
        $a4 = new Activity();
        $a4->code = "18130";
        $a4->name = "Prepress- en premediadiensten";
        $a4->subcategory_id = 2;
        $a4->save();

        $a5 = new Activity();
        $a5->code = "74103";
        $a5->name = "Activiteiten van grafische designers";
        $a5->subcategory_id = 2;
        $a5->save();

        //sub3
        $a6 = new Activity();
        $a6->code = "59201";
        $a6->name = "Maken van geluidsopnamen";
        $a6->subcategory_id = 3;
        $a6->save();

        $a7 = new Activity();
        $a7->code = "59289";
        $a7->name = "Productie van films, m.u.v. bioscoop- en televisiefilms";
        $a7->subcategory_id = 3;
        $a7->save();

        //sub4
        $a8 = new Activity();
        $a8->code = "62010";
        $a8->name = "Ontwerpen en programmeren van computerprogramma's";
        $a8->subcategory_id = 4;
        $a8->save();

        $a9 = new Activity();
        $a9->code = "62020";
        $a9->name = "Computerconsultancy-activiteiten";
        $a9->subcategory_id = 4;
        $a9->save();

        $a10 = new Activity();
        $a10->code = "62030";
        $a10->name = "Beheer van computerfaciliteiten";
        $a10->subcategory_id = 4;
        $a10->save();

        $a11 = new Activity();
        $a11->code = "62090";
        $a11->name = "Overige diensten op het gebied van informatietechnologie en computer";
        $a11->subcategory_id = 4;
        $a11->save();

        //sub5
        $a12 = new Activity();
        $a12->code = "63110";
        $a12->name = "Gegevensverwerking, webhosting en aanverwante activiteiten";
        $a12->subcategory_id = 5;
        $a12->save();

        $a13 = new Activity();
        $a13->code = "63120";
        $a13->name = "Webportalen";
        $a13->subcategory_id = 5;
        $a13->save();

        //sub6
        $a14 = new Activity();
        $a14->code = "62020";
        $a14->name = "Computerconsultancy-activiteiten";
        $a14->subcategory_id = 6;
        $a14->save();

        //sub7
        $a15 = new Activity();
        $a15->code = "93110";
        $a15->name = "Exploitatie van sportaccomodaties";
        $a15->subcategory_id = 7;
        $a15->save();

        $a16 = new Activity();
        $a16->code = "93121";
        $a16->name = "Activiteiten van voetbalclubs";
        $a16->subcategory_id = 7;
        $a16->save();

        $a17 = new Activity();
        $a17->code = "93122";
        $a17->name = "Activiteiten van tennisclubs";
        $a17->subcategory_id = 7;
        $a17->save();

        $a18 = new Activity();
        $a18->code = "93123";
        $a18->name = "Activiteiten van overige balsportclubs";
        $a18->subcategory_id = 7;
        $a18->save();

        $a19 = new Activity();
        $a19->code = "93124";
        $a19->name = "Activiteiten van wielerclubs";
        $a19->subcategory_id = 7;
        $a19->save();

        $a20 = new Activity();
        $a20->code = "93125";
        $a20->name = "Activiteiten van vechtsportclubs";
        $a20->subcategory_id = 7;
        $a20->save();

        $a21 = new Activity();
        $a21->code = "93126";
        $a21->name = "Activiteiten van watersportclubs";
        $a21->subcategory_id = 7;
        $a21->save();

        $a22 = new Activity();
        $a22->code = "93127";
        $a22->name = "Activiteiten van paardensportclubs";
        $a22->subcategory_id = 7;
        $a22->save();

        $a23 = new Activity();
        $a23->code = "93128";
        $a23->name = "Activiteiten van atletiekclubs";
        $a23->subcategory_id = 7;
        $a23->save();

        $a24 = new Activity();
        $a24->code = "93129";
        $a24->name = "Activiteiten van overige sportclubs";
        $a24->subcategory_id = 7;
        $a24->save();

        //sub8
        $a25 = new Activity();
        $a25->code = "93110";
        $a25->name = "Exploitatie van sportaccomodaties";
        $a25->subcategory_id = 8;
        $a25->save();

        $a26 = new Activity();
        $a26->code = "93130";
        $a26->name = "Fitnesscentra";
        $a26->subcategory_id = 8;
        $a26->save();

        //sub9
        $a27 = new Activity();
        $a27->code = "93211";
        $a27->name = "Exploitatie van kermisattracties";
        $a27->subcategory_id = 9;
        $a27->extra = "Extra vergunning nodig";
        $a27->save();

        //sub10
        $a28 = new Activity();
        $a28->code = "56101";
        $a28->name = "Eetgelegenheden met volledige bediening";
        $a28->subcategory_id = 10;
        $a28->extra = "Extra vergunning nodig";
        $a28->save();

        $a29 = new Activity();
        $a29->code = "56102";
        $a29->name = "Eetgelegenheden met beperkte bediening";
        $a29->subcategory_id = 10;
        $a29->extra = "Extra vergunning nodig";
        $a29->save();

        //sub11
        $a30 = new Activity();
        $a30->code = "56210";
        $a30->name = "Catering";
        $a30->subcategory_id = 11;
        $a30->extra = "Extra vergunning nodig";
        $a30->save();

        //sub12
        $a31 = new Activity();
        $a31->code = "56301";
        $a31->name = "Cafés en bars";
        $a31->subcategory_id = 12;
        $a31->extra = "Extra vergunning nodig";
        $a31->save();

        //sub13
        $a32 = new Activity();
        $a32->code = "56302";
        $a32->name = "Discotheken, dancings en dergelijke";
        $a32->subcategory_id = 13;
        $a32->extra = "Extra vergunning nodig";
        $a32->save();

    }
}
