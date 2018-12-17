<?php

namespace App\Http\Controllers;


use App\Model\Product;
use Illuminate\Http\Request;

class FileController extends Controller
{
	public function upload(Request $request)
	{
		$files = $request->file('photos');
		foreach ($files as $key => $file) {
			$name = $file->storeAs('products/1111', $file->getClientOriginalName());
		}

	}

	public function uploadImage(Request $request)
	{
		if($request->hasFile('photos')) {
			$allowedFileExtension=['jpg','png'];
			$files = $request->file('photos');
			$exe_flg = true;

			foreach($files as $file) {
				$extension = $file->getClientOriginalExtension();
				$check=in_array($extension,$allowedFileExtension);

				if(!$check) {
					$exe_flg = false;
					break;
				}
			}

			if($exe_flg) {
				$products= Product::create($request->all());
				foreach ($request->photos as $photo) {
					$filename = $photo->store('photos');
					ProductDetails::create([
						'product_id' => $products->id,
						'filename' => $filename
					]);
				}
				echo "Upload successfully";
			} else {
				echo "Falied to upload. Only accept jpg, png photos.";
			}
		}
	}
}