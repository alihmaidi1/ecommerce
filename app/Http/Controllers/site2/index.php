<?php

namespace App\Http\Controllers\site2;
use App\Http\Controllers\Controller;
use App\Http\Requests\search;
use App\Models\visitor;
use Illuminate\Http\Request;
use Stevebauman\Location\Facades\Location;
use Mcamara\LaravelLocalization\LaravelLocalization;
class index extends Controller
{
     public function index(Request $request){

        $ip1=$request->ip();
        $location1=\Location::get($ip1);
        if($location1!=false){

            visitor::create([
                "ip"=>$ip1,
                "address"=>$location1->countryName,
                "nmae_region"=>$location1->regionName,
                "city_name"=>$location1->cityName,
            ]);



        }

        return view("site.index");
    }

    public function about(){

        return view("site.about");
    }

    public function search_user(search $request){

        if($request->department!=0){
        if(\LaravelLocalization::getCurrentLocaleName()=="ar"){

            $products=\App\Models\product::where("numbers",">=",1)->where("department_id",$request->department)->where("title_ar","like","%".$request->search."%")->paginate(8);

        }else{

        $products=\App\Models\product::where("numbers",">=",1)->where("department_id",$request->department)->where("title_en","like","%".$request->search."%")->paginate(8);

        }
        }else{

            if(\LaravelLocalization::getCurrentLocaleName()=="ar"){

                $products=\App\Models\product::where("numbers",">=",1)->where("title_ar","like","%".$request->search."%")->paginate(8);
    
            }else{
    
            $products=\App\Models\product::where("numbers",">=",1)->where("title_en","like","%".$request->search."%")->paginate(8);
    
            }

        }

        return view("site.search",compact("products"));

    }






    public function paginate_order(Request $request){

        
        $array_product=explode(",",$request->products);
        if($request->order_by==0){

            $products=\App\Models\product::whereIn("id",$array_product)->orderBy("number_selled","DESC")->paginate($request->pagin);

        }else if($request->order_by==1){

            $products=\App\Models\product::whereIn("id",$array_product)->orderBy("price_offer","ASC")->orderBy("price","ASC")->paginate($request->pagin);


        }else if($request->order_by==2){

            $products=\App\Models\product::whereIn("id",$array_product)->orderBy("price_offer","DESC")->orderBy("price","DESC")->paginate($request->pagin);

        }else if($request->order_by==3){

            $products=\App\Models\product::whereIn("id",$array_product)->orderBy("rating","DESC")->paginate($request->pagin);


        }else if($request->order_by==4){

            $products=\App\Models\product::whereIn("id",$array_product)->orderBy("id","DESC")->paginate($request->pagin);

        }


        return view("site.search",["products"=>$products,"order"=>$request->order_by,"pagin"=>$request->pagin]);
    

    }

    public function order_by_navbar(Request $request){

        if($request->order_by==0){

            $products=\App\Models\product::where("numbers",">=",1)->orderBy("number_selled","DESC")->paginate($request->pagin);

        }else if($request->order_by==1){

            $products=\App\Models\product::where("numbers",">=",1)->orderBy("price_offer","ASC")->orderBy("price","ASC")->paginate($request->pagin);


        }else if($request->order_by==2){

            $products=\App\Models\product::where("numbers",">=",1)->orderBy("price_offer","DESC")->orderBy("price","DESC")->paginate($request->pagin);

        }else if($request->order_by==3){

            $products=\App\Models\product::where("numbers",">=",1)->orderBy("rating","DESC")->paginate($request->pagin);


        }else if($request->order_by==4){
            $products=\App\Models\product::where("numbers",">=",1)->orderBy("id","DESC")->paginate($request->pagin);
        }
        $pagin="".$products->links();
        $div="";
        foreach($products as $product){
            $div.="
            <div class='product-item col-lg-3 col-md-6 col-sm-6'>
                <div class='item w-100'>
                    <div class='image-container'>
                        <a class='item-img-wrapper-link' href=".route("product_detail",$product->id).">
                            <img loading='lazy' style='height:200px' class='img-fluid' src=".asset("img/upload/product/".$product->photo)." alt='Product'>
                        </a>
                        <div class='item-action-behaviors'>";

                            if(auth("web")->user()!="")
                             {
                                $div.="                     
                            <a class='item-quick-look' href=".route("product_detail",$product->id)." >Add to Cart</a>
                            <a href='javascript:void(0)' onclick='add_wishlist_ajax($product->id,".auth("web")->user()->id.")' class='item-addwishlist' >Add to Wishlist</a>
                            <a class='item-addCart' href=".route("product_detail",$product->id)." >Add to Cart</a>
                                ";
                             }  
                            else
                             {

                                $div.="                  
                            <a class='item-quick-look' href=".route("product_detail",$product->id)." >Add to Cart</a>
                            <a  href=".route("login_user")." class='item-addwishlist' >Add to Wishlist</a>
                            <a class='item-addCart' href=".route("product_detail",$product->id)." >Add to Cart</a>
                                ";

                             }
                        $div.="</div>
                    </div>
                    <div class='item-content'>
                        <div class='what-product-is'>
                            <ul class='bread-crumb'>";
                               for($i = $product->department; $i != null; $i=$i->department_parent)
                               {

                                $div.="<li class='has-separator'>";

                                if(\LaravelLocalization::getCurrentLocale()=="ar")
                                {

                                    $div.="<a href=".route("show_single_department",$i->id).">$i->name_ar</a>";

                                }
                                else{

                                   $div.="<a href=".route("show_single_department",$i->id).">$i->name_en</a>";

                                }
                            $div.="</li> ";  
                               

                               }
                                
                            $div.="</ul>
                            <h6 class='item-title'>";

                                    if(\LaravelLocalization::getCurrentLocale()=="ar"){

                                        $div.="<a href=".route("product_detail",$product->id).">$product->title_ar</a>";

                                    }
                                    else{

                                        $div.="<a href=".route("product_detail",$product->id).">$product->title_en</a>";

                                    }

                            $div.="</h6>
                            <div class='item-description'>";
                                if(\LaravelLocalization::getCurrentLocale()=="ar")
                                    {

                                       $div.="<p>$product->content_ar</p>";

                                    }
                                else{

                                    $div.="<p>$product->content_en</p>";

                                }

                            $div.="</div>
                            <div class='item-stars'>";
                                for($i = 0; $i < $product->rating; $i++)
                                {

                                    $div.="<i class='fa fa-star' style='color: orange'></i>";

                                }
                                for($i = $product->rating; $i < 5; $i++){

                                   $div.="<i class='fa fa-star' style='color: rgb(228, 226, 222)'></i>";

                                }
                                $div.="<span>(".count(\App\Models\number_stars::where("product_id",$product->id)->get()).")</span>
                            </div>
                        </div>
                        <div class='price-template'>
                            <div class='item-new-price'>
                                $";
                                
                                if($product->price_offer!=""&&$product->end_offer_at> \Carbon\Carbon::now()->toDateString())
                                {
                                $div.=$product->price_offer;
                                }
                                else
                                {
                                $div.=$product->price;
                                }

                                $div.=".00
                            </div>
                            <div class='item-old-price'>
                                $$product->price.00
                            </div>
                        </div>
                    </div>
                    <div class='tag new'>
                        <span>".trans("messages.NEW")."</span>
                    </div>
                </div>
            </div>
            ";


        }

        return response()->json(["pagin"=>$pagin,"div"=>$div]);


    }




    public function new_product_user(){

        $products=\App\Models\product::where("numbers",">=",1)->orderBy("id","DESC")->paginate(8);
        return view("site.new_product_user",compact("products"));

    }
    public function hot_product_user(){

        $products=\App\Models\product::where("numbers",">=",1)->orderBy("number_selled","DESC")->paginate(8);
        return view("site.new_product_user",compact("products"));

    }

    public function bestrating_product_user(){

        $products=\App\Models\product::where("numbers",">=",1)->orderBy("rating","DESC")->paginate(8);
        return view("site.new_product_user",compact("products"));


    }
    public function discount_product_user(){

        $products=\App\Models\product::where("numbers",">=",1)->where("price_offer","!=",null)->paginate(8);
        return view("site.new_product_user",compact("products"));


    }

  
}
