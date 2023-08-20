<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddProductRequest;
use App\Http\Requests\EditProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Slug\Slug;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    //
    public function index(){
//        $products = DB::table("products")
//            ->join("categories", "products.categories_id", "=", "categories.id")
//            ->select("products.name as product_name", "price", "code", "state", "image", "categories.name as  category_name")
//            ->orderBy("products.id", "DESC")
//            ->get()
//            ->all();
        $products = Product::orderBy("id","DESC")->paginate(5);
        return view("backend/products/listproduct", ["products"=>$products]);
    }
    public function create(){
        $categories = Category::all()->toArray();
        return view("backend/products/addproduct",["categories"=>$categories]);
    }
    public function store(AddProductRequest $AddProductRequest)
    {
        if($AddProductRequest->hasFile("image")){

            $file = $AddProductRequest->image;
            $fileName = $file->getClientOriginalName();
            $fileExtension = $file->getClientOriginalExtension();
            $filePath = $file->getRealPath();
            $file->move("uploads", Slug::getSlug($AddProductRequest->name).".".$fileExtension);
        }

        $product = new Product();
        $product->name = $AddProductRequest->name;
        $product->code = $AddProductRequest->code;
        $product->slug = Slug::getSlug($AddProductRequest->name);
        $product->info = $AddProductRequest->info;
        $product->describer = $AddProductRequest->describer;
        $product->image = Slug::getSlug($AddProductRequest->name).".".$fileExtension;
        $product->price = $AddProductRequest->price;
        $product->featured = $AddProductRequest->featured;
        $product->state = $AddProductRequest->state;
        $product->categories_id = $AddProductRequest->categories_id;
        $product->save();

        $AddProductRequest->session()->flash("alert", "Đã thêm thành công");

        return redirect("/admin/product");
    }
    public function edit(Request $request){
        $id = $request->id;
        $product = Product::find($id)->toArray();
        $category = Category::all();
        return view("backend/products/editproduct",["product"=>$product],["category"=>$category]);
    }
    public function update(EditProductRequest $request){
        $id = $request->id;
        $slug = Slug::getSlug($request->name);
        $product = Product::find($id);

        $product->name = $request->name;
        $product->code = $request->code;
        $product->info = $request->info;
        $product->categories_id = $request->categories_id;
        $product->describer = $request->describer;
        $product->price = $request->price;
        $product->featured = $request->featured;
        $product->state = $request->state;
        $product->slug = $slug;

        if($request->hasFile("image")) {
            $file = $request->image;
            $fileExtension = $file->getClientOriginalExtension();
            $fileName = $slug.".".$fileExtension;
            $file->move("uploads", $fileName);
            $product->image = $fileName;
        }
        $product->save();
        $request->session()->flash("alert", "Đã sửa thành công!");
        return redirect("/admin/product");
    }

    public function delete(Request $request){
        $id = $request->id;
        $product = Product::find($id);
        $product->delete();
        $request->session()->flash("alert", "Đã xóa thành công !");
        return redirect("/admin/product");
    }
}
