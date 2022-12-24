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

        <div style="overflow: auto">

        <table class="table table-hover  text-center">
            <thead class="table-dark">
                <th>{{ __("messages.#id") }}</th>
                <th>{{ __("messages.Name") }}</th>
                <th>{{ __("messages.person") }}</th>
                <th style="min-width:150px;vertical-align: middle ;">{{ __("messages.mobile") }}</th>
                <th style="min-width:160px;vertical-align: middle ;">{{ __("messages.Email") }}</th>
                <th style="min-width:180px;vertical-align: middle ;">{{ __("messages.facebook") }}</th>
                <th style="min-width:160px;vertical-align: middle ;">{{ __("messages.Address") }}</th>
                <th style="min-width:120px;vertical-align: middle ;">{{ __("messages.Action") }}</th>

            </thead>
            <tbody id="tbody_factory">
         @foreach($admin2=App\Models\factory1::paginate(8) as $factory)
             
                <tr>

                    <td style="vertical-align: middle ;height:100%"> <span class="btn btn-warning">{{ $factory->id }}</span></td>

                    @if(LaravelLocalization::getCurrentLocale())


                    <td style="vertical-align: middle ;height:100%">{{ $factory->name_ar }}</td>

                    @else


                    <td style="vertical-align: middle ;height:100%">{{ $factory->name_en   }}</td>


                    @endif

                    <td style="vertical-align: middle ;height:100%">{{ $factory->person }}</td>
                    <td style="vertical-align: middle ;height:100%"><span class="btn " >{{ $factory->mobile }}</span></td>
                    <td style="vertical-align: middle ;height:100%">{{ $factory->email }}</td>
                    <td style="vertical-align: middle ;height:100%"><a href="{{ $factory->facebook }}">{{ $factory->facebook }}</a></td>
                    <td style="vertical-align: middle ;height:100%">{{ $factory->address }}</td>

                    <td>
                      <a href="{{ url("admin/edit_factory/{$factory->id}") }}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                      <a onclick="delete_factory({{ $factory->id }})"  class="btn btn-danger"><i class=" fa fa-trash"></i></a>

                    </td>


                </tr>

                @endforeach       





            </tbody>


        </table>
        </div>
        <a href="{{ route('add_factory') }}" class="btn btn-primary"><i class="fas fa-plus"></i>{{ __("messages.Add factory") }}</a>
        <br/>
        <br/>
<div id="pagin_factory" class="d-flex justify-content-center">{{ $admin2->links() }}</div>

        





    </div>
  








  </div>







  @include("admin.layout.footer")
