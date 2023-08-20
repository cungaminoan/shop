<?php

namespace App\Http\Controllers\Site\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $slug = $request->slug;
        $categories = Category::all();
        $products = Category::Where("slug",$slug)->first()->product()
        ->orderBy("id","DESC")->paginate(6);
        return view("frontend/product/shop",["products"=>$products , "categories"=>$categories]);
    }
}
