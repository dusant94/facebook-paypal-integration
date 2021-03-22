<?php

namespace App\Http\Controllers;

use App\User;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function ordersAmount(){
        $user1=Sentinel::check();

        dd($user1);
        $user=User::findorfail($user1->id);
        $products=$user->productss;
        $amount=0;
        foreach($products as $product){
            $amount=$amount+$product->price;
        }
        dd($amount);

    }
}
