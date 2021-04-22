<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use Ixudra\Curl\Facades\Curl;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    //
    public function access(Request $request){
        /* echo '<pre>';
        var_dump($request); */
        $client_id = $request["client_id"];
        $client_secret = $request["client_secret"];
        $code = $request["code"];
        if($code && $client_id && $client_secret){
            $response = Curl::to('https://github.com/login/oauth/access_token')
            ->withData( array( 
                                'client_id' => $client_id, 
                                'client_secret' => $client_secret, 
                                'code' => $code
                            ) )
            ->post();
            return $response;
            /* return true; */
        }
	return false;

    }  
}
