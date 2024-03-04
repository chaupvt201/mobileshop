<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use App\Models\Product; 

class CartController extends Controller
{
    public function addToCart($id){ 
        $product = Product::find($id); 
        $cart = session()->get('cart'); 
        if(isset($cart[$id])){
            $cart[$id]['quantity'] = $cart[$id]['quantity'] +1; 
        } else{
            $cart[$id] = [
                'name' => $product->prod_name, 
                'price' =>$product->prod_price, 
                'quantity' => 1, 
                'image' => $product->prod_img
            ]; 
        } 
        session()->put('cart', $cart); 
        return response()->json([
            'code' => 200, 
            'message' => 'success'
        ], 200); 
        echo('<pre>'); 
        print_r(session()->get('cart')); 
    } 
    public function showCart(){ 
        if(session('cart')!= null){
        $cart = session()->get('cart'); 
        return view('frontend.cart', compact('cart')); 
        } else{
            return back(); 
        }
    } 
    public function updateCart(Request $request){
        if($request->id && $request->quantity){ 
            $cart = session()->get('cart'); 
            $cart[$request->id]['quantity'] = $request->quantity; 
            session()->put('cart', $cart); 
            $cart = session()->get('cart');
            $cartComponent = view('frontend.components.cart_component', compact('cart'))->render(); 
            return response()->json(['cart_component'=> $cartComponent, 'code'=> 200], 200); 
        }
    } 
    public function deleteCart(Request $request){
        if($request->id){ 
            $cart = session()->get('cart'); 
            unset($cart[$request->id]); 
            session()->put('cart', $cart); 
            $cart = session()->get('cart');
            $cartComponent = view('frontend.components.cart_component', compact('cart'))->render(); 
            return response()->json(['cart_component'=> $cartComponent, 'code'=> 200], 200); 
        }
    }
}
