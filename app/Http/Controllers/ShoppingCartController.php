<?php

namespace App\Http\Controllers;

use App\Shopping_cart;
use App\Product;
use Illuminate\Http\Request;

class ShoppingCartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shoppingCart= Shopping_cart::with('productos')->where('status','active')->get();
        $products= Product::where('quantity','<>',0)->latest()->get();
        $totalCant= Shopping_cart::sum('cost');

        return view('shoppingCart.index',[
            'products' => $products,
            'shoppingCart' => $shoppingCart,
            'totalCant' => $totalCant
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'produc_id'=> 'required',
            'quantity'=> 'required',
            'price'=> 'required',
        ]);

        Shopping_cart::create([
            'produc_id'=> $request->produc_id,
            'quantity'=> $request->quantity,
            'cost'=> $request->price*$request->quantity,
        ]);

        $prod=Product::where('quantity','<>',0)->where('id',$request->produc_id)->first();
        $prod->quantity=$prod->total-$request->quantity;
        $prod->save();
        
        return back();
    }

    public function pay()
    {
        $shoppingCart= Shopping_cart::with('productos')->where('status','active')->get();
        $totalCant= Shopping_cart::sum('cost');
        return view('shoppingCart.pay',[
            'shoppingCart' => $shoppingCart,
            'totalCant' => $totalCant
        ]);
    }

    public function cancel()
    {
        $prod=Product::get();
        foreach ($prod as  $value) {
            $value->quantity=$value->total;
            $value->save();
        }
        $compras=Shopping_cart::get();
        foreach ($compras as $value) {
            $value->delete();
        }

        return back();
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Shopping_cart  $shopping_cart
     * @return \Illuminate\Http\Response
     */
    public function show(Shopping_cart $shopping_cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Shopping_cart  $shopping_cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Shopping_cart $shopping_cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Shopping_cart  $shopping_cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shopping_cart $shopping_cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Shopping_cart  $shopping_cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shopping_cart $shopping_cart)
    {
        //
    }
}
