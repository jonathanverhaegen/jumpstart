<?php

namespace App\Http\Controllers;

use App\Models\Roadmap;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoadmapController extends Controller
{
    public function roadmap(){
        $data['user'] = Auth::user();
        $data['roadmap'] = Auth::user()->roadmap;
        return view('roadmap/roadmap', $data);
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
        $ibanKbc = [];

        //all ibans belgius
        $ibanBelfius = [];

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
        }

        if(!empty($check)){
            //check opslaan in de roadmap
            $roadmap = Auth::user()->roadmap;
            $roadmap->check = 1;
            $roadmap->save();

            $request->session()->flash('success', 'Iban is juist, je kan deze stap nu laten checken');
            return redirect('/roadmap');
        }else{
            //fout en redirecten
            $request->session()->flash('error', 'Geen juiste iban ingegeven');
            return redirect('/roadmap');
        }
    }

    public function checkStage1(Request $request){
        //checken of gebruiker al mag checken
        $roadmap = Auth::user()->roadmap;
        if($roadmap->check === 0){
            $request->session()->flash('error', 'Je banknummer is nog niet gechecked');
            return redirect('/roadmap');
        }
        //credentials checken
        $credentials = $request->validate([
            'stage' => 'required'
        ]);

        //volgende stage opslaan
        $roadmap = Auth::user()->roadmap;
        $roadmap->stage = 2;
        $roadmap->save();

        //redirect en inform
        $request->session()->flash('success', 'Stap 1 is klaar, je kan nu verder met stap 2');
        return redirect('/roadmap');

    }

    
}
