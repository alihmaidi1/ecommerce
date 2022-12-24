<?php

namespace App\Http\Controllers\site2;

use App\Http\Controllers\Controller;
use App\Http\Requests\change_password;
use App\Http\Requests\login_user;
use App\Http\Requests\register_user;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use com;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class account extends Controller
{
    //

    public function register_user(){

        return view("site.account.register");
    }

    public function register_post( register_user $request){

        try{
            $user=User::where("email",$request->email)->where("level","user")->get();
            if(count($user)==0){
                $user1=User::create([
                    "name"=>$request->name,
                    "email"=>$request->email,
                    "password"=>sha1($request->password) ,
                    "level"=>"user"
                ]);
                $user1=User::where("id",$user1->id)->first();
                auth('web')->login($user1);
        
                return redirect()->route("index");

            }else{

                return redirect()->back()->with(["error"=>trans("messages.this account is used try to login with it")]);
            }
        }catch(\Exception){

            return redirect()->back()->with(["error"=>trans("messages.You Have Error in Register")]);
            

        }



    }

    public function logout(){

        auth("web")->logout();
        return redirect()->back();
    }
    public function login(){

        return view("site.account.login");
    }

    public function post_login(login_user $request){
        try{
            $user=User::where("email",$request->email)->where("password",sha1($request->password))->first();
            if(empty($user)){
    
                return redirect()->back()->with(["error"=>trans("messages.the email or password is not correct")]);
     
            }else{
    
                auth("web")->login($user);
                return redirect()->route("index");
    
    
            }
    

        }catch(\Exception){   
        }
    }


    public function forget_password(){

        return view("site.account.forget_password");
    }

    public function send_email_forget(Request $request){

        try{

            $user=User::where("email",$request->email)->first();
            if(!empty($user)){
                $id=$user->id;
                 Mail::to($request->email)->send(new \App\Mail\reset_pass($id));
                return view("site.account.message_send_email");
    
            }else{
    
                return redirect()->back()->with(["error"=>trans("messages.this email is not found")]);
    
            }

        }catch(\Exception){

            return redirect()->back()->with(["error"=>trans("messages.we have error")]);

        }

    }
    public function change_pass($id){

        return view("site.account.new_password",compact("id"));

    }
    public function post_change(change_password $request){

        try{

            $user=User::where("id",$request->id)->first();
        
            $user->update(['password'=>sha1($request->password1)]);
            $user=User::where("id",$request->id)->first();
             Auth::guard("web")->login($user);
            return redirect()->route("index");
           

        }catch(\Exception){

            return redirect()->back()->with(["error"=>trans("messages.we have error")]);



        }
    }

    public function show_tracking_user(){

        return view("site.show_tracking_user");

    }

    public function user_profile(){

        return view("site.account.user_profile");
    }

    public function edit_profile_post(Request $request){


        try{

            $user1=User::find(auth('web')->user()->id);
            $user1->name=$request->name;
            $user1->save();
            return redirect()->back()->with(["success"=>trans("messages.the profile was edited successfully")]);
        
        }catch(\Exception){

            return redirect()->back()->with(["error"=>trans("messages.we have error")]);

        }
    }

    public function google_login($service){

        return  Socialite::driver($service)
        ->stateless()->redirect();

    }
    
    public function google_callback($service){

        $user = Socialite::driver($service)->stateless()->user();
        
        $user1=User::where("email",$user->email)->where("level",$service)->first();

        if($user1==null){

            $user2=User::create([
                "email"=>$user->email,
                "name"=>$user->name,
                "level"=>$service,
                "password"=>sha1($user->name)
            ]);

            auth("web")->login($user2);
            return redirect()->route("index");
        }else{
            auth("web")->login($user1);
            return redirect()->route("index");

        }

    }




}
