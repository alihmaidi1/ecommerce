<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class suggest extends Controller
{
 
 public function show(){

    return view("admin.suggest.show");
 }

 public function delete(Request $request){

    try{

        \App\Models\suggest::find($request->id)->delete();

        $suggests=\App\Models\suggest::paginate(8);
        $pagin="".$suggests->links();
        $div="";
        foreach($suggests as $suggest){

            $div.="
            <tr>

            <td style='vertical-align: middle ;'><span class='btn btn-warning'>$suggest->id</span></td>
            <td style='vertical-align: middle ;'><span class='btn' >$suggest->name</span></td>
            <td style='vertical-align: middle ;'><span class='btn' >$suggest->email</span></td>
            <td style='vertical-align: middle ;'>$suggest->subject</td>
            <td style='min-width:200px;vertical-align: middle ;overflow:auto;height:150px'>$suggest->content</td>
            <td style='vertical-align: middle ;'>$suggest->created_at</td>
            <td style='vertical-align: middle ;'>
              <a  onclick='delete_suggest($suggest->id)'  class='btn btn-danger'><i class=' fa fa-trash'></i></a>

            </td>


        </tr>
        
            ";

        }
        return response()->json(["success"=>trans("messages.the suggest was deleted"),"pagin"=>$pagin,"div"=>$div]);


    }catch(\Exception){

        return response()->json(["error"=>trans("messages.we have error")]);


    }

 }
    //
}
