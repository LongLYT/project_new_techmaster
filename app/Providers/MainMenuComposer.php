<?php

namespace App\Providers;
use App\Model\Category;
use Illuminate\View\View;


class MainMenuComposer 
{
   public function compose(View $view)
   {
    $categories = Category::where('deleted',0)->get();
    $view->with('categories',$categories);
   }
}
