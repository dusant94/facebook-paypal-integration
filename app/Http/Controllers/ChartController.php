<?php

namespace App\Http\Controllers;

use App\User;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Http\Request;
use App\Products;

class ChartController extends Controller
{
    //
    public function orders(User $user){

        $user=User::findorfail($user->id);
         $products=$user->productss;
         return view('user.orders',['user'=>$user, 'products'=>$products]);
    }


}

