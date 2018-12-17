<?php

namespace App\Providers;

use Illuminate\View\View;


class CartComposer 
{
   public function compose(View $view)
   {
    $cart = session()->get('cart');
   
    $view->with('cart',$cart);
   }
}