<?php

namespace App\Http\Controllers\admin;
use App\Http\Requests\color_request;
use App\Http\Controllers\Controller;
use App\Models\color as ModelsColor;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\LaravelLocalization;
class color extends Controller
{
    


 


    public function show_color(){

        return view("admin.color.show_color");
    }
    public function add_color(){

        return view("admin.color.add_color");
    }

    public function save_color(color_request $request){

        try{
            
            
            $obg=new ModelsColor();
            $obg->name_en=$request->name_en;
            $obg->name_ar=$request->name_ar;
            $obg->color=$request->color;
            $obg->save();
        
        return redirect()->route("show_color")->with(["success"=>trans("messages.the color was created successfully")]);

        }catch(\Exception $ex){
            return redirect()->route("show_color")->with(["error"=>trans("messages.we have error")]);


        }

    }
    public function delete_color(Request $request){

        try{

            $color=ModelsColor::find($request->id);
            $color->delete();
            $colors=ModelsColor::paginate(8);
            $pagin="".$colors->links();
            $div="";
            foreach($colors as $user){

                $div.="
                
              <tr>

              <td style='vertical-align: middle;height:100%'><span class='btn btn-warning'>$user->id</span></td>";
            if(\LaravelLocalization::getCurrentLocale()=="ar")
                {
                    $div.="<td style='vertical-align: middle;height:100%'><span class='btn' >$user->name_ar</span></td>";
                }else{
                    $div.="<td style='vertical-align: middle;height:100%'><span class='btn' >$user->name_en</span></td>";
                }

              $div.="<td style='vertical-align: middle;height:100%'><div class='m-auto' style='width:40px;height:40px; background:$user->color'></div></td>
              <td style='vertical-align: middle;height:100%'>$user->created_at</td>
              <td style='vertical-align: middle;height:100%'>$user->updated_at</td>
              <td style='vertical-align: middle;height:100%'>
                <a href=".url("admin/edit_color/$user->id")." class='btn btn-primary'><i class='fa fa-edit'></i></a>
                <a onclick='delete_color($user->id)'  class='btn btn-danger'><i class='fa fa-trash'></i></a>
              </td>
          </tr> 
                ";
            }

            return response()->json(["success"=>trans("messages.the color was deleted"),"pagin"=>$pagin,"div"=>$div]);

        }catch(\Exception ){
            return response()->json(["error"=>trans("messages.we Have An Error")]);


        }
    }

    public function edit_color($id){

        $color=ModelsColor::find($id);
        return view("admin.color.edit_color",compact("color"));
    }
    public function save_color1(color_request $request){
        try{
            $color=ModelsColor::find($request->id);




            
            $color->update([

                "name_ar"=>$request->name_ar,
                "name_ar"=>$request->name,
                "color"=>$request->color,
            ]);

            return redirect()->route("show_color")->with(["success"=>trans("messages.the color was updated")]);
        }catch(\Exception $ex){
            return redirect()->route("show_color")->with(["error"=>trans("messages.we have error")]);


        }


    }


}
