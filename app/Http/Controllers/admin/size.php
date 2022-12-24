<?php

namespace App\Http\Controllers\admin;
use App\Http\Requests\size_request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\LaravelLocalization;
use App\Models\size as size1;
class size extends Controller
{
    

 


    public function show_size(){

        return view("admin.size.show_size");
    }
    public function add_size(){

        return view("admin.size.add_size");
    }

    public function save_size(size_request $request){

        try{
            
            
            $obg=new size1();
            $obg->name_ar=$request->name_ar;
            $obg->name_en=$request->name_en;
            $obg->save();
        
        return redirect()->route("show_size")->with(["success"=>trans("messages.the size was created successfully")]);

        }catch(\Exception $ex){
            return redirect()->route("show_size")->with(["error"=>trans("messages.we have error")]);


        }

    }
    public function delete_size(Request $request){

        try{

            $size=size1::find($request->id);
            $size->delete();
            $sizes=size1::paginate(8);
            $pagin="".$sizes->links();
            $div="";
            foreach($sizes as $user){

                $div.="
                <tr>

                <td style='vertical-align: middle;height:100%'><span class='btn btn-warning'>$user->id</span></td>";
                if(\LaravelLocalization::getCurrentLocale()=="ar")
                {

                    $div.="<td style='vertical-align: middle;height:100%'><span class='btn' >$user->name_ar</span></td>";
                }else{

                    $div.="<td style='vertical-align: middle;height:100%'><span class='btn' >$user->name_en</span></td>";
                }
                $div.="<td style='vertical-align: middle;height:100%'>$user->created_at</td>
                <td style='vertical-align: middle;height:100%'>$user->updated_at</td>
                <td style='vertical-align: middle;height:100%'>
                  <a href=".url("admin/edit_size/$user->id")." class='btn btn-primary'><i class='fa fa-edit'></i></a>
                  <a  onclick='delete_size($user->id)'  class='btn btn-danger'><i class='fa fa-trash'></i></a>
                </td>
            </tr>                
                ";
            }
            return response()->json(["success"=>trans("messages.the size was deleted"),"pagin"=>$pagin,"div"=>$div]);
        }catch(\Exception ){
            return response()->json(["error"=>trans("messages.we Have An Error")]);

        }
    }

    public function edit_size($id){

        $size=size1::find($id);
        return view("admin.size.edit_size",compact("size"));
    }
    public function save_size1(size_request $request){
        try{
            $size=size1::find($request->id);




            
            $size->update([

                "name_ar"=>$request->name_ar,
                "name_en"=>$request->name_en,
            ]);

            return redirect()->route("show_size")->with(["success"=>trans("messages.the size was updated")]);
        }catch(\Exception $ex){
            return redirect()->route("show_size")->with(["error"=>trans("messages.we have error")]);


        }


    }




}
