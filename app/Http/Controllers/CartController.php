<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Cart;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function home(){
        dd(Cart::content());
    }
    
    public function addCartProduct($id)
    {

        $product = Product::find($id);
        Cart::add(['id' => $id, 'name' => $product->name, 'qty' => 1, 'price' => $product->promotion_price, 'options' => ['image' => $product->image, 'quantity' => $product->quantity]]);
        return redirect()->route('home');
    }

    public function remove($rowId)
    {
        Cart::remove($rowId);
        return redirect()->route('view-cart');
    }

    public function index()
    {
        return view('page.cart');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $rq)
    {
        if($rq->ajax()){
            $qty = $rq->qty;
            $rowId = $rq->id;
            Cart::update($rowId, $qty);
            $cart = Cart::get($rowId);
            $price = $cart->price * $cart->qty;
        }
       return Response([number_format($price),Cart::count(),number_format(Cart::total())]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
}
