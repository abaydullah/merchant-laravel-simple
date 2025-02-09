<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    public function index()
    {

        return view('products.index',['products'=> Product::with(['category','store'])->get(),'categories'=> Category::all(),'stores'=> Store::all()]);
    }

    public function store(Request $request)
    {

        $request['slug'] = Str::slug($request->name,'-');
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'store_id' =>  'required',
            'category_id' =>  'required',
            'slug'    =>  ['required',Rule::unique('products','slug')->where('store_id',$request->store_id)],
        ]);
        $product = Product::create([
            'name'=> $request->name,
            'slug'=>$request->slug,
            'store_id'=>$request->store_id,
            'category_id'=>$request->category_id,
        ]);
        return back()->with('status','Product created successfully');
    }
}
