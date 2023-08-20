<?php

namespace App\Http\Controllers\Site\Cart;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Cart;

class CartController extends Controller
{
    //
    public function cart(Request $request){
        // dd(Cart::content());
        $data["cart"] = Cart::content();
        $data["priceTotal"] = Cart::priceTotal();
        $request->session()->put("cartNotify", Cart::count());
        return view("frontend/cart/cart", $data);
    }
    public function addToCart(Request $request, $id){

        $qty = $request->quantity? $request->quantity: 1;

        $product = Product::find($id);
        Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'qty' => $qty,
            'price' => $product->price,
            'weight' => 0,
            'options' => ['image' => $product->image, "code"=>$product->code]]);
        return redirect("/gio-hang");
    }
    public function updateCart(Request $request){
        Cart::update($request->rowId, $request->qty);
        return "updated";
    }
    public function deleteCart(Request $request){
        Cart::remove($request->rowId);
        return "deleted";
    }
    public function checkout(){
        return view("frontend/cart/checkout");
    }
    public function payment(){
        return "payment";
    }
    public function complete(){
        return view("frontend/cart/complete");
    }
}
