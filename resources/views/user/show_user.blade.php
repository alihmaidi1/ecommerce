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
        <table class="table table-hover     text-center"  >
            <thead class="table-dark">
                <th>{{ __("messages.#id") }}</th>
                <th>{{ __("messages.Name") }}</th>
                <th style="min-width:200px;vertical-align:middle">{{ __("messages.Email") }}</th>
                <th style="min-width:130px;vertical-align:middle">{{ __("messages.Level") }}</th>
                <th style="min-width:170px;vertical-align:middle">{{ __("messages.Created at") }}</th>
                <th style="min-width:170px;vertical-align:middle">{{ __("messages.Updated at") }}</th>
                <th style="min-width:120px;vertical-align:middle">{{ __("messages.Action") }}</th>

            </thead>
            <tbody id="tbody_user">
         @foreach($admin2=App\Models\User::paginate(8) as $user)
             
                <tr>

                    <td ><span class="btn btn-warning" style="font-weight:500">{{ $user->id }}</span></td>
                    <td >{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td  ><span >{{ $user->level }}</span></td>
                    <td>{{ $user->created_at }}</td>
                    <td>{{ $user->updated_at }}</td>
                    <td>
                      <a href="{{ url("admin/edit_user/{$user->id}") }}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                      <a onclick="delete_user({{ $user->id }})"  class="btn btn-danger"><i class=" fa fa-trash"></i></a>

                    </td>


                </tr>

                @endforeach       





            </tbody>


        </table>
        </div>
        <a href="{{ route('add_user') }}" class="btn btn-primary"><i class="fas fa-plus"></i>{{ __("messages.Add User") }}</a>
        <br/>
        <br/>
<div id="pagin_user" class="d-flex justify-content-center">{{ $admin2->links() }}</div>







    </div>
  








  </div>







  @include("admin.layout.footer")
