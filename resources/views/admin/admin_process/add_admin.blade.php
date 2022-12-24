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
<form method="POST" action="{{ route("save_admin") }}">
    @csrf
    <div class="w-50 m-auto">
        <label>{{ __("messages.Name_en") }}</label>
        <input class="form-control @error('name_en')is-invalid @enderror" value="{{ old("name_en") }}"  name="name_en" placeholder="{{ __("messages.Enter Name in English") }}" required/>
        @error('name_en')
        <span class="invalid-feedback " role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
    </div>
    
    <div class="w-50 m-auto">
        <label>{{ __("messages.Name_ar") }}</label>
        <input class="form-control @error('name_ar')is-invalid @enderror" value="{{ old("name_ar") }}"  name="name_ar" placeholder="{{ __("messages.Enter Name in Arabic") }}" required/>
        @error('name_ar')
        <span class="invalid-feedback " role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
    </div>
    
    <div class="w-50 m-auto">
        <label>{{ __("messages.Email") }}</label>
        <input type="email" value="{{ old("email") }}" class="form-control @error('email')is-invalid @enderror" name="email" placeholder="{{ __("messages.Enter Email") }}" required/>

    </div>
    @error('email')
    <span class="invalid-feedback " role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror
    <div class="w-50 m-auto">
        <label>{{ __("messages.Password") }}</label>
        <input type="password" class="form-control @error('password')is-invalid @enderror" name="password" placeholder="{{ __("messages.Enter Password") }}" required/>

    </div>
    @error('password')
    <span class="invalid-feedback " role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror
    <div class="w-50 m-auto">
        <label>{{ __("messages.Confirm Password") }}</label>
        <input type="password" class="form-control @error('name')is-invalid @enderror" name="confirm_password" placeholder="{{ __("messages.Confirm Password") }}" required/>

    </div>
    @error('confirm_password')
    <span class="invalid-feedback " role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror
    <br/>
    <div class="d-flex justify-content-center"><button class="btn btn-primary w-25  ">{{ __("messages.Create Admin") }}</button></div>
</form>
  </div>

  @include("admin.layout.footer")
