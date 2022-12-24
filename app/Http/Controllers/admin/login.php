<?php

namespace App\Http\Controllers\admin;
use App\Http\Requests\admin as request_admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Models\Admin;
use Mcamara\LaravelLocalization\LaravelLocalization;
use App\Models\setting;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests\setting as setting_request;
use Illuminate\Support\Facades\Hash;

class login extends Controller
{
    //
    public function login(){

        return view("admin.login");
    }
    public function logout(){

        auth()->guard('admin')->logout();
        return redirect("/admin/login");
        
    }


    public function post_login(Request $request){

        if(auth()->guard("admin")->attempt(['email'=>$request->email,"password"=>$request->password])){

                 return redirect()->route("admin.index");
        }else{

            return redirect()->back()->with(["error"=>trans("messages.the email or password is not correct")]);
        }

    }
    public function add(){

        return view("admin.admin_process.add_admin");
    }
    public function save_admin(request_admin $request){

        try{

            Admin::create([
                "name_ar"=>$request->name_ar,
                "name_en"=>$request->name_en,
                "email"=>$request->email,
                "password"=>Hash::make($request->password) 

            ]);
            return redirect()->route("show_admin")->with(["success"=>trans("messages.the Account is Created")]);
        }
        catch(\Exception){
            return redirect()->route("show_admin")->with(["error"=>trans("messages.We Have an Error")]);


        }
    }
    public function delete_admin(Request $request){
        try{

            Admin::find($request->id)->delete();
            $div="";
            $admins=Admin::paginate(8);
            $pagin="".$admins->links();
            foreach($admins as $user){

                $div.="
                <tr>

                    <td  class='btn-sm '>$user->id</td>";
                    
                    if(\LaravelLocalization::getCurrentLocale()=="ar")
                {

                    $div.="<td>$user->name_ar</td>";

                }
                    else
                {

                    $div.="<td>$user->name_en</td>";

                }

                    $div.="<td>$user->email</td>
                    <td>$user->created_at</td>
                    <td>$user->updated_at</td>
                    <td>
                      <a href=".url("admin/edit_admin/$user->id")." class='btn btn-primary'><i class='fa fa-edit'></i></a>
                      <a  onclick='delete_admin($user->id)' class='btn btn-danger'><i class=' fa fa-trash'></i></a>

                    </td>


                </tr>

                
                ";


            }

            return response()->json(["success"=>trans("messages.the Account is Deleted successfully"),"pagin"=>$pagin,"div"=>$div]);
            
        }catch(\Exception){
            return response()->json(["error"=>trans("messages.We Have Error")]);
            
        }

    }
    public function edit_admin($id){

        $user=Admin::find($id);
        return view("admin.admin_process.edit",compact("user"));
    }
    public function change_admin(request_admin $request){

        try{

            $user=Admin::find($request->id);
            $user->update([
                "name_ar"=>$request->name_ar,
                "name_en"=>$request->name_en,
                "email"=>$request->email,
                "password"=>Hash::make($request->password) 
            ]);

            return redirect()->route("show_admin")->with(["success"=>trans("messages.the Account updated Successfully")]);
        }catch(\Exception){
            return redirect()->route("show_admin")->with(["error"=>trans("messages.We Have An Error")]);


        }
        

    }
    public function show_user(){

        return view("user/show_user");
    }
    public function settings(){

        return view("admin/setting");
    }
    public function add_setting(setting_request $request){
        try{

            $setting1=setting::find(1);
            if($request->logo!=null){

                $name_img=save_img($request->logo,public_path('img/setting'));
                unlink(public_path("img/setting/".$setting1->logo));
            }else{

                $name_img=$setting1->img;
            }
            $setting1->update([
                "name_en"=>$request->name_en,
                "name_ar"=>$request->name_ar,
                "email"=>$request->Email,
                "logo"=>$name_img,
                "description"=>$request->description,
                "keywords"=>$request->keyword,
                "status"=>$request->status,
                "message"=>$request->message,
                "phone"=>$request->phone,
                "address"=>$request->address,
                "time_work"=>$request->time_work,
                "facebook"=>$request->facebook
            ]);

            return redirect("/admin")->with(["success"=>trans("messages.the setting was updated")]);
        }catch(\Exception){

            return redirect("/admin")->with(["error"=>trans("messages.we have error")]);


        }
      

    }

    public function show_order_detail($id){

        try{

            $order=\App\Models\order::find($id);
            return view("admin.show_detail_order",["order"=>$order]);

        }catch(\Exception){

            return redirect()->back()->with(["error"=>trans("messages.we have error")]);
        }


    }

}
