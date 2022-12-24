<?php

namespace App\Http\Controllers\admin;
use App\Http\Requests\country_request;
use App\Http\Controllers\Controller;
use App\Models\country as ModelsCountry;
use Illuminate\Http\Request;


class country extends Controller
{
    //

    public function add_country(){

        return view("admin.country.add_country");
    }
    public function save_country(country_request $request){

        try{

            ModelsCountry::create([

                "name"=>$request->name,
                "abbr"=>$request->abbr,
                "mob"=>$request->mob

            ]);

        return redirect()->route("show_country")->with(["success"=>trans("messages.the country was Added")]); 
        }catch(\Exception){
            return redirect()->route("show_country")->with(["error"=>trans("messages.we Have An Error")]); 


        }


        
    }
    public function show_country(){

        return view("admin.country.show_country");
    }



    public function delete_country(Request $request){

        try{

            $country=ModelsCountry::find($request->id);
            $country->delete();
            $countrys=ModelsCountry::paginate(8);
            $pagin="".$countrys->links();
            $div="";
            foreach($countrys as $user){

                $div.="
                
                <tr>

                    <td><span class='btn  btn-warning'>$user->id</span></td>
                    <td>$user->name</td>
                    <td ><span class='btn'> $user->abbr</span></td>
                    <td>$user->mob</td>
                    <td>$user->created_at</td>
                    <td>$user->updated_at</td>
                    <td>
                      <a href=".url("admin/edit_country/$user->id")." class='btn btn-primary'><i class='fa fa-edit'></i></a>
                      <a onclick='delete_country($user->id)'  class='btn btn-danger'><i class=' fa fa-trash'></i></a>
                    </td>
                </tr>
                ";
            }
            return response()->json(["success"=>trans("messages.the country was Deleted"),"pagin"=>$pagin,"div"=>$div]);
        }catch(\Exception){
            return response()->json(["error"=>trans("messages.we Have An error")]);
        }


    }
    public function edit_country($id){

            $country=ModelsCountry::find($id);
           
            return view("admin.country.edit",compact("country"));

    }


    public function save_country1(country_request $request){

        try{

            $country=ModelsCountry::find($request->id);
            $country->update([

                "name"=>$request->name,
                "abbr"=>$request->abbr,
                "mob"=>$request->mob

            ]);
            return redirect()->route("show_country")->with(["success"=>trans("messages.the Country was Updated")]);
        }catch(\Exception){

            return redirect()->route("show_country")->with(["error"=>trans("messages.we Have An Error")]);

        }

    }
}
