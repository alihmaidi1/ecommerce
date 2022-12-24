<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\factory1;
use Illuminate\Http\Request;
use App\Http\Requests\factory_request;
use Mcamara\LaravelLocalization\LaravelLocalization;
class factory extends Controller
{
    


    public function show_factory(){

        return view("admin.factory.show_factory");
    }
    public function add_factory(){

        return view("admin.factory.add_factory");
    }

    public function save_factory(factory_request $request){

        try{
            $img2=save_img($request->icon,public_path("img/upload/factory/"));

            $obg=new factory1();
            $obg->name_ar=$request->name_ar;
            $obg->name_en=$request->name_en;
            $obg->person=$request->person;
            $obg->mobile=$request->mobile;
            $obg->email=$request->email;
            $obg->facebook=$request->facebook;
            $obg->icon=$img2;
            $obg->address=$request->address;
            $obg->save();
        
        return redirect()->route("show_factory")->with(["success"=>trans("messages.the factory was created successfully")]);

        }catch(\Exception $ex){
            return redirect()->route("show_factory")->with(["error"=>trans("messages.we have error")]);


        }

    }
    public function delete_factory(Request $request){

        try{

            $factory=factory1::find($request->id);
            
            unlink(public_path("img/upload/factory/".$factory->icon));
            $factory->delete();
            $factorys=factory1::paginate(8);
            $div="";
            $pagin="".$factorys->links();
            foreach($factorys as $user){

                $div.="
                
                <tr>

                    <td style='vertical-align: middle ;height:100%'> <span class='btn btn-warning'>$user->id</span></td>";
                    if(\LaravelLocalization::getCurrentLocale()=="ar")
                    {
                       $div.="<td style='vertical-align: middle ;height:100%'>$user->name_ar</td>";
                    }else{
                        $div.="<td style='vertical-align: middle ;height:100%'>$user->name_en</td>";
                    }

                    $div.="<td style='vertical-align: middle ;height:100%'>$user->person</td>
                    <td style='vertical-align: middle ;height:100%'><span class='btn' >$user->mobile</span></td>
                    <td style='vertical-align: middle ;height:100%'>$user->email</td>
                    <td style='vertical-align: middle ;height:100%'><a href='$user->facebook'>$user->facebook</a></td>
                    <td style='vertical-align: middle ;height:100%'>$user->address</td>
                    <td>
                      <a href=".url("admin/edit_factory/$user->id")." class='btn btn-primary'><i class='fa fa-edit'></i></a>
                      <a onclick='delete_factory($user->id)'  class='btn btn-danger'><i class=' fa fa-trash'></i></a>
                    </td>
                </tr>
                ";
            }

            return response()->json(["success"=>trans("messages.the factory was deleted"),"pagin"=>$pagin,"div"=>$div]);

        }catch(\Exception $ex){

            return response()->json(["error"=>trans("messages.we have error")]);
        }
    }

    public function edit_factory($id){

        $factory=factory1::find($id);
        return view("admin.factory.edit_factory",compact("factory"));
    }
    public function save_factory1(factory_request $request){
        try{
            $factory=factory1::find($request->id);

            if(empty($request->icon)){

                $img2=$factory->icon;
            }else{

                $img2=save_img($request->icon,public_path("img/upload/factory/"));
                unlink(public_path("img/upload/factory/".$factory->icon));
            }
            $factory->update([

                "name_en"=>$request->name_en,
                "name_ar"=>$request->name_ar,
                "person"=>$request->person,
                "mobile"=>$request->mobile,
                "email"=>$request->email,
                "facebbok"=>$request->facebook,
                "icon"=>$img2,
                "address"=>$request->address
            ]);

            return redirect()->route("show_factory")->with(["success"=>trans("messages.the factory was updated")]);
        }catch(\Exception){
            return redirect()->route("show_factory")->with(["error"=>trans("messages.we have An Error")]);


        }


    }






}
