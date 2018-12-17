<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = 'products';

	public function category()
	{
		return $this->hasOne('App\Model\Category', 'id', 'category_id');
    }

	public function product_images()
	{
		return $this->hasMany('App\Model\ProductImage', 'product_id', 'id');
    }

}
