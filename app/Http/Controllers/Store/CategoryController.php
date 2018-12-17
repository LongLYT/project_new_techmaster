<?php

namespace App\Http\Controllers\Store;


use App\Http\Controllers\Controller;
use App\Model\Category;

class CategoryController extends Controller
{
	public function index($id)
	{
		$category = Category::with('products')->find($id);
		$products = $category['products'];

		return view('store.pages.product_list', [
			'products' => $products
		]);
	}
}