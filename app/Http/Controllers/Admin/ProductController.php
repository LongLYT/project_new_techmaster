<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Model\Category;
use App\Model\Product;
use App\Model\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Validator;
use DB;

class ProductController extends Controller
{
	public function index()
	{
		$products = Product::where('deleted', 0)->get();

		return view('admin.pages.list_product', ['products' => $products]);
	}

	public function add(Request $request)
	{
		$cats = Category::where('deleted', 0)->get();
		
		if ($request->method() == 'POST') {
			$rule = [
				'name' => 'required',
				'price' => 'required',
				'category' => 'required',
				'stock' => 'required',
				'brand-name' => 'required',
				'size' => 'required',
				'feature-image' => 'required',
				'photos' => 'required',
				'description' => 'required',
				'properties' => 'required',
			];

			$validator = Validator::make($request->all(), $rule);

			if ($validator->fails()) {
				$error = $validator->errors();
				$request->flash();

				return view('admin.pages.add_product', [
					'cats' => $cats,
					'errors' => $error
				]);
			}

			$product = new Product();
			$product->name = $request->input('name');
			$product->price = $request->input('price');
			$product->price_sell = $request->input('price_sell', $request->input('price'));
			$product->category_id = $request->input('category');
			$product->sold = 0;
			$product->stock = $request->input('stock');
			$product->brand_name = $request->input('brand-name');
			$product->size = $request->input('size');
			$product->description = $request->input('description');
			$product->properties = $request->input('properties');
			$product->rate = 0;
			$product->exp_date = date('Y-m-d');
			$product->deleted = 0;
			$product->created_by = 'System';
			$product->updated_by = 'System';

			// Insert feature image
			$img = $request->file('feature-image');
			$name = time() . '.' . $img->getClientOriginalExtension();
			$img->move('upload/product/', $name);
			$product->image = $name;
			$product->save();

			// Insert image to image table
			$id = $product->id;
			$files = $request->file('photos');

			foreach ($files as $key => $file) {
				$link = $file->storeAs('products/' . $id, $file->getClientOriginalName());
				$productImg = new ProductImage();
				$productImg->product_id = $id;
				$productImg->image = $link;
				$productImg->deleted = 0;
				$productImg->created_by = 'System';
				$productImg->updated_by = 'System';
				$productImg->save();
			}

			return redirect()->route('admin.list_product');
		}

		return view('admin.pages.add_product', [
			'cats' => $cats
		]);
	}

	public function update(Request $request, $id = null)
	{

	}

	/**
	 * Delete product
	 *
	 * @param int $id
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function delete($id)
	{
		$product = Product::find($id);
		$product->deleted = 1;
		$product->save();

		return redirect()->route('admin.list_product');
	}
}