<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class MerchantController extends Controller
{
   public function __invoke(Category $category)
   {

       $products = $category->products;
       return view('home',['category'=>$category,'products'=>$products]);
   }
}
