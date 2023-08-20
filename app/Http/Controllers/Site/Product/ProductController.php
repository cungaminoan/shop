<?php

namespace App\Http\Controllers\Site\Product;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function shop()
    {
        $products = Product::orderBy("id","DESC")
            ->paginate(6);
        $categories = Category::all();
        return view("frontend/product/shop",["products"=> $products],["categories"=>$categories]);
    }
    public function filter(Request $request)
    {
        $start = $request->start;
        $end = $request->end;
        $data["products"] = Product::whereBetween("price", [$start, $end])
            ->orderBy("id", "DESC")
            ->paginate(6);
        $data["categories"] = Category::all();
        return view("frontend/product/shop",$data);
    }
    public function details($lug)
    {
        $product = Product::where("slug", $lug)
            ->get()
            ->toArray();

        $products = Product::where("slug", "<>", $lug)
            ->orderBy("id", "DESC")
            ->limit(4)
            ->get()
            ->toArray();

        return view("frontend/product/detail", ["product"=>$product[0], "products"=>$products]);
    }
}
