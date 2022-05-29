<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RicorocksDigitalAgency\Soap\Facades\Soap;
use SoapClient;
use RicorocksDigitalAgency\Soap\Header;
use SoapHeader;

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

        
        $res = Soap::to('https://kbopub-acc.economie.fgov.be/kbopubws100000/services/wsKBOPub?wsdl')->withHeaders($header)->call('ReadEstablishmentByEnterpriseNumber', ['EnterpriseNumber' => $number, 'TypeOfResult' => 'short']);
        dd($res);
    }

    public function test(){
        $res = Soap::to('https://www.dataaccess.com/webservicesserver/NumberConversion.wso?wsdl')->call('NumberToWords', ['ubiNum' => 12]);
        dd($res->response);
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
