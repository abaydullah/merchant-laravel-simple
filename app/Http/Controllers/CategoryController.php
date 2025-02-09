<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    public function index()
    {

        return view('categories.index',['categories'=> Category::all(),'stores'=> Store::all()]);
    }

    public function store(Request $request)
    {

        $request['slug'] = Str::slug($request->name,'-');
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'slug'    =>  ['required',Rule::unique('categories','slug')->where('store_id',$request->store_id)],
            'store_id' =>  'required',
        ]);
        $category = Category::create([
            'name'=> $request->name,
            'slug'=>$request->slug,
            'store_id'=>$request->store_id,
        ]);
        return back()->with('status','Category created successfully');
    }
}
