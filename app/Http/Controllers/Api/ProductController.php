<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Products;
use App\User;
 use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function index($id){

         $user=User::findorfail($id);
         $products=$user->productss()->paginate(10);
            // $products=Products::paginate(2);


        return ProductResource::collection($products);
    }
    public function destroy(Request $request, $id)
    {
        $access_token = $request->bearerToken();
       $user=User::all()->where('api_token',$access_token)->first();
        $product= Products::findOrFail($id);



        if ( $user->productss()->detach($id)) {
            return new ProductResource($product);
        }

        return null;
    }
}
