<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\area as ModelsArea;
use Illuminate\Http\Request;
use App\Http\Requests\area_request;
class area extends Controller
{


    public function show_area(){

        return view("admin.area.show_area");
    }

    public function add_area(){

        return view("admin.area.add_area");
    }

    public function save_area(area_request $request){

        try{

        ModelsArea::create([
            "name"=>$request->name,
            "city_id"=>$request->city
        ]);

        return redirect()->route("show_area")->with(["success"=>trans("messages.the area was created successfully")]);

        }catch(\Exception $ex){
            return redirect()->route("show_area")->with(["error"=>trans("messages.we Have error")]);


        }

    }
    public function delete_area(Request $request){

        try{

            $area=ModelsArea::find($request->id);
            $area->delete();
            $areas=ModelsArea::paginate(8);
            $div="";
            $pagin="".$areas->links();
            foreach($areas as $user){

                $div.="
                <tr>

                    <td><span class='btn btn-warning'>$user->id</span></td>
                    <td>$user->name</td>
                    <td><span class='btn' >".$user->city->name."</span></td>
                    <td>$user->created_at</td>
                    <td>$user->updated_at</td>
                    <td>
                      <a href=".url("admin/edit_area/$user->id")." class='btn btn-primary'><i class='fa fa-edit'></i></a>
                      <a  onclick='delete_area($user->id)'  class='btn btn-danger'><i class=' fa fa-trash'></i></a>
                    </td>
                </tr>
                ";
}

            return response()->json(["success"=>trans("messages.the area was deleted"),"pagin"=>$pagin,"div"=>$div]);

        }catch(\Exception ){
            return response()->json(["error"=>trans("messages.we Have An Error")]);



        }
    }

    public function edit_area($id){

        $area=ModelsArea::find($id);
        return view("admin.area.edit_area",compact("area"));
    }
    public function save_area1(area_request $request){
        try{

            $area=ModelsArea::find($request->id);
            $area->update([

                "name"=>$request->name,
                "city_id"=>$request->city
            ]);

            return redirect()->route("show_area")->with(["success"=>trans("messages.the area was updated")]);
        }catch(\Exception){
            return redirect()->route("show_area")->with(["error"=>trans("messages.we have An Error")]);


        }


    }



}
