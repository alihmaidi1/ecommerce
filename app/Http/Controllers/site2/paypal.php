<?php

namespace App\Http\Controllers\site2;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use App\Http\Controllers\Controller;
use App\Http\Requests\checkout1;
use App\Models\cart;
use App\Models\order;
use App\Models\order_product;
use Illuminate\Http\Request;
use App\Models\product;
use Carbon\Carbon;

class paypal extends Controller
{
    


    public function process(checkout1 $request)
    {
      $order1= order::create([

            "user_id"=>$request->user_id,
            "total"=>$request->total,
            "first_name"=>$request->first_name,
            "last_name"=>$request->last_name,
            "track"=>$request->track,
            "country"=>$request->country,
            "address"=>$request->address,
            "city"=>$request->city,
            "state"=>$request->state,
            "zip"=>$request->zip,
            "email"=>$request->email,
            "phone"=>$request->phone,
            "status"=>"process"
        ]);
        $carts=cart::where("user_id",$order1->user_id)->get();
        
        foreach($carts as $cart){

            if($cart->product->end_offer_at>Carbon::now()->toDateString()){
                
                $price1=$cart->product->price_offer;

            }else{

                $price1=$cart->product->price;

            }

            order_product::create([
                "order_id"=>$order1->id,
                "quantity"=>$cart->quantity,
                "product_id"=>$cart->product_id,
                "price_one"=>$price1,
                "color_id"=>$cart->color_id,
                "size_id"=>$cart->size_id,
                "tax_one"=>$cart->product->tax,
                "shipping_one"=>$cart->product->shipping
            ]);
           }
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();

        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('successTransaction',[$order1->id]),
                "cancel_url" => route('cancelTransaction',$order1->id),
            ],
            "purchase_units" => [
                0 => [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => $request->total
                    ]
                ]
            ]
        ]);

        if (isset($response['id']) && $response['id'] != null) {

            // redirect to approve href
            foreach ($response['links'] as $links) {
                if ($links['rel'] == 'approve') {
                    return redirect()->away($links['href']);
                }
            }
            $order1->status="Canceled";

            return redirect()
                ->route('checkout')
                ->with('error', trans("messages.we have error"));

        } else {
            $order1->status="Canceled";
            return redirect()
                ->route('checkout')
                ->with('error', trans("messages.we have error"));
        }
    }

    public function success(Request $request,$id)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request['token']);

        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
           $order1=order::find($id);
           $order1->status="success";
           $order1->save();
           $order_product=\App\Models\order_product::where("order_id",$order1->id)->get();
           foreach($order_product as $order_product1){
            $product=product::find($order_product1->product_id);
            $product->numbers-=$order_product1->quantity;
            $product->number_selled+=$order_product1->quantity;
            
            $product->save();
            $carts1=\App\Models\cart::where("product_id",$order_product1->product_id)->get();
            foreach($carts1 as $cart23){

                if($cart23->quantity>$cart23->product->numbers){

                    $cart23->delete();
                }


            }

           }
           $carts=cart::where("user_id",$order1->user_id)->get();

           foreach($carts as $cart){

            $cart->delete();
           }
            return redirect()
                ->route('checkout')
                ->with('success', trans("messages.the shopping was done successfully"));
        } else {
            $order=order::find($id);
            $order->status="Canceled";
            $order->save();
            return redirect()
                ->route('checkout')
                ->with('error', trans("messages.we have error"));
        }
    }

    /**
     * cancel transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function cancel(Request $request,$id)
    {
        $order1=order::find($id);
        $order1->status="Canceled";
        $order1->save();
        return redirect()
            ->route('checkout')
            ->with('error', trans("messages.we have error"));
    }






}
