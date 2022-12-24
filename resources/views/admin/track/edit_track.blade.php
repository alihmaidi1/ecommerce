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
  <form  class="col-sm-12 col-md-6  " method="POST"  action="{{ route("change_track") }}" enctype="multipart/form-data">
      @csrf
    <input type="hidden" name="id" value="{{ $track->id }}"/>

      <div class="w-75 m-auto">
        <label>{{ __("messages.Name in Arabic") }}</label>
        <input  class="form-control @error('name_ar')is-invalid @enderror" name="name_ar" value="{{ $track->name_ar }}" placeholder="{{ __("messages.Enter Name in Arabic") }}"/>
        @error('name_ar')
        <span class="invalid-feedback " role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
    
      </div>

      <div class="w-75 m-auto">
        <label>{{ __("messages.Name in English") }}</label>
        <input  class="form-control @error('name_en')is-invalid @enderror" name="name_en" value="{{ $track->name_en }}" placeholder="{{ __("messages.Enter Name in English") }}"/>
        @error('name_en')
        <span class="invalid-feedback " role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
    
      </div>
      

      <div class="w-75 m-auto">
        <label>{{ __("messages.person") }}</label>
        <input class="form-control @error('person')is-invalid @enderror" value="{{ $track->person }}" name="person" placeholder="{{ __("messages.Enter person Name") }}"/>
        @error('person')
        <span class="invalid-feedback " role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
     </div>

      <div class="w-75 m-auto">
        <label>{{ __("messages.website") }}</label>
        <input class="form-control @error('website')is-invalid @enderror" value="{{ $track->website }}" name="website" placeholder="{{ __("messages.Enter website") }}"/>
        @error('website')
        <span class="invalid-feedback " role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
      </div>

          <div class="w-75 m-auto">
            <label>{{ __("messages.Facebook") }}</label>
      <input type="url" class="form-control @error('facebook')is-invalid @enderror" name="facebook" value="{{ $track->facebook }}" placeholder="{{ __("messages.Enter url facebook") }}"/>
      @error('facebook')
      <span class="invalid-feedback " role="alert">
          <strong>{{ $message }}</strong>
      </span>
  @enderror
      
          </div>

          <div class="w-75 m-auto">
            <label>{{ __("messages.Phone") }}</label>
            <input type="number" class="form-control @error('phone')is-invalid @enderror" name="phone" value="{{ $track->phone }}" placeholder="{{ __("messages.Phone") }}"/>
            @error('phone')
            <span class="invalid-feedback " role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
                </div> 
        
        
        <div class="w-75 m-auto">
            <label>{{ __("messages.Address") }}</label>
            <input  id="address" class="form-control @error('address')is-invalid @enderror" name="address" value="{{ $track->address }}" placeholder="{{ __("messages.Enter address in map") }}" readonly/>
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


            @if(LaravelLocalization::getCurrentLocale()=="ar")

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
      <div class="m-auto d-flex justify-content-center"><button class="btn btn-primary w-75   ">{{ __("messages.Edit track") }}</button></div>
  </form>
  </div>
    </div>
  
    @include("admin.layout.footer")
  
  
  





