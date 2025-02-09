<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class StoreController extends Controller
{
    public function index()
    {

        return view('stores.index',['stores'=> Store::all()]);
    }

    public function store(Request $request)
    {

        $request['slug'] = Str::slug($request->name,'-');
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'slug'    =>  ['required',Rule::unique('stores','slug')->where('user_id',auth()->id())],
        ]);
        $store = Store::create([
            'name'=> $request->name,
            'slug'=>$request->slug,
        ]);
return back()->with('status','Store created successfully');
    }
}
