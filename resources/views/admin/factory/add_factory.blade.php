

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
  <form  class="col-sm-12 col-md-6  " method="POST"  action="{{ route("save_factory") }}" enctype="multipart/form-data">
      @csrf
      <div class="w-75 m-auto">
        <label>{{ __("messages.Name in Arabic") }}</label>
        <input value="{{ old("name_ar") }}" class="form-control @error('name_ar')is-invalid @enderror" name="name_ar" placeholder="{{ __("messages.Enter Name in Arabic") }}"/>

        @error('name_ar')
        <span class="invalid-feedback " role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
        
      </div>
      
      
      <div class="w-75 m-auto">
        <label>{{ __("messages.Name in English") }}</label>
        <input value="{{ old("name_en") }}" class="form-control @error('name_en')is-invalid @enderror" name="name_en" placeholder="{{ __("messages.Enter Name in English") }}"/>

        @error('name_en')
        <span class="invalid-feedback " role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
        
      </div>
      
      
      
      
      <div class="w-75 m-auto">
        <label>{{ __("messages.person") }}</label>
        <input value="{{ old("person") }}" class="form-control @error('person')is-invalid @enderror" name="person" placeholder="{{ __("messages.Enter person Name") }}"/>

        @error('person')
        <span class="invalid-feedback " role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
          </div>

      <div class="w-75 m-auto">
        <label>{{ __("messages.Mobile") }}</label>
        <input value="{{ old("mobile") }}" class="form-control @error('mobile')is-invalid @enderror" name="mobile" placeholder="{{ __("messages.Enter Mobile") }}"/>

        @error('mobile')
        <span class="invalid-feedback " role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
          </div>

          <div class="w-75 m-auto">

          <label>{{ __("messages.Email") }}</label>
          <input  value="{{ old("email") }}" type="email" class="form-control @error('email')is-invalid @enderror" name="email" placeholder="{{ __("messages.Enter email") }}"/>
  
          @error('email')
          <span class="invalid-feedback " role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
          
          </div>

          <div class="w-75 m-auto">

          <label>{{ __("messages.Facebook") }}</label>
          <input value="{{ old("facebook") }}" type="url" class="form-control @error('facebook')is-invalid @enderror" name="facebook" placeholder="{{ __("messages.Enter url facebook") }}"/>
  
          @error('facebook')
          <span class="invalid-feedback " role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
        </div> 
        
        
        <div class="w-75 m-auto">

        <label>{{ __("messages.Address") }}</label>
        <input value="{{ old("address") }}" id="address" class="form-control @error('address')is-invalid @enderror" name="address" placeholder="{{ __("messages.Enter Address in Map") }}" readonly/>

        @error('address')
        <span class="invalid-feedback " role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
    </div>
    <br/>
    <div id='map' style='width:75%; margin:auto; height: 200px;'></div>




      <div class="w-75 m-auto">
        <label>{{ __("messages.icon") }}</label>
        <input type="file" class="form-control @error('icon')is-invalid @enderror" name="icon" placeholder="Enter icon"/>

        @error('icon')
        <span class="invalid-feedback " role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
        
     </div>


      <br/>
      <div class="w-75  m-auto">
        <label>{{ __("messages.department") }}</label>
        <select class="form-control @error('department')is-invalid @enderror" name="department">
            <option value="">nothing</option>
            @foreach(\App\Models\category::get() as $department)
            @if(LaravelLocalization::getCurrentLocale())

            <option value="{{ $department->id }}">{{ $department->name_ar }}</option>

            @else

            <option value="{{ $department->id }}">{{ $department->name_en }}</option>


            @endif

            @endforeach

        </select>
        @error('department')
        <span class="invalid-feedback " role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
    
      </div>
          
      <br/>
      <div class="m-auto d-flex justify-content-center"><button class="btn btn-primary w-75   ">{{ __("messages.Create Factory") }}</button></div>
  </form>
  </div>
    </div>
  
    @include("admin.layout.footer")
  
  
  



