<?php

namespace App\Http\Controllers;

use Request;
use App\User; // you need to define the model appropriately
use Facebook\Facebook;
use Laravel\Socialite\Facades\Socialite;

class FacebookUser extends Controller
{
    public function store(Facebook $fb) //method injection
    {
        $userSocialite = Socialite::driver('facebook')->stateless()->user();


        $token=$userSocialite->token;

        // set default access token for all future requests to Facebook API
        $fb->setDefaultAccessToken($token);

        // call api to retrieve person's public_profile details
        $fields = "id,name,picture.width(640)";
        $fb_user = $fb->get('/me?fields='.$fields)->getGraphUser();
        dd($fb_user);
    }
}
