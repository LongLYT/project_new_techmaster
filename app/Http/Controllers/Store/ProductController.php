<?php

namespace App\Http\Controllers\Store;


use App\Http\Controllers\Controller;
use App\Model\Product;

class ProductController extends Controller
{
	public function detail($id)
	{
		$product = Product::with('category')->with('product_images')->find($id);

		if (empty($product)) {
			abort(404);
		}

		return view('store.pages.product_detail', compact('product'));
	}
}