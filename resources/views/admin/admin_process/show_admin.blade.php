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


    <div class="container" style="overflow: auto">

        
        <table class="table text-center table-hover">
            <thead class="table-dark">
                <th>{{ __("messages.#id") }}</th>
                <th>{{ __("messages.Name") }}</th>
                <th>{{ __("messages.Email") }}</th>
                <th style="min-width:170px;vertical-align:middle">{{ __("messages.Created at") }}</th>
                <th style="min-width:170px;vertical-align:middle">{{ __("messages.Updated at") }}</th>
                <th style="min-width:120px;vertical-align:middle">{{ __("messages.Action") }}</th>

            </thead>
            <tbody id="tbody_admin">
         @foreach($admin2=App\Models\Admin::paginate(8) as $user)
             
                <tr>

                    <td  class="btn-sm ">{{ $user->id }}</td>
                    
                    @if(LaravelLocalization::getCurrentLocale()=="ar")

                    <td>{{ $user->name_ar }}</td>


                    @else

                    <td>{{ $user->name_en }}</td>

                    @endif
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at }}</td>
                    <td>{{ $user->updated_at }}</td>
                    <td>
                      <a href="{{ url("admin/edit_admin/{$user->id}") }}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                      <a  onclick="delete_admin({{ $user->id }})" class="btn btn-danger"><i class=" fa fa-trash"></i></a>

                    </td>


                </tr>

                @endforeach       





            </tbody>


        </table>
    </div>
        <a href="{{ route('add_admin') }}" class="btn btn-primary"><i class="fas fa-plus"></i>{{ __("messages.Add Admin") }}</a>
        <br/>
        <br/>
<div  id="pagin_admin" class="d-flex justify-content-center">{{ $admin2->links() }}</div>







    </div>
  








  </div>







  @include("admin.layout.footer")
