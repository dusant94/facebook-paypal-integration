<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class OAuthController extends Controller
{
    //
    public function redirect(){
        $queries=http_build_query([
            'client_id'=> '8',
            'redirect_url'=> 'http://127.0.0.1:8000/oauth/callback',
            'response_type'=> 'code'
             ]);
        return redirect('http://127.0.0.1:8080/oauth/authorize?' .$queries);

    }
    public function callback(Request $request){
        // $response=Http::post('http://127.0.0.1:8080/oauth/token',[
        //     'grant_type' => 'authorization_code',
        //     'client_id' => '8',
        //     'client_secret' => 'n1lFOc2Qqql0NA1mfXMFmFAXeKBEszGex8gZC23U',
        //     'redirect_uri' => 'http://127.0.0.1:8000/oauth/callback',
        //     'code' => $request->code,
        // ]);
        // // dd($request->all());

        // dd($response->json());

        $http = new \GuzzleHttp\Client;

        $response = $http->post('http://127.0.0.1:8080/oauth/token', [
            'form_params' => [
                'grant_type' => 'authorization_code',
                'client_id' => '8',
                'client_secret' => 'aqR954zTol434IiBPdi2I00wkhtnwZSWKvlWs4o2',
                'redirect_uri' => 'http://127.0.0.1:8000/oauth/callback',
                'code' => $request->code,
            ],
        ]);
        dd(json_decode((string) $response->getBody(), true)) ;
    }
}
