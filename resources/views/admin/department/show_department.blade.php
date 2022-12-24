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
        
        <div id="ajax_message1" style="display: none !important" class="alert alert-success d-flex justify-content-center"></div>
        <div id="ajax_message2" style="display: none !important" class="alert alert-danger d-flex justify-content-center"></div>

        <div id="jstree" class="bg-white"></div>

          <br/>
        <div class="container" style="overflow: auto">

        <table class="table table-hover  text-center">
          <thead class="table-dark">
              <th>{{ __("messages.#id") }}</th>
              <th>{{ __("messages.Icon") }}</th>
              <th>{{ __("messages.Name") }}</th>
              <th>{{ __("messages.Description") }}</th>
              <th>{{ __("messages.keyword") }}</th>
              <th>{{ __("messages.Parent") }}</th>
              <th style="min-width:170px;vertical-align:middle">{{ __("messages.Created at") }}</th>
              <th style="min-width:170px;vertical-align:middle">{{ __("messages.Updated at") }}</th>
              <th style="min-width:120px;vertical-align:middle">{{ __("messages.Action") }}</th>

          </thead>
          <tbody id="tbody_department">
       @foreach($admin2=App\Models\category::paginate(8) as $user)
           
              <tr style="vertical-align: middle ;height:100%">

                  <td  style="vertical-align: middle ;height:100%"><span class="btn btn-warning ">{{ $user->id }}</span></td>
                  <td ><img style="width:110px;height:80px" src={{asset("img/upload/department/$user->icon")  }} /></td>

                  @if(LaravelLocalization::getCurrentLocale()=="ar")

                  <td style="vertical-align: middle ;height:100%" ><span >{{ $user->name_ar }}</span></td>

                  @else

                  <td style="vertical-align: middle ;height:100%" ><span >{{ $user->name_en }}</span></td>
                  
                  @endif


                  <td style="vertical-align: middle ;height:100%" ><span class="btn" >{{ $user->description }}</span></td>
                  <td  style="vertical-align: middle ;height:100%">{{ $user->keyword }}</td>

                  @if(LaravelLocalization::getCurrentLocale()=="ar")

                  <td  style="vertical-align: middle ;height:100%"> @if($user->parent!=0){{ $user->department_parent->name_ar }}@else <span class="text-bold">{{ __("messages.it is main department") }}</span> @endif</td>

                  @else

                  <td  style="vertical-align: middle ;height:100%"> @if($user->parent!=0){{ $user->department_parent->name_en }}@else <span class="text-bold">{{ __("messages.it is main department") }}</span> @endif</td>

                  @endif
                  
                  <td  style="vertical-align: middle ;height:100%">{{ $user->created_at }}</td>
                  <td style="vertical-align: middle ;height:100%">{{ $user->updated_at }}</td>
                  <td style="vertical-align: middle ;height:100%">
                    <a href="{{ url("admin/edit_department/{$user->id}") }}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                    <a  onclick="delete_department({{ $user->id }})"  class="btn btn-danger"><i class=" fa fa-trash"></i></a>

                  </td>


              </tr>

              @endforeach       





          </tbody>


      </table>
      
        </div>        

      <a href="{{ route('add_department') }}" class="btn btn-primary"><i class="fas fa-plus"></i>{{ __("messages.Add department") }}</a>


    </div>
    <br/>
  <div id="pagin_department" class="d-flex justify-content-center">{{ $admin2->links() }}</div>

  </div>
  @include("admin.layout.footer")
