<?php

namespace App\Http\Controllers\Store;


use App\Http\Controllers\Controller;
use App\Services\CartService;
use Illuminate\Http\Request;
use App\Model\Product;


class CartController extends Controller
{
	  public function index()
   {
	return view('store.pages.shopping-cart');
   }

      public function add($id)
    {
           $product = Product::find($id);

           $cart = session()->get('cart');

           if(isset($cart[$id])){
           	$cart[$id]['quantity']++;
           }else{
           	$cart[$id] = [
              'name'=>$product->name,
              'price'=>$product->price,
              'photo'=>$product->image,
              'quantity'=>1
           	];
           }

           session()->put('cart',$cart);

           return redirect()->back();
    }

     public function delete($id)
     {
     	$cart = session()->get('cart');

     	unset($cart[$id]);

     	session()->put('cart',$cart);

     	return redirect()->back();

     }


    //update cart
     public function update(Request $request, $productId = null, $quantity = null)
	{
		$cart = session()->get('cart');

		if ($request->method() == 'POST') {
			$products = $request->input();

			foreach ($products as $id => $quantity) {
				if (is_numeric($id)){
					$cart[$id]['quantity'] = $quantity;
				}
			}

			session()->put('cart', $cart);

			return redirect()->back();
		}
	}

	
}
