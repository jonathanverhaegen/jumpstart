<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faq1 = new Faq();
        $faq1->group_id = 1;
        $faq1->question = "Welke zakelijke onkosten kan ik inbrengen?";
        $faq1->answer = "Afhankelijk van het soort bedrijf en de kosten die u heeft, kunt u mogelijk bepaalde bedrijfskosten inbrengen en uw belastingaanslag verlagen. Dit zijn enkele voorbeelden:
        <br>
        – verplaatsing voor uw werk
        <br>
        – uw thuiskantoor
        <br>
        – onkosten van medewerkers
        <br>
        – bijdragen aan goede doelen";
        $faq1->save();

        $faq2 = new Faq();
        $faq2->group_id = 1;
        $faq2->question = "Hoe kan ik mijn cashflow verbeteren?";
        $faq2->answer = "Lorem ipsum";
        $faq2->save();

        $faq3 = new Faq();
        $faq3->group_id = 1;
        $faq3->question = "Moet ik me registreren voor de btw en wat zijn mijn fiscale verplichtingen?";
        $faq3->answer = "Lorem ipsum";
        $faq3->save();
    }
}
