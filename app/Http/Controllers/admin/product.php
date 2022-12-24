<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\product as ModelsProduct;
use Illuminate\Http\Request;
use App\Http\Requests\product_request;
use App\Models\color;
use App\Models\color_product;
use App\Models\img;
use App\Models\size_product;
use Mcamara\LaravelLocalization\LaravelLocalization;
class product extends Controller
{

    public function show_product(){

        return view("admin.product.show_product");
    }

    public function add_product(){

        return view("admin.product.add_product");
    }
    public function save_product(product_request $request){

        try{
            $img2=[];
            foreach($request->photo as $photo1){
                $img2[]=save_img($photo1,public_path("img/upload/product/"));


            }

            


            $product12=ModelsProduct::create([

                "title_ar"=>$request->title_ar,
                "title_en"=>$request->title_en,
                "content_en"=>$request->content_en,
                "content_ar"=>$request->content_ar,
                "department_id"=>$request->department,
                "photo"=>$img2[0],
                "price"=>$request->price,
                "numbers"=>$request->numbers,
                "price_offer"=>$request->price_offer,
                "start_offer_at"=>$request->start_offer_at,
                "end_offer_at"=>$request->end_offer_at,
                "status"=>$request->status,
                "tax"=>$request->tax,
                "shipping"=>$request->shipping,
                "weight"=>$request->weight,
                "factory_id"=>$request->factory_id,
            ]);

            foreach($img2 as $img33){

                img::create([

                    "name"=>$img33,
                    "product_id"=>$product12->id
                ]);

            }
            
            foreach($request->color_id as $color){

                color_product::create([

                    "product_id"=>$product12->id,
                    "color_id"=>$color
                ]);

            }

            foreach($request->size_id as $size){

                size_product::create([

                    "product_id"=>$product12->id,
                    "size_id"=>$size
                ]);

            }

            
            dispatch(new \App\Jobs\news_letter($product12->id));

            return redirect()->route("show_product")->with(["success"=>trans("messages.the product was Created")]);

        }catch(\Exception $ex){

            return redirect()->route("show_product")->with(["error"=>trans("messages.we have error")]);

        }


    }
    public function delete_product(Request $request){

        try{

            $product=ModelsProduct::find($request->id);
            foreach(\App\Models\img::where("product_id",$request->id) as $img1){
                unlink(public_path("img/upload/product/".$img1->name));
            }
            $product->delete();

            $products=ModelsProduct::paginate(8);
            $pagins="".$products->links();
            $div="";
            foreach($products as $user){
                $div.="
                
                <tr>

                  <td style='vertical-align: middle;height:100%'><span class='btn btn-warning'>$user->id</span></td>
                  <td><img style='width:120px;height:90px' src='".asset("img/upload/product/$user->photo")."' /></td>";
                  if(\LaravelLocalization::getCurrentLocale()=="ar")
                {
                   $div.="<td style='vertical-align: middle;height:100%'><span class='btn' >$user->title_ar</span></td>";
                }else{

                    $div.="<td style='vertical-align: middle;height:100%'><span class='btn' >$user->title_en</span></td>";
                }

                  $div.="<td style='vertical-align: middle;height:100%'><span class='btn' >$user->numbers</span></td>
                  <td style='vertical-align: middle;height:100%'><span class='btn' >$user->price</span></td>";
                  if(\LaravelLocalization::getCurrentLocale()=="ar")
                    {
                    $div.="<td style='vertical-align: middle;height:100%'><span class='btn' >".$user->department->name_ar."</span></td>";
                    }else{

                        
                 $div.="<td style='vertical-align: middle;height:100%'><span class='btn' >".$user->department->name_en."</span></td>";
                    }
                  $div.="<td style='vertical-align: middle;height:100%'>$user->updated_at</td>
                  <td style='vertical-align: middle;height:100%'>
                    <a href=".url("admin/edit_product/$user->id")." class='btn btn-primary'><i class='fa fa-edit'></i></a>
                    <a  onclick='delete_product($user->id)'  class='btn btn-danger'><i class='fa fa-trash'></i></a>
                  </td>
              </tr>
                ";
            }

            return response()->json(["success"=>trans("messages.the product was Deleted"),"pagin"=>$pagins,"div"=>$div]);
        }catch(\Exception){
            
            return response()->json(["error"=>trans("messages.we Have An error")]);
        }


    }


    public function edit_product($id){

        $product=ModelsProduct::find($id);
       
        return view("admin.product.edit",compact("product"));

}


public function save_product1(Request $request){
    try{
        $product1=ModelsProduct::find($request->id);
        
        if(!isset($request->photo)){
            $img8=$product1->photo;
        }else{
            foreach(\App\Models\img::where("product_id",$product1->id)->get() as $img4){

                unlink(public_path("img/upload/product/".$img4->name));
                $img4->delete();

            }
            $img1=[];
            foreach($request->photo as $photo){

                $img1[]=save_img($photo,public_path("img/upload/product/"));            
            }

            foreach($img1 as $img6){

                \App\Models\img::create([

                    "name"=>$img6,
                    "product_id"=>$product1->id
                ]);

            }
            $img8=$img1[0];
        }

        $product1->update([
    
                "title_ar"=>$request->title_ar,
                "title_en"=>$request->title_en,
                "content_ar"=>$request->content_ar,
                "content_en"=>$request->content_en,
                "department_id"=>$request->department,
                "photo"=>$img8,
                "price"=>$request->price,
                "numbers"=>$request->numbers,
                "price_offer"=>$request->price_offer,
                "start_offer_at"=>$request->start_offer_at,
                "end_offer_at"=>$request->end_offer_at,
                "status"=>$request->status,
                "weight"=>$request->weight,
                "factory_id"=>$request->factory_id,
                "tax"=>$request->tax,
                "shipping"=>$request->shipping,

        ]);

        color_product::where("product_id",$product1->id)->delete();
        foreach($request->color_id as $color1){
            color_product::create([

                "color_id"=>$color1,
                "product_id"=>$product1->id,

            ]);


        }

        size_product::where("product_id",$product1->id)->delete();
        foreach($request->size_id as $size1){
            size_product::create([

                "size_id"=>$size1,
                "product_id"=>$product1->id,

            ]);


        }
       

        return redirect()->route("show_product")->with(["success"=>trans("messages.the Product was Updated")]);
    }catch(\Exception $ex){

        return redirect()->route("show_product")->with(["error"=>trans("messages.we have error")]);

    }

}


public function show_department_product($id){

    $product12=ModelsProduct::where("department_id",$id)->get();

    return view("admin.product.show_department_product",compact("product12"));

}





}
