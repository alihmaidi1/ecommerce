<?php

namespace App\Http\Controllers\site2;

use App\Http\Controllers\Controller;
use App\Http\Requests\add_cart;
use App\Models\cart as ModelsCart;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Mcamara\LaravelLocalization\LaravelLocalization;
use Illuminate\Http\Request;

class cart extends Controller
{

    public function index(){

        return view("site.cart");

    }
    
    public function add_cart(add_cart $request){

        try{

            $found=ModelsCart::where("user_id",$request->user_id)->where("product_id",$request->product_id)->get();
            if(count($found)!=0){
                return redirect()->back()->with(["error"=>trans("messages.the product is already exists in your cart")]);
            }
            
            ModelsCart::create([
                "product_id"=>$request->product_id,
                "size_id"=>$request->size_id,
                "color_id"=>$request->color_id,
                "user_id"=>$request->user_id,
                "quantity"=>$request->quantity


            ]);


            return redirect("/")->with(["success"=>trans("messages.the product was added to cart successfully")]);
        
        
        }catch(\Exception){

            
            return redirect("/")->with(["error"=>trans("messages.we have error")]);

        }



    }

    

    public function delete_cart(Request $request){

        try{

            ModelsCart::find($request->cart_id)->delete();
            $count=count(ModelsCart::where("user_id",$request->user_id)->get());
            $div1="";
            $carts=ModelsCart::where("user_id",$request->user_id)->paginate(5);
            $pagin1="".$carts->links();
            foreach ($carts as $cart) {

                $div1.="<tr><td>
                    <div class='cart-anchor-image'>
                                            <a href=".route("product_detail",$cart->product->id).">
                                                <img loading='lazy' src=".asset("img/upload/product/".$cart->product->photo)." alt='Product'>";
                                                
                                                if(\LaravelLocalization::getCurrentLocale()=="ar")
                                                {

                                                    $div1.="<h6>".$cart->product->title_ar."</h6>";

                                                }else{

                                                    $div1.="<h6>".$cart->product->title_en."</h6>";

                                                }

                                            $div1.="</a>
                                        </div>
                                    </td>
                                    <td>
                                        <div id='price_cart_".$cart->id."' class='cart-price'>
                                            $";
                                            if($cart->product->price_offer!=""&&$cart->product->end_offer_at>\Carbon\Carbon::now()->toDateString())
                                            {
                                                
                                                $div1.=$cart->product->price_offer * $cart->quantity;


                                            }
                                            else{

                                            $div1.=$cart->product->price * $cart->quantity;

                                            }
                                            
                                            $div1.=".00
                                        </div>
                                    </td>
                                    <td>";

                                        if(\LaravelLocalization::getCurrentLocale()=="ar"){

                                            $div1.=$cart->color->name_ar;

                                        }else{

                                            $div1.=$cart->color->name_en;

                                        }





                                    $div1.="</td>
                                    <td>";

                                        if(\LaravelLocalization::getCurrentLocale()=="ar")
{

    $div1.= $cart->size->name_ar;

}else{

    $div1.=$cart->size->name_en;

}

                                    $div1.="</td>

                                    <td>
                                        <div class='cart-quantity'>
                                            <div class='quantity'>
                                                <input type='text' id='quantity_cart_".$cart->id."' readonly name='quantity' class='quantity-text-field' value=".$cart->quantity.">
                                                <a class='plus-a' data-max=".$cart->product->numbers.">&#43;</a>
                                                <a class='minus-a' data-min='1'>&#45;</a>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class='action-wrapper '>
                                            <button class='button button-outline-secondary fas fa-sync'></button>
                                            <a  onclick='delete_cart($cart->id,".auth("web")->user()->id.")' class='button  button-outline-secondary fas fa-trash'></a>
                                        </div>
                                    </td>

                                </tr>
                                

                ";

             
            
            
            }
      
      
      
        $carts2=ModelsCart::where("user_id",$request->user_id)->get();
        $sumcart="$".sum_cart_user($carts2).".00";
        $subtotal="$".sum_subtotal_cart($carts2).".00";
        $shipping="$".sum_shipping_cart($carts2).".00";
        $tax="$".sum_tax_cart($carts2).".00";

        $div2="";
        foreach($carts2 as $cart){

            $div2.="
            <li class='clearfix'>
                    <a href=''>
                        <img loading='lazy' style='width: 70px;height:70px' src=".asset("img/upload/product/".$cart->product->photo)." alt='Product'>";
                        if(\LaravelLocalization::getCurrentLocale()=="ar")
{
   $div2.= "<span class='mini-item-name'>".$cart->product->title_ar ."x  $cart->quantity </span>
    <div class='mini-item-name'>".$cart->product->department->name_ar."</div>";


}
else{

   $div2.="<span class='mini-item-name'>".$cart->product->title_en." x $cart->quantity </span>
    <div class='mini-item-name'> ".$cart->product->department->name_en ."</div>";


}

                        if($cart->product->price_offer!=""&&$cart->product->end_offer_at>\Carbon\Carbon::now()->toDateString()){

                        $div2.="<span id='price_cart_side_".$cart->id."' class='mini-item-price'>$ ".$cart->product->price_offer."</span>";


                        }else{
                            $div2.="<span id='price_cart_side_".$cart->id."' class='mini-item-price'>$ ".$cart->product->price."</span>";


                        }
                   
                   
                        $div2.="</a>
                </li>
            
            ";
                



            }


            



            return response()->json(["success"=>trans("messages.the product was deleted from the cart successfully"),"count"=>$count,"div1"=>$div1,"pagin"=>$pagin1,"div2"=>$div2,"sum_cart"=>$sumcart,"subtotal"=>$subtotal,"shipping"=>$shipping,"tax"=>$tax]);




        }catch(\Exception){

            return response(["error"=>trans("messages.we have error")]);
        }
    }


    public function edit_cart(Request $request){

        try{

            $cart1=ModelsCart::find($request->cart_id);
            $cart1->quantity=$request->quantity;
            $cart1->save();
            if($cart1->product->price_offer!=""&&$cart1->product->end_offer_at>\Carbon\Carbon::now()->toDateString()){

                $price="$".$cart1->product->price_offer*$cart1->quantity.".00";

            }else{

                $price="$".$cart1->product->price*$cart1->quantity.".00";
            }
            $carts=ModelsCart::where("user_id",$request->user_id)->get();
            $subtotal="$".sum_subtotal_cart($carts).".00";
            $shipping="$".sum_shipping_cart($carts).".00";
            $tax="$".sum_tax_cart($carts).".00";
            $total="$".sum_cart_user($carts).".00";

            return response()->json(["success"=>trans("messages.the cart was updated successfully"),"price"=>$price,"subtotal"=>$subtotal,"shipping"=>$shipping,"tax"=>$tax,"total"=>$total]);

        }catch(\Exception){

            return response()->json(["error"=>trans("messages.we have error")]);


        }





    }

}
