 <?php

use App\Models\category;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

function save_img($img,$path){
$name_img=rand(0,1000000).".".$img->getClientOriginalExtension();
$img->move($path,$name_img);
return $name_img;


}
function treejson(){
$arr1=[];
$arr2=[];

foreach(category::get() as $department){

    $arr2['id']=$department->id;
    $arr2["text"]=$department->name;
    $arr2['parent']=$department->parent==0?"#":$department->parent;
    array_push($arr1,$arr2);
}
return json_encode($arr1);

}

function find_id_Category($name){
    
    
    $all = category::select("id","name_en")->where(DB::raw('lower(name_en)'),"like", "%".strtolower($name)."%")->first();
if(!empty($all)){

    return $all->id;
}else{
    return 0;
}
    
}



function sum_subtotal_cart($carts){

    $sum=0;

    foreach($carts as $cart){

        if($cart->product->price_offer!=""&& $cart->product->end_offer_at> Carbon::now()->toDateString()){

            $sum+=$cart->product->price_offer*$cart->quantity;

        }else{

            $sum+=$cart->product->price*$cart->quantity;

        }
    }
    return $sum;
}

function sum_shipping_cart($carts){

    $sum=0;

    foreach($carts as $cart){

        $sum+=$cart->product->shipping*$cart->quantity;
    }
    return $sum;
}
function sum_tax_order($orders){

    $sum=0;
    foreach ($orders as $order) {
    
        $sum+=$order->tax_one*$order->quantity;

    
    }

    return $sum;
}

function sum_shipping_order($shippings){

$sum=0;

foreach($shippings as $shipping){

$sum+=$shipping->shipping_one*$shipping->quantity;

}
return $sum;

}

function sum_subtotal_order($subtotals){

$sum=0;
foreach($subtotals as $subtotal){

    $sum+=$subtotal->price_one*$subtotal->quantity;

}
return $sum;

}

function sum_tax_cart($carts){

    $sum=0;

    foreach($carts as $cart){

        $sum+=$cart->product->tax*$cart->quantity;

    }

    return $sum;
}

function sum_cart_user($carts){

    $sum=sum_subtotal_cart($carts)+sum_shipping_cart($carts)+sum_tax_cart($carts);
    return $sum;


}

function product_to_array_id($products){
    $arr=[];
    

    
    foreach($products as $product){

        $arr[]=$product->id;
    }
    return $arr;

}

function avg_star($all_view){
if(count($all_view)!=0){

    $sum=0;
    foreach($all_view as $view){
        $sum+=$view->rating;
    }
    
    $sum=$sum/count($all_view);
    return $sum;
    

}else{

    return 0;
}


}