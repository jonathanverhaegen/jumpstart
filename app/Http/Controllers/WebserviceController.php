<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RicorocksDigitalAgency\Soap\Facades\Soap;
use SoapClient;

class WebserviceController extends Controller
{
    public function getUserByNumber(){
        $number = 	"0737388654";

        $header = Soap::header()
            ->name('Authentication')
            ->namespace('test.com')
            ->data([
                'Username' => 'wsot1847',
                'Password' => 'PJbaPE5Rs6GSfMTwEHL8tNA4'
            ])
            ->mustUnderstand()
            ->actor('foo.co.uk');

        $res = Soap::to('https://kbopub-acc.economie.fgov.be/kbopubws100000/services/wsKBOPub?wsd')->withHeaders($header)->call('ReadEnterpriseRequest', ['EnterpriseNumber' => $number]);
        dd($res);
    }

    public function test(){
        $soapclient = new SoapClient('https://kbopub-acc.economie.fgov.be/kbopubws100000/services/wsKBOPub?wsd');
        dd($soapclient);
    }
}
