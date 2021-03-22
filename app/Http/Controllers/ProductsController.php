<?php


namespace App\Http\Controllers;
use Illuminate\Pagination\Paginator;

use App\Products;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Http\Request;

use App\User;

class ProductsController extends Controller
{
    public function products(){

        $products= Products::paginate(20) ;

        return view('user.products',['products'=>$products] );
    }
    public function addproduct( $products_id){

       $user1= Sentinel::check();
       $user=User::findorfail($user1->id);
        $user->productss()->attach($products_id);
        return back();


     }
     public function deletefromchart( $products_id){

        $user1= Sentinel::check();

        $user=User::findorfail($user1->id);
         $user->productss()->detach($products_id);
         return redirect()->route('user.orders',$user1->id);


      }

}
