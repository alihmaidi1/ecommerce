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

        <table class="table    text-center table-hover">
            <thead class="table-dark">
                <th>{{ __("messages.#id") }}</th>
                <th style="min-width:170px;vertical-align:middle">{{ __("messages.Name") }}</th>
                <th style="min-width:80px;vertical-align:middle">{{ __("messages.Abbr") }}</th>
                <th style="min-width:80px;vertical-align:middle">{{ __("messages.Mob") }}</th>
                <th style="min-width:170px;vertical-align:middle">{{ __("messages.Created at") }}</th>
                <th style="min-width:170px;vertical-align:middle">{{ __("messages.Updated at") }}</th>
                <th style="min-width:120px;vertical-align:middle">{{ __("messages.Action") }}</th>

            </thead>
            <tbody id="tbody_country">
         @foreach($admin2=App\Models\country::paginate(8) as $user)
             
                <tr>

                    <td><span class="btn  btn-warning">{{ $user->id }}</span></td>
                    <td>{{ $user->name }}</td>
                    <td ><span class="btn " >{{ $user->abbr }}</span></td>
                    <td>{{ $user->mob }}</td>
                    <td>{{ $user->created_at }}</td>
                    <td>{{ $user->updated_at }}</td>
                    <td>
                      <a href="{{ url("admin/edit_country/{$user->id}") }}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                      <a onclick="delete_country({{ $user->id }})"  class="btn btn-danger"><i class=" fa fa-trash"></i></a>

                    </td>


                </tr>

                @endforeach       





            </tbody>


        </table>
        </div>
        <a href="{{ route('add_country') }}" class="btn btn-primary"><i class="fas fa-plus"></i>{{ __("messages.Add Country") }}</a>
        <br/>
        <br/>
<div id="pagin_country" class="d-flex justify-content-center">{{ $admin2->links() }}</div>







    </div>
  








  </div>







  @include("admin.layout.footer")
