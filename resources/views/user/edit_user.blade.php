
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


      <br/>
      <div class="row" id="parent_user" >
          <div class="col-6 " id="section_one_user"><img  id="img-user" src="{{ asset("img/admin/user.jpg") }}"/></div>
<form  class="col-sm-12 col-md-6  " method="POST"action="{{ route("change_user") }}">
    @csrf
    <input type="hidden" name="id" value="{{ $user->id }}"/>

    <div class="w-75 m-auto">
        <label>{{ __("messages.Name") }}</label>
        <input  value="{{ $user->name }}" class="form-control @error('name')is-invalid @enderror" name="name" placeholder="{{ __("messages.Enter Name") }}"/>
        @error('name')
        <span class="invalid-feedback " role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
    
    </div>
    
    <div class="w-75  m-auto">
        <label>{{ __("messages.Email") }}</label>
        <input type="email"  value="{{ $user->email }}" class="form-control @error('email')is-invalid @enderror" name="email" placeholder="{{ __("messages.Enter Email") }}"/>
        @error('email')
        <span class="invalid-feedback " role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror

    </div>
        <div class="w-75 m-auto">
        <label>{{ __("messages.Level") }}</label>
        <input  value="user" readonly class="form-control @error('level')is-invalid @enderror" name="level" placeholder="{{ __("messages.Enter Level") }}"/>
        @error('level')
        <span class="invalid-feedback " role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
 
    </div>
   
    <div class="w-75 m-auto">
        <label>{{ __("messages.Password") }}</label>
        <input  type="password" class="form-control @error('password')is-invalid @enderror" name="password" placeholder="{{ __("messages.Enter Password") }}"/>
        @error('password')
        <span class="invalid-feedback " role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror    
     
    </div>
    <div class="w-75 m-auto">
        <label>{{ __("messages.Confirm Password") }}</label>
        <input type="password" value="{{ old("confirm_password") }}" class="form-control @error('confirm_password')is-invalid @enderror" name="confirm_password" placeholder="{{ __("messages.Confirm Password") }}"/>
        @error('confirm_password')
        <span class="invalid-feedback " role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
 
    </div>
    <br/>
    <div class="m-auto d-flex justify-content-center"><button class="btn btn-primary w-75   ">{{ __("messages.Edit User") }}</button></div>
</form>
</div>
  </div>

  @include("admin.layout.footer")
