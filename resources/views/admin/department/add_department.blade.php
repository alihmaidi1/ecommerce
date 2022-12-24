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
  <form  class="col-sm-12 col-md-6  " method="POST"  action="{{ route("save_department") }}" enctype="multipart/form-data">
      @csrf
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
        <label>{{ __("messages.Name in Arabic") }}</label>
        <input value="{{ old("name_ar") }}" class="form-control @error('name_ar')is-invalid @enderror" name="name_ar" placeholder="{{ __("messages.Enter Name in Arabic") }}"/>

        @error('name_ar')
        <span class="invalid-feedback " role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
    
      </div>


      <div class="w-75 m-auto">
     
      <label>{{ __("messages.description") }}</label>
      <input value="{{ old("description") }}" class="form-control @error('description')is-invalid @enderror" name="description" placeholder="{{ __("messages.Enter description") }}"/>
      @error('description')
      <span class="invalid-feedback " role="alert">
          <strong>{{ $message }}</strong>
      </span>
  @enderror
      </div>

      <div class="w-75 m-auto">
      <label>{{ __("messages.keyword") }}</label>
      <input  value="{{ old("keyword") }}" class="form-control @error('keyword')is-invalid @enderror" name="keyword" placeholder="{{ __("messages.Enter keyword") }}"/>
      @error('keyword')
      <span class="invalid-feedback " role="alert">
          <strong>{{ $message }}</strong>
      </span>
  @enderror
      </div>



      <div class="w-75 m-auto">
      <label>{{ __("messages.icon") }}</label>
      <br/>
      <input  type="file" class="@error('icon')is-invalid @enderror"  name="icon" placeholder="Enter icon"/>
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
      <div class="m-auto d-flex justify-content-center"><button class="btn btn-primary w-75   ">{{ __("messages.Create department") }}</button></div>
  </form>
  </div>
    </div>
  
    @include("admin.layout.footer")
  
  
  

