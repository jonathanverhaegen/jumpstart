<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SoapClient;
use SoapHeader;
use CodeDredd\Soap\Facades\Soap;


class WebserviceController extends Controller
{
    public function getUserByNumber(){
        $number = 	"0737388654";

        $response = Soap::baseWsdl('https://kbopub-acc.economie.fgov.be/kbopubws100000/services/wsKBOPub?wsdl')->withWsse([
            'userTokenName' => 'wsot1847',
            'userTokenPassword' => 'PJbaPE5Rs6GSfMTwEHL8tNA4',
        ])
        ->call('ReadEstablishmentByEnterpriseNumber', ['EnterpriseNumber' => $number, 'TypeOfResult' => 'short']);

        dd($response->body());
        
       
    }

    public function test(){
        
        
    }

    public function test2(){
        $number = "0737388654";

        $secretServerURL = "https://kbopub-acc.economie.fgov.be/kbopubws100000/services/wsKBOPub?wsdl";
        $username = "wsot1847";
        $password = "PJbaPE5Rs6GSfMTwEHL8tNA4";

        $soapClient = new SoapClient($secretServerURL);

        $headers = new SoapHeader('UserNameToken', 'UserNameToken', [
            'Username' => $username,
            'Password' => $password
        ]);

        $test = $soapClient->__setSoapHeaders($headers);

        $versionResult = $soapClient->__soapCall("ReadEstablishmentByEnterpriseNumber", ['EnterpriseNumber' => $number, 'TypeOfResult' => 'short']);

        $params = array();
        $params["username"] = $username;
        $params["password"] = $password;
        $authenticationResult = $soapClient->UserNameToken($params);
        
    }
}
