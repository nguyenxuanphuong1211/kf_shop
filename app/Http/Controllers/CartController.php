<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Cart;
use App\Bill;
use App\Customer;
use App\Bill_detail;
use App\Mail\OrderShipped;
use Toastr;
use Mail;

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
        if($product->promotion_price !=null){
        Cart::add(['id' => $id, 'name' => $product->name, 'qty' => 1, 'price' => $product->promotion_price, 'options' => ['image' => $product->image, 'quantity' => $product->quantity]]);
        }else{
            Cart::add(['id' => $id, 'name' => $product->name, 'qty' => 1, 'price' => $product->unit_price, 'options' => ['image' => $product->image, 'quantity' => $product->quantity]]);
        }
        return redirect()->route('view-cart');
    }

    public function addProductView(Request $rq){
        $id = $rq->id;
        $qty = $rq->qty;
        $product_buy = Product::find($id);
         if($product_buy->promotion_price !=null){
            Cart::add(['id' => $product_buy->id, 'name' => $product_buy->name, 'qty' => $qty, 'price' => $product_buy->promotion_price, 'options' => ['image' => $product_buy->image, 'quantity' => $product_buy->quantity]]);
        }else{
            Cart::add(['id' => $product_buy->id, 'name' => $product_buy->name, 'qty' => $qty, 'price' => $product_buy->unit_price, 'options' => ['image' => $product_buy->image, 'quantity' => $product_buy->quantity]]);
        }
        return redirect()->route('view-cart');
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
       return Response([$price,Cart::count(),Cart::total()]);
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

    public function checkout(Request $rq)
    {
        $this->validate($rq,
        [
            'first_name'=>'required',
            'last_name'=>'required',
            'email'=>'required|email',
            'order_address'=>'required',
            'note'=>'required|max:300',
            'phone_number'=>'required',
        ]);
        if(Cart::total() > 0)
        {
            $char ="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
            $order_code = strtoupper(substr(str_shuffle($char),0,6));
            $order_address = $rq->input('order_address');
            $note = $rq->input('note');
            $date_order = $rq->input('date_order');
            $bill = new Bill();
            $bill->date_order = $date_order;
            $bill->total = Cart::total(2,'.','');
            $bill->order_address = $order_address;
            $bill->note = $note;
            $bill->status = '0';
            $bill->order_code = $order_code;
            $bill->save();

            $first_name = $rq->input('first_name');
            $last_name = $rq->input('last_name');
            $email = $rq->input('email');
            $phone_number = $rq->input('phone_number');
            $custormer = new Customer();
            $custormer->first_name = $first_name;
            $custormer->last_name = $last_name;
            $custormer->email = $email;
            $custormer->phone_number = $phone_number;
            $custormer->bill_id = $bill->id;
            $custormer->save();
            Toastr::success('Checkout successful', $title = null, $options = []);

            foreach(Cart::content() as $content)
            {
                $billdetail = new Bill_detail();
                $billdetail->quantity = $content->qty;
                $billdetail->bill_id = $bill->id;
                $billdetail->product_id = $content->id;
                $billdetail->unit_price = $content->price;
                $billdetail->save();
                //auto down quantity when checkout
                $product = Product::find($content->id);
                $product->quantity = $product->quantity - $content->qty;
                $product->update();
            }
            
            $billtomail = Bill::find($bill->id);
            $billdetail = $billtomail->bill_detail;
            $billdetail= $billtomail;
            Mail::to($rq->input('email'))->send(new OrderShipped($billtomail,$custormer,$billdetail));
            Cart::destroy();
            return view('page.success_checkout', compact('billdetail','billtomail'));

        }
    }
}
