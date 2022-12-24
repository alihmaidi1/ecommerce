<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\user as requestuser;
use Illuminate\Support\Facades\Hash;

use function Psy\sh;

class operation extends Controller
{
    

    public function delete_user(Request $request){
        try{


            $user=User::find($request->id);
            $user->delete();

            $users=User::paginate(8);
            $pagin="".$users->links();
            $div="";
            foreach($users as $user){

                $div.="
                <tr>
                    <td><span class='btn btn-warning' style='font-weight:500'>$user->id</span></td>
                    <td>$user->name</td>
                    <td>$user->email</td>
                    <td><span>$user->level</span></td>
                    <td>$user->created_at</td>
                    <td>$user->updated_at</td>
                    <td>
                      <a href=".url("admin/edit_user/$user->id")." class='btn btn-primary'><i class='fa fa-edit'></i></a>
                      <a onclick='delete_user($user->id)'  class='btn btn-danger'><i class=' fa fa-trash'></i></a>
                    </td>
                </tr>
                ";


            }

            return response()->json(["success"=>trans("messages.the Account was Deleted"),"pagin"=>$pagin,"div"=>$div]);
        }catch(\Exception){
 
            return response()->json(["error"=>trans("messages.we Have An Error")]);



        }
    }

    public function add_user(){


        return view("user/add_user");
    }

    public function save_user(requestuser $request){

        try{


            User::create([
                "name"=>$request->name,
                "email"=>$request->email,
                "password"=>Hash::make($request->password),
                "level"=>$request->level
    
            ]);
            return redirect()->route("show_user")->with(["success"=>trans("messages.the Acoount was Created")]);
        }catch(\Exception){

            return redirect()->route("show_user")->with(["error"=>trans("messages.we Have  An Error")]);

        }

    }

    public function edit_user($id){
        
        $user=User::find($id);
        return view("user/edit_user",compact("user"));


    }

    public function change_user(requestuser $request){

        try{

            $user=User::find($request->id);
            $user->update([
                "name"=>$request->name,
                "email"=>$request->email,
                "password"=>sha1($request->password),
            ]);
            return redirect()->route("show_user")->with(["success"=>trans("messages.the Account was Updated")]);

        }catch(\Exception){

            return redirect()->route("show_user")->with(["error"=>trans("messages.we Have an Error")]);

        }
    }
}
