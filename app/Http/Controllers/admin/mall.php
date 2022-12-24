<?php

namespace App\Http\Controllers\admin;
use App\Http\Requests\mall_request;
use App\Http\Controllers\Controller;
use App\Models\mall as ModelsMall;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\LaravelLocalization;
class mall extends Controller
{
  
 


    public function show_mall(){

        return view("admin.mall.show_mall");
    }
    public function add_mall(){

        return view("admin.mall.add_mall");
    }

    public function save_mall(mall_request $request){

        try{
            $img2=save_img($request->icon,public_path("img/upload/mall/"));

            
            $obg=new ModelsMall();
            $obg->name_en=$request->name_en;
            $obg->name_ar=$request->name_ar;
            $obg->person=$request->person;
            $obg->email=$request->email;
            $obg->mobile=$request->mobile;
            $obg->icon=$img2;
            $obg->address=$request->address;
            $obg->save();
        
        return redirect()->route("show_mall")->with(["success"=>trans("messages.the mall was created successfully")]);

        }catch(\Exception $ex){
            return redirect()->route("show_mall")->with(["error"=>trans("messages.we have error")]);


        }

    }
    public function delete_mall(Request $request){

        try{

            $mall=ModelsMall::find($request->id);
            unlink(public_path("img/upload/mall/".$mall->icon));
            $mall->delete();

            $malls=ModelsMall::paginate(8);
            $pagin="".$malls->links();
            $div="";
            foreach($malls as $user){

                $div.="
                
                <tr>

                    <td style='vertical-align: middle;height:100%'><span class='btn btn-warning'>$user->id</span></td>
                    <td><img width='100px' src= '".asset("img/upload/mall/$user->icon")."' /></td>";
                    if(\LaravelLocalization::getCurrentLocale()=="ar")
                    {
                        $div.="<td style='vertical-align: middle;height:100%'>$user->name_ar</td>";
                    }else{
                        $div.="<td style='vertical-align: middle;height:100%'>$user->name_en</td>";
                    }

                    $div.="<td style='vertical-align: middle;height:100%'><span class='btn' >$user->person</span></td>
                    <td style='vertical-align: middle;height:100%'>$user->email</td>
                    <td style='vertical-align: middle;height:100%'>$user->mobile</td>
                    <td style='vertical-align: middle;height:100%'>$user->address</td>
                    <td style='vertical-align: middle;height:100%'>
                      <a href=".url("admin/edit_mall/$user->id")." class='btn btn-primary'><i class='fa fa-edit'></i></a>
                      <a  onclick='delete_mall($user->id)' class='btn btn-danger'><i class=' fa fa-trash'></i></a>
                    </td>
                </tr>
                ";
            }
            
            return response()->json(["success"=>trans("messages.the mall was deleted"),"pagin"=>$pagin,"div"=>$div]);

        }catch(\Exception ){
            return response()->json(["error"=>trans("messages.we Have An Error")]);

        }
    }

    public function edit_mall($id){

        $mall=ModelsMall::find($id);
        return view("admin.mall.edit_mall",compact("mall"));
    }
    public function save_mall1(mall_request $request){
        try{
            $mall=ModelsMall::find($request->id);

            if(empty($request->icon)){

                $img2=$mall->icon;
            }else{

                $img2=save_img($request->icon,public_path("img/upload/mall/"));
                unlink(public_path("img/upload/mall/".$mall->icon));
            }
            $mall->update([

                "name_en"=>$request->name_en,
                "name_ar"=>$request->name_ar,
                "person"=>$request->person,
                "email"=>$request->email,
                "mobile"=>$request->mobile,
                "icon"=>$img2,
                "address"=>$request->address
            ]);

            return redirect()->route("show_mall")->with(["success"=>trans("messages.the mall was updated")]);
        }catch(\Exception $ex){
            return redirect()->route("show_mall")->with(["error"=>trans("messages.we have error")]);


        }


    }









}
