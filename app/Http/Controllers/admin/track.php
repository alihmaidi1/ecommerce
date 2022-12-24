<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\track as ModelsTrack;
use Illuminate\Http\Request;
use App\Http\Requests\track_request;
use Mcamara\LaravelLocalization\LaravelLocalization;
class track extends Controller
{
    
    


    public function show_track(){

        return view("admin.track.show_track");
    }
    public function add_track(){

        return view("admin.track.add_track");
    }

    public function save_track(track_request $request){

        try{
            $img2=save_img($request->icon,public_path("img/upload/track/"));

            
            $obg=new ModelsTrack();
            $obg->name_ar=$request->name_ar;
            $obg->name_en=$request->name_en;
            $obg->person=$request->person;
            $obg->facebook=$request->facebook;
            $obg->website=$request->website;
            $obg->icon=$img2;
            $obg->phone=$request->phone;
            $obg->address=$request->address;
            $obg->save();
        
        return redirect()->route("show_track")->with(["success"=>trans("messages.the track was created successfully")]);

        }catch(\Exception $ex){
            return redirect()->route("show_track")->with(["error"=>trans("messages.we have error")]);


        }

    }
    public function delete_track(Request $request){

        try{

            $track=ModelsTrack::find($request->id);
            unlink(public_path("img/upload/track/".$track->icon));
            $track->delete();
            $tracks=ModelsTrack::paginate(8);
            $pagin="".$tracks->links();
            $div="";
            foreach($tracks as $user){

                $div.="
                <tr>
                    <td style='vertical-align: middle;height:100%'><span class='btn btn-warning'>$user->id</span></td>
                    <td><img style='width:130px;height:90px' src='".asset("img/upload/track/$user->icon")."' /></td>";
                    if(\LaravelLocalization::getCurrentLocale()=="ar")
                {

                    $div.="<td style='vertical-align: middle;height:100%'>$user->name_ar</td>";
                }else{
                    $div.="<td style='vertical-align: middle;height:100%'>$user->name_en</td>";
                }

                    $div.="<td style='vertical-align: middle;height:100%'><span class='btn' >$user->person</span></td>
                    <td style='vertical-align: middle;height:100%'>$user->website</td>
                    <td style='vertical-align: middle;height:100%'><a href='$user->facebook'>$user->facebook</a></td>
                    <td style='vertical-align: middle;height:100%'>$user->phone</td>                    
                    <td style='vertical-align: middle;height:100%'>
                      <a href=".url("admin/edit_track/$user->id")." class='btn btn-primary'><i class='fa fa-edit'></i></a>
                      <a onclick='delete_track($user->id)'  class='btn btn-danger'><i class=' fa fa-trash'></i></a>

                    </td>


                </tr>

                
                ";


            }


            return response()->json(["success"=>trans("messages.the track was deleted"),"pagin"=>$pagin,"div"=>$div]);

        }catch(\Exception $ex){
            
            return response()->json(["error"=>$ex->getMessage()]);

        }
    }

    public function edit_track($id){

        $track=ModelsTrack::find($id);
        return view("admin.track.edit_track",compact("track"));
    }
    public function save_track1(track_request $request){
        try{
            $track=ModelsTrack::find($request->id);

            if(empty($request->icon)){

                $img2=$track->icon;
            }else{

                $img2=save_img($request->icon,public_path("img/upload/track/"));
                unlink(public_path("img/upload/track/".$track->icon));
            }
            $track->update([
                "name_ar"=>$request->name_ar,
                "name_en"=>$request->name_en,
                "person"=>$request->person,
                "facebbok"=>$request->facebook,
                "website"=>$request->website,
                "icon"=>$img2,
                "phone"=>$request->phone,
                "address"=>$request->address
            ]);

            return redirect()->route("show_track")->with(["success"=>trans("messages.the track was updated")]);
        }catch(\Exception $ex){
            return redirect()->route("show_track")->with(["error"=>trans("messages.we have error")]);

        }
    }
}
