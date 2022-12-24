<?php

namespace App\Http\Controllers\site2;
use Mcamara\LaravelLocalization\LaravelLocalization;
use App\Http\Controllers\Controller;
use App\Models\wishlist as ModelsWishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class wishlist extends Controller
{
    
    public function index(){

        return view("site.show_wishlist");
    }

    public function remove_wishlist($id){
        try{

            $wishlist1=ModelsWishlist::find($id);
            $wishlist1->delete();

            return  redirect()->back()->with(["success"=>trans("messages.the wishlist product was deleted successfully")]);


        }catch(\Exception){

            return  redirect()->back()->with(["error"=>trans("messages.we have error")]);


        }

    }


    public function add_wishlist($id,$user_id){

        try{

            $found=ModelsWishlist::where("user_id",$user_id)->where("product_id",$id)->get();
            if(count($found)>0){

                return redirect()->back()->with(["error"=>trans("messages.the product is already exist in your wishlist")]);
            }
            ModelsWishlist::create([

                "user_id"=>auth("web")->user()->id,
                "product_id"=>$id
            ]);        

            return redirect()->back()->with(["success"=>trans("messages.the wishlist product was added successfully")]);
        }catch(\Exception){

            return redirect()->back()->with(["error"=>trans("messages.we have error")]);



        }


    }
    public function remove_ajax(Request $request){
        $div="";
        ModelsWishlist::find($request->id)->delete();
        $wishlists=ModelsWishlist::where("user_id",$request->user_id)->paginate(8)->setPath(route("show_wishlist"));

        $div2="".$wishlists->links()."";
        if(count($wishlists)){

            $found=1;
        }else{

            $found=0;
        }
        foreach($wishlists as $wishlist){
            $div.="<tr><td>
                                    <div class='cart-anchor-image'>
                                        <a href=".route("product_detail",$wishlist->product_id)." >
                                            <img loading='lazy' src=". asset("img/upload/product/".$wishlist->product->photo)." alt='Product'>";
                                            if(\LaravelLocalization::getCurrentLocale()=="ar")
{
    $div.="<span>".$wishlist->product->title_ar."</span>";

}
else
{
    $div.="<span>".$wishlist->product->title_en."</span>";

}



                                      $div.="  </a>
                                    </div>
                                </td>
                                <td>
                                    <div class='cart-price'>
                                        $";
                                        if($wishlist->product->price_offer!=""&& $wishlist->product->end_offer_at> \Carbon\Carbon::now()->toDateString())
{

    $div.=$wishlist->product->price_offer;

}
else
{

    $div.=$wishlist->product->price; 
}                                      

                                        $div.=".00
                                    </div>
                                </td>
                                <td>
                                    <div class='cart-stock'>";
                                        $div.=trans("messages.In Stock");
                                    $div.="</div>
                                </td>
                                <td >
                                    <div class='action-wrapper'>
                                        <a style='display: inline-block;width:130px' href=". route("product_detail",$wishlist->product_id)." class='button button-outline-secondary'>".trans("messages.Add to Cart")."</a>
                                        <a onclick=delete_wishlist($wishlist->id,".auth("web")->user()->id.") style='padding: 11px'    class='button button-outline-secondary fas  fa-trash'></a>
                                    </div>

                                </td>
                            </tr>
                            
            ";
}

        $count=count(ModelsWishlist::where("user_id",$request->user_id)->get());
        return response()->json(["div1"=>$div,"div2"=>$div2,"found"=>$found,"count"=>$count]);

    }



    public function add_wishlist_ajax(Request $request){

        try{

            $found=ModelsWishlist::where("user_id",$request->user_id)->where("product_id",$request->product_id)->get();
            if(count($found)!=0){

                $count=count(ModelsWishlist::where("user_id",$request->user_id)->get());
                return response()->json(["error"=>trans("messages.the product is already exist in the wishlist"),"count"=>$count]);

            }
            ModelsWishlist::create([

                "user_id"=>$request->user_id,
                "product_id"=>$request->product_id
            ]);

            $count1=count(ModelsWishlist::where("user_id",$request->user_id)->get());

            return response()->json(["success"=>trans("messages.the product was added to wishlist successfully"),"count"=>$count1]);


        }catch(\Exception){

            $count3=count(ModelsWishlist::where("user_id",$request->user_id)->get());

            return response()->json(["error"=>trans("messages.we have error"),"count"=>$count3]);



        }




    }


    

}
