<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\category;
use App\Http\Requests\department_request;
use Mcamara\LaravelLocalization\LaravelLocalization;
class department extends Controller
{
    //
    public function show_department(){

        return view("admin.department.show_department");
    }

    public function add_department(){

        return view("admin.department.add_department");
    }
    public function save_department(department_request $request){

        try{
            $img2=save_img($request->icon,public_path("img/upload/department/"));
            category::create([

                "name_ar"=>$request->name_ar,
                "name_en"=>$request->name_en,                
                "description"=>$request->description,
                "keyword"=>$request->keyword,
                "icon"=>$img2,
                "parent"=>$request->department
            ]);

            return redirect()->route("show_department")->with(["success"=>trans("messages.the department was Created")]);

        }catch(\Exception $ex){

            return redirect()->route("show_department")->with(["error"=>trans("messages.we have error")]);

        }


    }
    public function delete_department(Request $request){

        try{

            $country=category::find($request->id);
            unlink(public_path("img/upload/department/".$country->icon));
            $country->delete();
            $departments=category::paginate(8);
            $div="";
            $pagin="".$departments->links();
            foreach($departments as $user){

                $div.="
                
                <tr style='vertical-align: middle ;height:100%'>

                <td  style='vertical-align: middle ;height:100%'><span class='btn btn-warning'>$user->id</span></td>
                <td ><img style='width:110px;height:80px' src=".asset("img/upload/department/$user->icon")." /></td>";

                if(\LaravelLocalization::getCurrentLocale()=="ar")
                {
                    $div.="<td style='vertical-align: middle ;height:100%'><span >$user->name_ar</span></td>";
                }
                else
                {
                    $div.="<td style='vertical-align: middle ;height:100%' ><span >$user->name_en</span></td>";
                }
                
                $div.="<td style='vertical-align: middle ;height:100%' ><span class='btn' >$user->description</span></td>
                <td  style='vertical-align: middle ;height:100%'>$user->keyword</td>";

                if(\LaravelLocalization::getCurrentLocale()=="ar")

                {

                    $div.="<td  style='vertical-align: middle ;height:100%'> ";
                    if($user->parent!=0)
                    {
                        $div.=$user->department_parent->name_ar;
                    }
                    else{

                        $div.="<span class='text-bold'>".trans("messages.it is main department")."</span></td>";

                    }
                            
                }

                else{


                    $div.="
                    <td  style='vertical-align: middle ;height:100%'>";
                     if($user->parent!=0)
                     {

                        $div.=$user->department_parent->name_en;

                     }
                     
                     else 
                     {
                       $div.=" <span class='text-bold'>
                     
                         ".trans("messages.it is main department")."</span> </td>";
   
                     }
                    
                }

                
                
                $div.="<td  style='vertical-align: middle ;height:100%'>$user->created_at</td>
                <td style='vertical-align: middle ;height:100%'>$user->updated_at</td>
                <td style='vertical-align: middle ;height:100%'>
                  <a href=".url("admin/edit_department/$user->id")." class='btn btn-primary'><i class='fa fa-edit'></i></a>
                  <a  onclick='delete_department($user->id)'  class='btn btn-danger'><i class='fa fa-trash'></i></a>
                </td>
            </tr>
                ";


            }

            return response()->json(["success"=>trans("messages.the department was Deleted"),"pagin"=>$pagin,"div"=>$div]);


        }catch(\Exception){

            return response()->json(["error"=>trans("messages.we Have An error")]);


        }


    }


    public function edit_department($id){

        $department=category::find($id);
       
        return view("admin.department.edit",compact("department"));

}


public function save_department1(department_request $request){

    try{
        $department1=category::find($request->id);

        if(empty($request->icon)){
            $img1=$department1->icon;
        }else{

            $img1=save_img($request->icon,public_path("img/upload/department/"));
            unlink(public_path("img/upload/department/".$department1->icon));
        }

        $department1->update([

            "name"=>$request->name,
            "description"=>$request->description,
            "keyword"=>$request->keyword,
            "parent"=>$request->parent,
            "icon"=>$img1
        ]);
        return redirect()->route("show_department")->with(["success"=>trans("messages.the department was Updated")]);
    }catch(\Exception){

        return redirect()->route("show_department")->with(["error"=>trans("messages.we Have An Error")]);

    }

}


public function get_department(Request $request){

    $departments=category::find($request->get("id"))->size;
    $text="";
    foreach($departments as $obg){

        $text.="<option value=".$obg->id.">".$obg->name."</option>";
    }

    return $text;
}



}
