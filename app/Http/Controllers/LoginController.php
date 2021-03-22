<?php

namespace App\Http\Controllers;

use Cartalyst\Sentinel\Laravel\Facades\Activation;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Http\Request;
use Facebook\Facebook;
use Illuminate\Support\Facades\Storage;
use File;

use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback(Facebook $fb)
    {

        $userSocialite = Socialite::driver('facebook')->stateless()->user();

        $token=$userSocialite->token;

        // set default access token for all future requests to Facebook API
        $fb->setDefaultAccessToken($token);
         // call api to retrieve person's public_profile details
        // picture.width(640){url}
        $fields = "picture.width(600){url}";
        $fb_user = $fb->get('/me?fields='.$fields)->getGraphUser();
         $url=$fb_user['picture']['url'];

        $contents = file_get_contents($url);


        File::put( storage_path().'/app/images/'  . $userSocialite->getId() . ".jpg", $contents);

         $imagepath="images/". $userSocialite->getId() . ".jpg";
            $credentials=[
            'login'=>$userSocialite->email,
         ];

         if($user = Sentinel::findByCredentials($credentials)){
         $user = Sentinel::findById($user->id);


       if(    $activation = Activation::completed($user)){

        Sentinel::login($user);
        return redirect()->route('home');
       }
       else
       {
       $user->delete();
       $names=explode(" ",$userSocialite->getName());
        $credentials1 = [
            'email'    => $userSocialite->email,
            'password' => '12345678',
            'first_name'=>$names[0],
                'last_name'=>$names[1],
            'avatar'=> $imagepath,
        ];
        $user = Sentinel::registerAndActivate($credentials1);
        return redirect()->route('home');
       }
         }
         else{
            $names=explode(" ",$userSocialite->getName());
            $credentials1 = [
                'email'    => $userSocialite->email,
                'password' => '12345678',
                'first_name'=>$names[0],
                'last_name'=>$names[1],
                'avatar'=> $imagepath,

            ];


            $user = Sentinel::registerAndActivate($credentials1);
            return redirect()->route('home');
         }
        // $user->token;
    }
}
