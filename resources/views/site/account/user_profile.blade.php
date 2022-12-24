@include("site.include.header")
@include("site.include.navbar")
<div class="page-style-a">
    <div class="container">
        <div class="page-intro">
            <h2>{{ __("messages.About") }}</h2>
            <ul class="bread-crumb">
                <li class="has-separator">
                    <i class="ion ion-md-home"></i>
                    <a href="{{ route("index") }}">{{ __("messages.Home") }}</a>
                </li>
                <li class="is-marked">
                    <a href="">{{ __("messages.My Profile") }}</a>
                </li>
            </ul>
        </div>
    </div>
</div>

<br/>
<div class=" col-sm-12 col-md-6 m-auto text-center" style="box-shadow:0px 0px 5px 5px rgb(236, 240, 236);border-radius:5px">
<h1 class="button p-3" style="font-weight: 900">{{ __("messages.My Information") }} </h1>
<div class="button ">

    <form id="form1" method="post" action={{ route("edit_profile_post") }} >  
    @csrf
    <div class=" mb-3" >
        <div class=" w-100" style="font-weight: 800;color:#000;width:25%;display:inline-block">{{ __("messages.Full Name") }}  </div>
        <input  name="name" style="border: 1px solid rgb(189, 189, 189);width:75%" class=" button button-black" value="{{ auth("web")->user()->name }}" placeholder="{{ __("messages.Full Name") }}"/>
        @error('name')
        <span style="color: rgb(202, 1, 1);font-weight:300" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror

    </div>
    
    
    <div class=" mb-3" >
        <div class=" w-100" style="font-weight: 800;color:#000;width:25%;display:inline-block">{{ __("messages.Email") }}</div>
        <input  style="border: 1px solid rgb(189, 189, 189);width:75%" disabled class=" button button-black" value="{{ auth("web")->user()->email }}" placeholder="Full Name"/>
    </div>
    
    
    <div class=" mb-3" >
        <div class=" w-100" style="font-weight: 800;color:#000;width:25%;display:inline-block">{{ __("messages.Login With") }}  </div>
        <input  style="border: 1px solid rgb(189, 189, 189);width:75%" class=" button button-black" disabled value="{{ auth("web")->user()->level }}" placeholder="Full Name"/>
    </div>
    
    
    <div class=" mb-3" >
        <div class=" w-100" style="font-weight: 800;color:#000;width:25%;display:inline-block"> {{ __("messages.Subscribe At") }} </div>
        <input   style="border: 1px solid rgb(189, 189, 189);width:75%" class=" button button-black" disabled value="{{ auth("web")->user()->created_at }}" placeholder="Full Name"/>
    </div>
    
</form>
<button  form="form1"  class="button button-outline-secondary me-5">{{ __("messages.Edit Profile") }}</button>

    <button class="ms-5 button  button-outline-secondary"><a  href="{{ route("forget_password") }}">{{ __("messages.Forget Password") }}</a></button>
    
</div>


    




</div>


@include("site.include.footer1")
@include("site.include.footer")
