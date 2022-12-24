<?php

namespace App\Http\Controllers\site2;

use App\Http\Controllers\Controller;
use App\Http\Requests\add_review;
use App\Models\number_stars;
use Illuminate\Http\Request;
use App\Models\product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class product_detail extends Controller
{
    
    public function index($id){


        $product=\App\Models\product::find($id);
        $reviews=\App\Models\number_stars::where("product_id",$id)->orderBy("rating","DESC")->paginate(5);
        return view("site.product",["product"=>$product,"reviews"=>$reviews]);

    }

    

    public function sort_review(Request $request){


        if($request->sort_by==0){

            $product=\App\Models\product::find($request->product_id);
            $view=\App\Models\number_stars::where("product_id",$request->product_id)->orderBy("rating","DESC")->paginate(5);
        }else{
            $view=\App\Models\number_stars::where("product_id",$request->product_id)->orderBy("rating","ASC")->paginate(5);
        }

        $div="";
        $pagin="".$view->links();
        foreach($view as $review1){
            $div.="
            <div class='review-data'>
                            <div class='reviewer-name-and-date'>
                                <h6 class='reviewer-name'>$review1->name</h6>
                                <h6 class='review-posted-date'>$review1->created_at</h6>
                            </div>
                            <div class='reviewer-stars-title-body'>
                                <div class='reviewer-stars'>
                                    <div class='star'>
                                        <span style='width:".($review1->rating*20)."%'></span>
                                    </div>
                                    <span class='review-title'>";
                                        if($review1->rating>4)
                                        {

                                        $div.=trans("messages.! Amazing");                                        

                                        }
                                        elseif($review1->rating>3)
                                        {
                                            $div.=trans("messages.! I Like it");
                                        }
                                        elseif($review1->rating>2)

                                        {
                                            $div.=trans("messages.! Good");

                                        }
                                        elseif($review1->rating>1)
                                        {
                                            $div.=trans("messages.! Not Bad");

                                        }
                                        else
                                        {

                                            $div.=trans("messages.! Bad");

                                        }
                                    $div.="</span>
                                </div>
                                <p class='review-body'>
                                    $review1->title
                                </p>
                            </div>
                        </div>                
            ";

        }



        return response()->json(["div"=>$div,"pagin"=>$pagin]);


    }


    public function add_review_ajax(add_review $request){


        number_stars::create([

            "product_id"=>$request->product_id,
            "name"=>$request->name,
            "email"=>$request->email,
            "title"=>$request->title,
            "review"=>$request->review,
            "rating"=>$request->rating
        ]);
        $one=count(number_stars::where("rating",1)->where("product_id",$request->product_id)->get());
        $two=count(number_stars::where("rating",2)->where("product_id",$request->product_id)->get());
        $three=count(number_stars::where("rating",3)->where("product_id",$request->product_id)->get());
        $four=count(number_stars::where("rating",4)->where("product_id",$request->product_id)->get());
        $five=count(number_stars::where("rating",5)->where("product_id",$request->product_id)->get());
        $avg=round(DB::table("number_stars")->where("product_id",$request->product_id)->sum("rating")/count(number_stars::where("product_id",$request->product_id)->get()),2) ;
        $product1=product::find($request->product_id);
        $product1->rating=round($avg);
        $product1->save();
        $all1=count(number_stars::where("product_id",$request->product_id)->get());
        if($request->sort_by==0){

        $reviews=number_stars::where("product_id",$request->product_id)->orderBy("rating","DESC")->paginate(5);

        }else{

            $reviews=number_stars::where("product_id",$request->product_id)->orderBy("rating","ASC")->paginate(5);

        }
        $pagin="".$reviews->links();
        $div="";
        foreach($reviews as $review){
            $precent1=$review->rating*20;
            $div.="<div class='review-data'>
            <div class='reviewer-name-and-date'>
                <h6 class='reviewer-name'>$review->name</h6>
                <h6 class='review-posted-date'>$review->created_at</h6>
            </div>
            <div class='reviewer-stars-title-body'>
                <div class='reviewer-stars'>
                    <div class='star'>
                        <span style='width: ".$precent1."%'></span>
                    </div>
                    <span class='review-title'>";
                    
                        if($review->rating>4)
                        {
                            $div.=trans("messages.! Amazing");                                        

                        }
                        elseif($review->rating>3){

                            $div.=trans("messages.! I Like it");

                        }
                        elseif($review->rating>2)
                        {
                        $div.=trans("messages.! Good");
                        }
                        elseif($review->rating>1)
                        {
                            $div.=trans("messages.! Not Bad");

                        }
                        else
                        {
                            $div.=trans("messages.! Bad");

                        }
                        
                    $div.="</span>
                </div>
                <p class='review-body'>
                    $review->title 
                </p>
            </div>
        </div>
        ";
        }
        $div2="";
        for($i=0;$i<round($avg);$i++){

            $div2.="<i class='fa fa-star' style='color:orange'></i>";

        }
        for($i=round($avg);$i<5;$i++){

            $div2.="<i class='fa fa-star' style='color: rgb(194, 187, 180)'></i>";
            
        }
        $div2.="<span id='sum_review1'> $all1</span>";
        return response()->json(["message"=>trans("messages.the review was add successfully"),"one"=>$one,"two"=>$two,"three"=>$three,"four"=>$four,"five"=>$five,"count"=>$all1,"avg"=>$avg,"div"=>$div,"div2"=>$div2,"pagin"=>$pagin]);

    }
    


}
