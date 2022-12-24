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
<form  class="col-sm-12 col-md-6" enctype="multipart/form-data" method="POST" action="{{ route("change_mall") }}">
    @csrf
    <input type="hidden" name="id" value="{{ $mall->id }}"/>

    <div class="w-75 m-auto">
        <label>{{ __("messages.Name in English") }}</label>
        <input class="form-control @error('name_en')is-invalid @enderror" name="name_en" value="{{ $mall->name_en }}" placeholder="{{ __("messages.Enter Name in English") }}"/>
        @error('name_en')
        <span class="invalid-feedback " role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
    </div>


    <div class="w-75 m-auto">
        <label>{{ __("messages.Name in Arabic") }}</label>
        <input class="form-control @error('name_ar')is-invalid @enderror" name="name_ar" value="{{ $mall->name_ar }}" placeholder="{{ __("messages.Enter Name in Arabic") }}"/>
        @error('name_ar')
        <span class="invalid-feedback " role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
    </div>


    <div class="w-75 m-auto">
        <label>{{ __("messages.person") }}</label>
        <input class="form-control @error('person')is-invalid @enderror" value="{{ $mall->person }}" name="person" placeholder="{{ __("messages.Enter person Name") }}"/>
        @error('person')
        <span class="invalid-feedback " role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
  </div>

<div class="w-75 m-auto">
    <label>{{ __("messages.Email") }}</label>
    <input type="email" class="form-control @error('email')is-invalid @enderror" value="{{ $mall->email }}" name="email" placeholder="{{ __("messages.Enter email") }}"/>
    @error('email')
    <span class="invalid-feedback " role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror

</div>



<div class="w-75 m-auto">
    <label>{{ __("messages.mobile") }}</label>
      <input  class="form-control @error('mobile')is-invalid @enderror" name="mobile" value="{{ $mall->mobile }}" placeholder="{{ __("messages.Enter mobile") }}"/>
      @error('mobile')
      <span class="invalid-feedback " role="alert">
          <strong>{{ $message }}</strong>
      </span>
  @enderror
</div>



<div class="w-75 m-auto">
    <label>{{ __("messages.Address") }}</label>
    <input  id="address" class="form-control @error('address')is-invalid @enderror" name="address" value="{{ $mall->address }}" placeholder="{{ __("messages.Enter address in map") }}" readonly/>
    @error('address')
    <span class="invalid-feedback " role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror
</div>
<br/>

    <div id='map' style='width: 75%; margin:auto; height: 200px;'></div>

    <div class="w-75  m-auto">
        <label>{{ __("messages.icon") }}</label>
        <input type="file" class="form-control @error('icon')is-invalid @enderror" name="icon" placeholder="Enter icon"/>
        @error('icon')
        <span class="invalid-feedback " role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
  
    </div>
     
    <br/>
    <div class="m-auto d-flex justify-content-center"><button class="btn btn-primary w-75   ">{{ __("messages.Edit mall") }}</button></div>
</form>
</div>
  </div>

  @include("admin.layout.footer")

