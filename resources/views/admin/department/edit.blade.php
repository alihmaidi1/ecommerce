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
  <form  class="col-sm-12 col-md-6  " method="POST"  action="{{ route("change_department") }}" enctype="multipart/form-data">
      @csrf
    <input type="hidden" name="id" value="{{ $department->id }}"/>

      <div class="w-75 m-auto">
        <label>{{ __("messages.Name in English") }}</label>
        <input class="form-control @error('name_en')is-invalid @enderror" name="name_en" value="{{ $department->name_en }}" placeholder="{{ __("messages.Enter Name in English") }}"/>

        @error('name_en')
        <span class="invalid-feedback " role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
    
      </div>

      <div class="w-75 m-auto">
        <label>{{ __("messages.Name in Arabic") }}</label>
        <input class="form-control @error('name_ar')is-invalid @enderror" name="name_ar" value="{{ $department->name_ar }}" placeholder="{{ __("messages.Enter Name in Arabic") }}"/>

        @error('name_ar')
        <span class="invalid-feedback " role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
    
      </div>
    

      <div class="w-75 m-auto">
        <label>{{ __("messages.description") }}</label>
        <input  class="form-control @error('description')is-invalid @enderror" value="{{ $department->description }}" name="description" placeholder="{{ __("messages.Enter description") }}"/>
        @error('description')
        <span class="invalid-feedback " role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
    </div>

      <div class="w-75 m-auto">
       <label>{{ __("messages.keyword") }}</label>
        <input  class="form-control @error('keyword')is-invalid @enderror" value="{{ $department->keyword }}" name="keyword" placeholder="{{ __("messages.keyword") }}"/>
        @error('keyword')
        <span class="invalid-feedback " role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
    </div>



      <div class="w-75 m-auto">
        <label>{{ __("messages.icon") }}</label>
        <input  type="file" class="form-control @error('icon')is-invalid @enderror" value="{{ $department->icon }}" name="icon" placeholder="icon"/>
    @error('icon')
    <span class="invalid-feedback " role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror

</div>


      <br/>
      <div class="w-75  m-auto">
        <label>{{ __("messages.parent") }}</label>
        <br/>
        <select class="form-control " name="parent">
            @foreach(\App\Models\category::get() as $department1)

            @if(LaravelLocalization::getCurrentLocale()=="ar")

            <option value="{{ $department1->id }}">{{ $department1->name_ar }}</option>


            @else
            
            <option value="{{ $department1->id }}">{{ $department1->name_en }}</option>



            @endif
            

            @endforeach

        </select>
      @error('parent')
        <span class="invalid-feedback " role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
    
      </div>
          
      <br/>
      <div class="m-auto d-flex justify-content-center"><button class="btn btn-primary w-75   ">{{ __("messages.Edit department") }}</button></div>
  </form>
  </div>
    </div>
  
    @include("admin.layout.footer")
  
  
  


