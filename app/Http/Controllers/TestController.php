<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Detail;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Test;

class TestController extends Controller
{
    //
    public function test(Request $request){
        $categories = Category::all()->toArray();

        function showCate($categories, $parent){
            foreach ($categories as $category){
                if ($category["parent"] == $parent){
                    echo $category["name"]."<br>";
                    $new_parent = $category["id"];
                    showCate($categories,$new_parent);
                }
            }
        }
        showCate($categories,0);
//        $test->name = "NewName";
//        $test->ca_id = "new ca";
//        $test = Test::where("id",">=",12)->where("id","<=",14)->get()->toArray();
//        dd($test);
//        $products = DB::table("products")
//            ->join("categories", "products.categories_id", "=", "categories.id")
//            ->select("products.name as product_name", "price", "categories.name as category_name")
//            ->get()
//            ->all();
//        dd($products);
        // DB::table("products")
        //     ->insert([
        //         [
        //             "name"=>"name 1",
        //             "slug"=>"slug-1",
        //             "code"=>"code1",
        //             "info"=>"info 1",
        //             "describer"=>"describer 1",
        //             "image"=>"image 1",
        //             "price"=>1111,
        //             "featured"=>1,
        //             "categories_id"=>7,
        //             "state"=>1
        //         ],
        //         [
        //             "name"=>"name 2",
        //             "slug"=>"slug-2",
        //             "code"=>"code2",
        //             "info"=>"info 2",
        //             "describer"=>"describer 2",
        //             "image"=>"image 2",
        //             "price"=>2222,
        //             "featured"=>1,
        //             "categories_id"=>7,
        //             "state"=>1
        //         ],
        //         [
        //             "name"=>"name 3",
        //             "slug"=>"slug-3",
        //             "code"=>"code3",
        //             "info"=>"info 3",
        //             "describer"=>"describer 3",
        //             "image"=>"image 3",
        //             "price"=>3333,
        //             "featured"=>0,
        //             "categories_id"=>7,
        //             "state"=>0
        //         ],
        //         [
        //             "name"=>"name 4",
        //             "slug"=>"slug-4",
        //             "code"=>"code4",
        //             "info"=>"info 4",
        //             "describer"=>"describer 4",
        //             "image"=>"image 4",
        //             "price"=>4444,
        //             "featured"=>1,
        //             "categories_id"=>8,
        //             "state"=>1
        //         ],
        //         [
        //             "name"=>"name 5",
        //             "slug"=>"slug-5",
        //             "code"=>"code5",
        //             "info"=>"info 5",
        //             "describer"=>"describer 5",
        //             "image"=>"image 5",
        //             "price"=>5555,
        //             "featured"=>0,
        //             "categories_id"=>8,
        //             "state"=>0
        //         ],
        //     ]);
        // DB::table("categories")
        //     ->where("id", 9)
        //     ->delete();
        // DB::table("categories")
        //     ->where("id", 7)
        //     ->update([
        //         "name"=>"Samsung",
        //         "slug"=>"samsung"
        //     ]);
        // DB::table("categories")
        //     ->insert([
        //         "name"=>"Nokia",
        //         "slug"=>"nokia",
        //         "parent"=>"1"
        //     ]);
        // DB::table("categories")
        //     ->insert([
        //         ["name"=>"iPhone", "slug"=>"iphone", "parent"=>"2"],
        //         ["name"=>"OPPO", "slug"=>"oppo", "parent"=>"1"],
        //     ]);
        // $request->session()->forget(["email", "pass"]);
        // $request->session()->flash("alert", "Success!");
    }
    public function test1(Request $request){
        dd($request->session()->all());
        // return view("test");

    }
    public function testForm(Request $request){
        $rules = [
            "email"=>"email|required",
            "password"=>"required|min:3|max:6",
        ];
        $messages = [
            "email.required"=>"Email không được để trống!",
            "email.email"=>"Email không hợp lệ!",
            "password.required"=>"Password không được để trống!",
            "password.min"=>"Password tối thiểu 3 ký tự!",
            "password.max"=>"Password tối đa 6 ký tự!",
        ];
        $request->validate($rules, $messages);
    }
}
