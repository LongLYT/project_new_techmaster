<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Category;

class CategoryController extends Controller
{
    //
    public function index()
    {
        $value = Category::where('deleted',0)->get();
    	return view('admin.pages.list_category',compact('value'));
    }

    public function add_category(Request $req)
    {
    	$name = $req->name;
    	$cat = new Category();
    	$cat->name = $name;
    	$cat->deleted = 0;
    	$cat->created_by = 'System';
    	$cat->updated_by = 'System';
    	$cat->save();

    	return redirect()->route('admin.list_category');

    }

    public function edit_category(Request $req , $id = null)
    {
    	 if($req->method() == 'POST'){
        	$id = $req->id;
        	$cat = Category::find($id);
        	$cat->name = $req->input('name');

        	$cat->save();
        	return redirect()->route('admin.list_category');
        }
    	$category = Category::find($id);
    	 $value = Category::where('deleted',0)->get();
    	return view('admin.pages.update_category',compact('value','category'));
    }

    public function delete_category($id)
    {

       
    	$cat = Category::find($id);
    	$cat->deleted = 1;
    	$cat->save();

    	return redirect()->route('admin.list_category');
    }
}
