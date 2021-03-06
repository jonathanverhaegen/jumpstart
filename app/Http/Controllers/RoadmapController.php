<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Briefje;
use App\Models\Category;
use App\Models\Company;
use App\Models\Roadmap;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RicorocksDigitalAgency\Soap\Facades\Soap;
use SoapClient;

class RoadmapController extends Controller
{
    public function roadmap(){
        if(empty(Auth::user()->roadmap)){
            abort(403);
        }

        $data['user'] = Auth::user();
        $data['roadmap'] = Auth::user()->roadmap;
        $data['categories'] = Category::get();
        $data['briefjes'] = Briefje::where('user_id', Auth::id())->get();
        $data['company'] = Company::where('user_id', Auth::id())->first();
        return view('roadmap/roadmap', $data);
    }

    public function checkStage(Request $request){
        //checken of gebruiker al mag checken
        $roadmap = Auth::user()->roadmap;
        if($roadmap->check === 0){
            $request->session()->flash('error', 'Je hebt nog geen keuze gemaakt.');
            return redirect('/roadmap');
        }
        //credentials checken
        $credentials = $request->validate([
            'stage' => 'required'
        ]);

        $stage = intval($request->input('stage'));
        
        //volgende stage opslaan
        $roadmap = Auth::user()->roadmap;

        if($roadmap->stage === 5 && $roadmap->extra === 1){
            $roadmap->stage = $stage + 2;
            $roadmap->check = 0;
            $roadmap->extra = 0;
            $roadmap->save();
            $nextStage = $stage + 2;
            $request->session()->flash('success', 'check eerst stap 6 en ga dan verder naar 7');
            return redirect('/roadmap');
        }

        if($roadmap->stage === $stage){
            $roadmap->stage = $stage + 1;
            $roadmap->check = 0;
            $roadmap->extra = 0;
            $roadmap->save();
            $nextStage = $stage + 1;
            $request->session()->flash('success', 'Stap '.$stage.' is klaar, je kan nu verder met stap '.$nextStage);
            return redirect('/roadmap');
        }else{
            $request->session()->flash('message', 'Deze stap is al gechecked');
            return redirect('/roadmap');
        }
    }

    public function addCompany(Request $request){
        $credentials = $request->validate([
            'naam' => 'required',
            'emailadres' => 'required|email',
            'telefoon' => 'required|max:255',
            'straat' => 'required',
            'nummer' => 'required',
            'plaats' => 'required',
            'postcode' => 'required|max:4'
        ]);

        $request->flash();

        $name = $request->input('naam');
        $email = $request->input('emailadres');
        $phone = $request->input('telefoon');
        $street = $request->input('straat');
        $number = $request->input('nummer');
        $city = $request->input('plaats');
        $postal = $request->input('postcode');

        //bedrijf opslaan
        $company = new Company();
        $company->user_id = Auth::id();
        $company->name = $name;
        $company->email = $email;
        $company->phone = $phone;
        $company->street = $street;
        $company->number = $number;
        $company->city = $city;
        $company->postal = $postal;
        $company->save();

        //roadmap
        $roadmap = Auth::user()->roadmap;
        $roadmap->check = 1;
        $roadmap->save();

        $request->session()->flash('success', 'Bedrijf is opgeslagen, je kan nu stap1 afronden');
        return redirect('/roadmap');

    }

    public function checkIban(Request $request){
        $credentials = $request->validate([
            'iban' => 'required',
            'bank' => 'required',
        ]);

        $iban = $request->input('iban');
        $bank = $request->input('bank');

        $realIban = substr($iban, 4, 3);
        
        //all ibans argenta
        $ibanArgenta = ["973", "978", "979", "980"];

        //all ibans ing
        for($x = 300; $x < 400; $x++){
            $ibanIng[] = strval($x);
        }
        array_push($ibanIng, "185","630", "631", "652", "673", "824", "828", "880", "881", "883", "884", "887", "888", "910", "920", "922", "923", "929", "930", "931", "934", "936", "939", "961", "971", "976" ); 
       
        //all ibans kbc
        for ($x = 400; $x < 500; $x++) {
            $ibanKbc[] = strval($x);
        }

        for ($x = 725; $x < 728; $x++) {
            $ibanKbc[] = strval($x);
        }

        for ($x = 730; $x < 732; $x++) {
            $ibanKbc[] = strval($x);
        }

        for ($x = 733; $x < 742; $x++) {
            $ibanKbc[] = strval($x);
        }

        for ($x = 743; $x < 750; $x++) {
            $ibanKbc[] = strval($x);
        }

        array_push($ibanKbc, "640","868");
        
        //all ibans belgius
        for ($x = 50; $x < 91; $x++) {
            $ibanBelfius[] = "0".strval($x);
        }

        for ($x = 550; $x < 561; $x++) {
            $ibanBelfius[] = strval($x);
        }

        for ($x = 562; $x < 570; $x++) {
            $ibanBelfius[] = strval($x);
        }

        for ($x = 624; $x < 626; $x++) {
            $ibanBelfius[] = strval($x);
        }

        for ($x = 682; $x < 684; $x++) {
            $ibanBelfius[] = strval($x);
        }

        for ($x = 775; $x < 800; $x++) {
            $ibanBelfius[] = strval($x);
        }

        for ($x = 830; $x < 840; $x++) {
            $ibanBelfius[] = strval($x);
        }

        array_push($ibanBelfius, "638","657", "672", "680");

        //iban bnp

        for ($x = 1; $x < 10; $x++) {
            $ibanBnp[] = "00".strval($x);
        }

        for ($x = 10; $x < 50; $x++) {
            $ibanBnp[] = "0".strval($x);
        }

        for ($x = 140; $x < 150; $x++) {
            $ibanBnp[] = strval($x);
        }

        for ($x = 200; $x < 215; $x++) {
            $ibanBnp[] = strval($x);
        }

        for ($x = 220; $x < 299; $x++) {
            $ibanBnp[] = strval($x);
        }

        array_push($ibanBnp, "137","508");

        //iban axa
        for ($x = 700; $x < 710; $x++) {
            $ibanAxa[] = strval($x);
        }

        for ($x = 750; $x < 775; $x++) {
            $ibanAxa[] = strval($x);
        }

        for ($x = 800; $x < 817; $x++) {
            $ibanAxa[] = strval($x);
        }
        
        array_push($ibanAxa, "963","975");

        //iban crelan
        for ($x = 103; $x < 109; $x++) {
            $ibanCrelan[] = strval($x);
        }

        for ($x = 850; $x < 854; $x++) {
            $ibanCrelan[] = strval($x);
        }

        array_push($ibanCrelan, "859","860", "862", "863", "865", "866");

        //checken of de iban nummer klopt voor die bank
        switch($bank){
            case "ing":
                foreach($ibanIng as $i){
                    if($i === $realIban){
                        $check = true;
                    }
                }
                break;
            case "kbc":
                foreach($ibanKbc as $i){
                    if($i === $realIban){
                        $check = true;
                    }
                }
                break;
            case "argenta":
                foreach($ibanArgenta as $i){
                    if($i === $realIban){
                        $check = true;
                    }
                }
                break;
            case "belfius":
                foreach($ibanBelfius as $i){
                    if($i === $realIban){
                        $check = true;
                    }
                }
                break;
            case "bnp paribas fortis":
                foreach($ibanBnp as $i){
                    if($i === $realIban){
                        $check = true;
                    }
                }
                break;
            case "axa":
                foreach($ibanAxa as $i){
                    if($i === $realIban){
                        $check = true;
                    }
                }
                break;
            case "crelan":
                foreach($ibanCrelan as $i){
                    if($i === $realIban){
                        $check = true;
                    }
                }
                break;
        }

        

        if(!empty($check)){
            //check opslaan in de roadmap
            $roadmap = Auth::user()->roadmap;
            if($roadmap->stage === 2){
                $roadmap->check = 1;
                $roadmap->save();
            }else{
                $request->session()->flash('message', 'Iban is al gechecked');
                return redirect('/roadmap');
            }

            //iban opslaan
            $company = Auth::user()->company;
            $company->company_number = $iban;
            $company->save();
            
            $request->session()->flash('success', 'Iban is juist, je kan deze stap nu laten checken');
            return redirect('/roadmap');
        }else{
            //fout en redirecten
            $request->session()->flash('error', 'Geen juiste iban ingegeven');
            return redirect('/roadmap');
        }
    }

    

    public function checkLink(Request $request){
        $credentials = $request->validate([
            'link' => 'required',
        ]);

        $link = $request->input('link');

        $roadmap = Auth::user()->roadmap;
        $roadmap->check = 1;
        $roadmap->save();
        
        return redirect($link);
    }

    public function checkInputStage4(Request $request){
        $credentials = $request->validate([
            'vrijstelling' => 'required',
        ]);

        $exemption = intval($request->input('vrijstelling'));
        
        $company = Auth::user()->company;
        $company->exemption = $exemption;
        $company->save();

        $roadmap = Auth::user()->roadmap;
        $roadmap->check = 1;
        $roadmap->save();

        $request->session()->flash('success', 'Vrijstelling doorgegeven. Je kan stap 4 nu laten checken');
        return redirect('/roadmap');
    }

    

    public function checkInputStage5(Request $request){
        //credentials checken
        $credentials = $request->validate([
            'extra' => 'required'
        ]);

        $extra = $request->input('extra');
        
        $roadmap = Auth::user()->roadmap;
        $roadmap->check = 1;
        $roadmap->extra = $extra;
        $roadmap->save();

        $request->session()->flash('success', 'Je kan nu stap 5 checken');
        return redirect('/roadmap');
    }

    public function checkStart(Request $request){
        $credentials = $request->validate([
            'naam' => 'required|max:255',
            'ondernemingsnummer' => 'required'
        ]);

        $naam = $request->input('naam');
        $onderneminsnummer = $request->input('ondernemingsnummer');
        
        $company = new Company();
        $company->name = $naam;
        $company->company_number = $onderneminsnummer;
        $company->user_id = Auth::id();
        $company->save();

        $roadmap = Auth::user()->roadmap;
        $roadmap->extra = 1;
        $roadmap->save();

        $request->session()->flash('success', 'Naam en ondernemingsnummer zijn opgeslagen.');
        return redirect('/roadmap');
    }

    public function checkAdress(Request $request){
        $credentials = $request->validate([
            'straat' => 'required|max:255',
            'nummer' => 'required',
            'postcode' => 'required',
            'plaats' => 'required',
            'email' => 'required|email',
            'telefoonnummer' => 'required'
        ]);

        $straat = $request->input('straat');
        $nummer = $request->input('nummer');
        $postcode = $request->input('postcode');
        $plaats = $request->input('plaats');
        $email = $request->input('email');
        $telefoonnummer = $request->input('telefoonnummer');

        $company = Auth::user()->company;
        $company->street = $straat;
        $company->number = $nummer;
        $company->postal = $postcode;
        $company->city = $plaats;
        $company->email = $email;
        $company->phone = $telefoonnummer;
        $company->save();

        $roadmap = Auth::user()->roadmap;
        $roadmap->extra = 2;
        $roadmap->save();
        
        $request->session()->flash('success', 'locatie, email en telefoonnummer zijn opgeslagen');
        return redirect('/roadmap');
    }

    public function checkRegime(Request $request){
        $credentials = $request->validate([
            'optie' => 'required',
        ]);

        $letter = $request->input('optie');
        
        if($letter === 'a'){
            $roadmap = Auth::user()->roadmap;
            $roadmap->regime = 'a';
            $roadmap->extra = 4;
            $roadmap->save();

            $request->session()->flash('success', 'Optie A opgeslagen');
            return redirect('/roadmap');
        }

        if($letter === 'b'){
            $roadmap = Auth::user()->roadmap;
            $roadmap->regime = 'b';
            $roadmap->extra = 4;
            $roadmap->save();

            $request->session()->flash('success', 'Optie B opgeslagen');
            return redirect('/roadmap');
        }

        if($letter === 'c'){
            $roadmap = Auth::user()->roadmap;
            $roadmap->regime = 'c';
            $roadmap->extra = 4;
            $roadmap->save();

            $request->session()->flash('success', 'Optie C opgeslagen');
            return redirect('/roadmap');
        }
    }

    public function checkRekening(Request $request){
        $credentials = $request->validate([
            'rekeningsnummer' => 'required',
        ]);

        $number = $request->input('rekeningsnummer');

        if($number === "geen"){
            $company = Auth::user()->company;
            $company->account_number = null;
            $company->save();

            $roadmap = Auth::user()->roadmap;
            $roadmap->extra = 5;
            $roadmap->save();

            $request->session()->flash('success', 'Geen rekeninsnummer opgeslagen');
            return redirect('/roadmap');
        }

        $company = Auth::user()->company;
        $company->account_number = $number;
        $company->save();

        $roadmap = Auth::user()->roadmap;
        $roadmap->extra = 5;
        $roadmap->save();

        $request->session()->flash('success', $number.' opgeslagen');
        return redirect('/roadmap');
    }

    public function checkHandtekening(Request $request){
        $credentials = $request->validate([
            'naam' => 'required',
            'hoedanigheid' => 'required'
        ]);

        $name = $request->input('naam');
        $hoedanigheid = strtolower($request->input('hoedanigheid'));

        if($name !== Auth::user()->name){
            $request->session()->flash('error', 'Andere naam opgegeven dan op je account staat');
            return redirect('/roadmap');
        }

        if($hoedanigheid !== "oprichter van een geregistreerde entiteit-natuurlijk persoon"){
            $request->session()->flash('error', 'Hoedanigheid is niet correct');
            return redirect('/roadmap');
        }

        $roadmap = Auth::user()->roadmap;
        $roadmap->extra = 1;
        $roadmap->save();

        $request->session()->flash('success', 'Handtekening opgeslagen');
        return redirect('/roadmap');
    }

    public function checkBevestig(Request $request){
        $credentials = $request->validate([
            'bevestig' => 'required',
        ]);

        if(!empty($request->input('bevestig'))){
            $roadmap = Auth::user()->roadmap;
            $roadmap->extra = 2;
            $roadmap->check = 1;
            $roadmap->save();
            $request->session()->flash('success', 'Je hebt bevestigd en kan nu stap 6 checken');
            return redirect('/roadmap');
        }else{
            $request->session()->flash('error', 'Bevesteging is noodzakelijk');
            return redirect('/roadmap');
        }
    }

    private function companyInfo($number){
       //soap call doen naar de api van kruispuntbank dankzij de ondernemingsnummer

       //company maken in databank en de velden halen uit de soap call

       return $number;
       
    }

    public function checkNumber(Request $request){
        $credentials = $request->validate([
            'ondernemingsnummer' => 'required'
        ]);

        $onderneminsnummer = $request->input('ondernemingsnummer');
        $res = $this->companyInfo($onderneminsnummer);
        
        //company velden invullen
        $company = Auth::user()->company;
        $company->account_number = $onderneminsnummer;
        $company->save();

        //roadmap
        $roadmap = Auth::user()->roadmap;
        $roadmap->check = 1;
        $roadmap->extra = 1;
        $roadmap->save();

        $request->session()->flash('success', 'Ondernemingsnummer is gecontrolleerd, je kan nu stap 5 afchecken');
        return redirect('/roadmap');
    }

    public function addBriefje(Request $request){
        $credentials = $request->validate([
            'brief' => 'required'
        ]);

        $briefjesInput = $request->input('brief');
        foreach($briefjesInput as $b){
            $realCode = explode("-",  $b);
            $activity = Activity::where('code', $realCode)->first();
            
            $check = Briefje::where('user_id', Auth::id())->where('activity_id', $activity->id)->first();
            if(empty($check)){
                $briefje = new Briefje();
                $briefje->user_id = Auth::id();
                $briefje->activity_id = $activity->id;
                $briefje->save();

                
            }else{
                $request->session()->flash('error', 'Je hebt deze al eens geselecteerd');
                return redirect('/roadmap');
            }
        }

        $roadmap = Auth::user()->roadmap;
        $roadmap->check = 1;
        $roadmap->save();

        $request->session()->flash('success', 'Briefje is opgeslagen. Je kan nu stap 3 afchecken');
        return redirect('/roadmap');
    }

    public function deleteBriefje(Request $request){
        $credentials = $request->validate([
            'code' => 'required'
        ]);

        $codeInput = $request->input('code');
        foreach($codeInput as $c){
            $activity = Activity::where('code', $c)->first();
            $briefje = Briefje::where('user_id', Auth::id())->where('activity_id', $activity->id)->first();
            if(!empty($briefje)){
                $briefje->delete();
            }
        }

        $roadmap = Auth::user()->roadmap;
        $roadmap->check = 0;
        $roadmap->extra = 2;
        $roadmap->save();
        $request->session()->flash('success', 'Briefje is verwijderd');

        return redirect('/roadmap');
    }

    public function checkInputStage7(Request $request){
        $roadmap = Auth::user()->roadmap;
        $roadmap->check = 1;
        $roadmap->extra = 0;
        $roadmap->save();

        $request->session()->flash('success', 'Je kan nu stap 7 checken');
        return redirect('/roadmap');
    }

    public function stopStap1(Request $request){
        $credentials = $request->validate([
            'waarom' => 'required'
        ]);
        
        $why = $request->input('waarom');

        switch($why){
            case "stop":
                $roadmap = Auth::user()->roadmap;
                $roadmap->check = 1;
                $roadmap->save();
                $request->session()->flash('success', 'Je kan stap 1 nu laten checken');
                return redirect('/roadmap');
                break;
            case "hoofdberoep":
                $roadmap = Auth::user()->roadmap;
                $roadmap->extra = 1;
                $roadmap->save();
                $request->session()->flash('success', 'Bij stap1 vind je alle informatie');
                return redirect('/roadmap');
                break;
            case "bijberoep":
                $roadmap = Auth::user()->roadmap;
                $roadmap->extra = 2;
                $roadmap->save();
                $request->session()->flash('success', 'Bij stap1 vind je alle informatie');
                return redirect('/roadmap');
                break;
            
        }
    }

    public function checkStageStop(Request $request){
        //checken of gebruiker al mag checken
        $roadmap = Auth::user()->roadmap;
        
        //credentials checken
        $credentials = $request->validate([
            'stage' => 'required'
        ]);

        $stage = intval($request->input('stage'));
        
        //volgende stage opslaan
        $roadmap = Auth::user()->roadmap;

        if($roadmap->stage === 5){
            $request->session()->flash('success', 'Je hebt je statuut succesvol stopgezet');
            return redirect('/roadmap');
        }

        if($roadmap->stage === $stage){
            $roadmap->stage = $stage + 1;
            $roadmap->check = 0;
            $roadmap->extra = 0;
            $roadmap->save();
            $nextStage = $stage + 1;
            $request->session()->flash('success', 'Stap '.$stage.' is klaar, je kan nu verder met stap '.$nextStage);
            return redirect('/roadmap');
        }else{
            $request->session()->flash('message', 'Deze stap is al gechecked');
            return redirect('/roadmap');
        }
    }

    
}
