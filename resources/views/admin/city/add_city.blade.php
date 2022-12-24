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
<form  class="col-sm-12 col-md-6  " method="POST" action="{{ route("save_city") }}">
    @csrf
    <div class="w-75 m-auto">
        <label>{{ __("messages.Name") }}</label>
        <input id="address" readonly class="form-control @error('name')is-invalid @enderror" name="name" placeholder="{{ __("messages.Enter Name") }}"/>   
        @error('name')
        <span class="invalid-feedback " role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
    
    </div>
    <br/>
    
    <div id='map' style='width: 75%; margin:auto; height: 200px;'></div>

    <br/>
    <div class="w-75  m-auto">
       
        <select class="form-control" name="country">
            @foreach(\App\Models\country::get() as $country)

            <option selected value="{{ $country->id }}"> {{ $country->name }}</option>
            @endforeach

        </select>

 @error('country')
        <span class="invalid-feedback " role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
    
    </div>
        
    <br/>
    <div class="m-auto d-flex justify-content-center"><button class="btn btn-primary w-75   ">{{ __("messages.Create City") }}</button></div>
</form>
</div>
  </div>

  @include("admin.layout.footer")

