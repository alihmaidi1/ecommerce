@include('admin.layout.header')

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">


  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src={{ asset("AdminLTE/dist/img/AdminLTELogo.png") }} alt="AdminLTELogo" height="60" width="60">
  </div>
  
  <!-- Preloader -->
  @include('admin.layout.messages')
  @include('admin.layout.navbar')
  @include('admin.layout.sidebar')
  <div class="content-wrapper">
    <div class="container">
        <br/>
        @if(session()->has("success"))
    <div class="alert alert-success d-flex justify-content-center">{{ session()->get("success") }}</div>
        @endif
        @if(session()->has("error"))
    <div class="alert alert-danger d-flex justify-content-center">{{ session()->get("error") }}</div>
        @endif
        <br/>
        <form method="POST" action="{{ route("add_setting") }}" enctype="multipart/form-data">
        
            @csrf
            <div class="w-50 m-auto">
               <div class="d-none"> {!! $admin11=\App\Models\setting::find(1) !!}</div>
            <label>{{ __("messages.Name in English") }}</label>
            <input value="{{ $admin11->name_en }}" type="text" class="form-control @error('name_en')is-invalid @enderror" name="name_en" placeholder="{{ __("messages.Name in English") }}"/>
            @error('name_en')
            <span class="invalid-feedback " role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    
        </div>
        <div class="w-50 m-auto">
            <label>{{ __("messages.Name in Arabic") }}</label>
            <input value="{{ $admin11->name_ar }}" type="text" class="form-control @error('name_ar')is-invalid @enderror" name="name_ar" placeholder="{{ __("messages.name in Arabic") }}"/>
            @error('name_ar')
            <span class="invalid-feedback " role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    
        </div>  

        <div class="w-50 m-auto">
            <label>{{ __("messages.Address") }}</label>
            <input value="{{ $admin11->address }}" type="text" class="form-control @error('address')is-invalid @enderror" name="address" placeholder="{{ __("messages.Address") }}"/>
            @error('address')
            <span class="invalid-feedback " role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    
        </div>  

        <div class="w-50 m-auto">
            <label>{{ __("messages.Phone") }}</label>
            <input value="{{ $admin11->phone }}" type="text" class="form-control @error('phone')is-invalid @enderror" name="phone" placeholder="{{ __("messages.phone") }}"/>
            @error('phone')
            <span class="invalid-feedback " role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    
        </div>  

        <div class="w-50 m-auto">
            <label>{{ __("messages.Time work") }}</label>
            <input value="{{ $admin11->time_work }}" type="text" class="form-control @error('time_work')is-invalid @enderror" name="time_work" placeholder="{{ __("messages.time_work") }}"/>
            @error('time_work')
            <span class="invalid-feedback " role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    
        </div>  

        <div class="w-50 m-auto">
            <label>{{ __("messages.Facebook") }}</label>
            <input value="{{ $admin11->facebook }}" type="text" class="form-control @error('facebook')is-invalid @enderror" name="facebook" placeholder="{{ __("messages.facebook") }}"/>
            @error('facebook')
            <span class="invalid-feedback " role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    
        </div>  





        <div class="w-50 m-auto">
            <label>{{ __("messages.Email") }}</label>
            <input value="{{ $admin11->email }}" type="text" class="form-control @error('Email')is-invalid @enderror" name="Email" placeholder="{{ __("messages.Email") }}"/>
            @error('Email')
            <span class="invalid-feedback " role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    
        </div>  


        
        
        <div class="w-50 m-auto">
            <label>{{ __("messages.Logo") }}</label>
        <br/>
            <input type="File" class="form-control @error('logo')is-invalid @enderror" name="logo" placeholder="logo"/>
            @error('logo')
            <span class="invalid-feedback " role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    
        </div>      
        <br/>
        <div class="w-50 m-auto">
            <div><label>{{ __("messages.description") }}</label></div>
        <textarea cols="50" class="form-control @error('description')is-invalid @enderror" rows="5" placeholder="{{ __("messages.description") }}" name="description" style="resize: none"> {{ $admin11->description }}</textarea>
        @error('description')
        <span class="invalid-feedback " role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
    
    </div>

        <br/>
        <div class="w-50 m-auto">
            <div><label>{{ __("messages.keywords") }}</label></div>
        <textarea cols="50" placeholder="{{ __("messages.keywords") }}" rows="5" class="form-control @error('keyword')is-invalid @enderror" name="keyword" style="resize: none">{{ $admin11->keywords }}</textarea>
        @error('keyword')
        <span class="invalid-feedback " role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
    
    </div>
        <div class="w-50 m-auto">
            <br/>
        <select  name="status" class="form-control @error('status')is-invalid @enderror">

            <option value="open" @if($admin11->status=="open")selected @endif>{{ __("messages.open") }}</option>
            <option value="close" @if($admin11->status=="close")selected @endif>{{ __("messages.close") }}</option>
        </select>
        @error('status')
        <span class="invalid-feedback " role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror


        </div>

        
        <br/>
        <div class="w-50 m-auto">
            <div><label>{{ __("messages.messages") }}</label></div>
        <textarea cols="50" rows="5" placeholder="{{ __("messages.messages1") }}" class="form-control @error('message')is-invalid @enderror" name="message" style="resize: none">{{ $admin11->message }}</textarea>
        @error('message')
        <span class="invalid-feedback " role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
    
    </div>
        <div class="w-50 m-auto">

        <button class="btn btn-primary">{{ __("messages.Save") }}</button>
        </div>
    </div>
  








  </div>







  @include("admin.layout.footer")
