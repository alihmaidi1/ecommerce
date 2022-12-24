<?php

namespace App\Http\Controllers\site2;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\LaravelLocalization;
class department extends Controller
{
    
    public function index(){

    $products=\App\Models\product::where("numbers",">=",1)->paginate(8);
        return view("site.shop",["products"=>$products]);
    }

    public function filter(Request $request){
        if(isset($request->color_id[1])){
            $id_product=\App\Models\color_product::whereIn("color_id",$request->color_id)->get();
        }else
        {
            $id_product=\App\Models\color_product::get();
        }
        $arr1=[];
        foreach($id_product as $id1){
            $arr1[]=$id1->product_id;
        }
        if(isset($request->size_id[1])){

            $id_product2=\App\Models\size_product::whereIn("size_id",$request->size_id)->whereIn("product_id",$arr1)->get();

        }else{

            $id_product2=\App\Models\size_product::whereIn("product_id",$arr1)->get();

        }
        $arr2=[];
        foreach($id_product2 as $id2){

            $arr2[]=$id2->product_id;
        }
        if($request->order_by==0){

            if(isset($request->shipping)){
                if(isset($request->department_id[1])){

                    $products=\App\Models\product::where("numbers",">=",1)->whereIn("department_id",$request->department_id)->whereIn("id",$arr2)->where("shipping",0)->orderBy("number_selled","DESC")->paginate($request->pagin);

                }else{
                    $products=\App\Models\product::where("numbers",">=",1)->whereIn("id",$arr2)->where("shipping",0)->orderBy("number_selled","DESC")->paginate($request->pagin);

                }

            }else{
                if(isset($request->department_id[1])){
                
                    $products=\App\Models\product::where("numbers",">=",1)->whereIn("department_id",$request->department_id)->whereIn("id",$arr2)->orderBy("number_selled","DESC")->paginate($request->pagin);
                
                }else{

                $products=\App\Models\product::where("numbers",">=",1)->whereIn("id",$arr2)->orderBy("number_selled","DESC")->paginate($request->pagin);

                }

            }



        }else if($request->order_by==1){

            if(isset($request->shipping)){


                if(isset($request->department_id[1])){
                
                    $products=\App\Models\product::where("numbers",">=",1)->whereIn("department_id",$request->department_id)->whereIn("id",$arr2)->where("shipping",0)->orderBy("id","DESC")->paginate($request->pagin);
                
                }else{

                    $products=\App\Models\product::where("numbers",">=",1)->whereIn("id",$arr2)->where("shipping",0)->orderBy("id","DESC")->paginate($request->pagin);

                }


            }else{


                if(isset($request->department_id[1])){

                    $products=\App\Models\product::where("numbers",">=",1)->whereIn("department_id",$request->department_id)->whereIn("id",$arr2)->orderBy("id","DESC")->paginate($request->pagin);

                }else{

                    $products=\App\Models\product::where("numbers",">=",1)->whereIn("id",$arr2)->orderBy("id","DESC")->paginate($request->pagin);


                }

            }
        }else if($request->order_by==2){
            
            if(isset($request->shipping)){

                if(isset($request->department_id[1])){

                $products=\App\Models\product::where("numbers",">=",1)->whereIn("department_id",$request->department_id)->whereIn("id",$arr2)->where("shipping",0)->orderBy("price_offer","ASC")->orderBy("price","ASC")->paginate($request->pagin);


                }else{

                    $products=\App\Models\product::where("numbers",">=",1)->whereIn("id",$arr2)->where("shipping",0)->orderBy("price_offer","ASC")->orderBy("price","ASC")->paginate($request->pagin);


                }

            }else{

                if (isset($request->department_id[1])) {
                
                    $products=\App\Models\product::where("numbers",">=",1)->whereIn("department_id",$request->department_id)->whereIn("id",$arr2)->orderBy("price_offer","ASC")->orderBy("price","ASC")->paginate($request->pagin);
                
                
                }else{


                    $products=\App\Models\product::where("numbers",">=",1)->whereIn("id",$arr2)->orderBy("price_offer","ASC")->orderBy("price","ASC")->paginate($request->pagin);

                }

            }

        }else if($request->order_by==3){

            if(isset($request->shipping)){

                if (isset($request->department_id[1])) {
                
                    $products=\App\Models\product::where("numbers",">=",1)->whereIn("department_id",$request->department_id)->whereIn("id",$arr2)->where("shipping",0)->orderBy("price_offer","DESC")->orderBy("price","DESC")->paginate($request->pagin);
                
                }else{

                    $products=\App\Models\product::where("numbers",">=",1)->whereIn("id",$arr2)->where("shipping",0)->orderBy("price_offer","DESC")->orderBy("price","DESC")->paginate($request->pagin);

                }


            }else{

                if (isset($request->department_id[1])) {
                
                    $products=\App\Models\product::where("numbers",">=",1)->whereIn("department_id",$request->department_id)->whereIn("id",$arr2)->orderBy("price_offer","DESC")->orderBy("price","DESC")->paginate($request->pagin);                
                
                }else{


                    $products=\App\Models\product::where("numbers",">=",1)->whereIn("id",$arr2)->orderBy("price_offer","DESC")->orderBy("price","DESC")->paginate($request->pagin);                

                }



            }



        }else if($request->order_by==4){

            if(isset($request->shipping)){

                if (isset($request->department_id[1])) {
                
                    $products=\App\Models\product::where("numbers",">=",1)->whereIn("department_id",$request->department_id)->whereIn("id",$arr2)->where("shipping",0)->orderBy("rating","DESC")->paginate($request->pagin);
                
                }else{

                    $products=\App\Models\product::where("numbers",">=",1)->whereIn("id",$arr2)->where("shipping",0)->orderBy("rating","DESC")->paginate($request->pagin);

                }
               

            }else{

                if (isset($request->department_id[1])) {
                
                    $products=\App\Models\product::where("numbers",1)->whereIn("department_id",$request->department_id)->whereIn("id",$arr2)->orderBy("rating","DESC")->paginate($request->pagin);
                
                }else{

                    $products=\App\Models\product::where("numbers",1)->whereIn("id",$arr2)->orderBy("rating","DESC")->paginate($request->pagin);

                }


            }


        }

        return view("site.shop",["products"=>$products]);

    }


    public function show_single($id){
        $department=\App\Models\category::find($id);
        $products=\App\Models\product::where("numbers",">=",1)->where("department_id",$department->id)->paginate(8);
        return view("site.single_department",["department"=>$department,"products"=>$products]);
    }


    public function paginate_order_department(Request $request){

        if($request->order_by==0){
            $products=\App\Models\product::where("department_id",$request->department)->where("numbers",">=",1)->orderBy("number_selled","DESC")->paginate($request->pagin);
        }else if($request->order_by==1){
            $products=\App\Models\product::where("department_id",$request->department)->where("numbers",">=",1)->orderBy("price_offer","ASC")->orderBy("price","ASC")->paginate($request->pagin);
        }else if($request->order_by==2){
            $products=\App\Models\product::where("department_id",$request->department)->where("numbers",">=",1)->orderBy("price_offer","DESC")->orderBy("price","DESC")->paginate($request->pagin);
        }else if($request->order_by==3){
            $products=\App\Models\product::where("department_id",$request->department)->where("numbers",">=",1)->orderBy("rating","DESC")->paginate($request->pagin);
        }else if($request->order_by==4){
            $products=\App\Models\product::where("department_id",$request->department)->where("numbers",">=",1)->orderBy("id","DESC")->paginate($request->pagin);
        }
        $div="";
        $pagin="".$products->links();
        foreach($products as $product){

            $div.="
            
            <div class='product-item col-lg-4 col-md-6 col-sm-6'>
                        <div class='item w-100'>
                            <div class='image-container'>
                                <a class='item-img-wrapper-link' href=".route("product_detail",$product->id).">
                                    <img loading='lazy' style='width:320px;height:200px' class='img-fluid' src=".asset("img/upload/product/".$product->photo)." alt='Product'>
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
                                        
                                    else{


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
                                        for($i =$product->department; $i != null; $i=$i->department_parent)
                                        {

                                           $div.="<li class='has-separator'>";
                                            if(\LaravelLocalization::getCurrentLocale()=="ar"){

                                                $div.="<a href=".route("show_single_department",$i->id).">$i->name_ar</a>";

                                            }


                                            else{


                                               $div.=" <a href=".route("show_single_department",$i->id).">$i->name_en</a>";

                                            }

                                        $div.="</li>";
      
                                        }
                                        
                                      
                                   $div.="</ul>
                                    <h6 class='item-title'>";

                                        if(\LaravelLocalization::getCurrentLocale()=="ar")
                                        {
                                        $div.="<a href=".route("product_detail",$product->id).">$product->title_ar</a>";
                                        }

                                        else{

                                            $div.="<a href=".route("product_detail",$product->id).">$product->title_en</a>";

                                        }



                                    $div.="</h6>
                                    <div class='item-description'>";

                                            if(\LaravelLocalization::getCurrentLocale()=="ar")
                                        {

                                            $div.="<p> $product->content_ar </p>";

                                        }

                                            else
                                        {
                                           
                                           $div.="<p>$product->content_en</p>";
                                        }


                                   $div.="</div>
                                    <div class='item-stars'>";
                                        for($i = 0; $i <$product->rating; $i++){

                                            $div.="<i class='fa fa-star' style='color:orange'></i>";

                                        }
                                        
                                        for($i = $product->rating; $i <5; $i++){

                                            $div.="<i class='fa fa-star' style='color:rgb(194, 186, 186)'></i>";

                                        }
                                        $div.="<span>(".count(\App\Models\number_stars::where("product_id",$product->id)->get()).")</span>
                                    </div>
                                </div>
                                <div class='price-template'>
                                    <div class='item-new-price'>
                                        $";
                                        if($product->price_offer!=""&& $product->end_offer_at> \Carbon\Carbon::now()->toDateString())
                                        {
                                            $div.=$product->price_offer;
                                        }
                                        else{
                                            $div.=$product->price;
                                        }

                                        
                                        $div.=".00
                                    </div>
                                    <div class='item-old-price'>
                                        $$product->price.00
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>  
            ";



        }

        return response()->json(["pagin"=>$pagin,"div"=>$div]);

    }

}
