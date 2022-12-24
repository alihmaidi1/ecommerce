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

        <table class="table table-hover text-center">
            <thead class="table-dark">
                <th>{{ __("messages.#id") }}</th>
                <th>{{ __("messages.icon") }}</th>
                <th>{{ __("messages.Name") }}</th>
                <th>{{ __("messages.person") }}</th>
                <th style="min-width:170px;vertical-align: middle ;">{{ __("messages.Email") }}</th>
                <th style="min-width:160px;vertical-align: middle ;">{{ __("messages.mobile") }}</th>
                <th style="min-width:180px;vertical-align: middle ;">{{ __("messages.Address") }}</th>
                <th style="min-width:120px;vertical-align: middle ;">{{ __("messages.Action") }}</th>

            </thead>
            <tbody id="tbody_mall">
         @foreach($admin2=App\Models\mall::paginate(8) as $mall)
             
                <tr>

                    <td style="vertical-align: middle;height:100%"><span class="btn btn-warning">{{ $mall->id }}</span></td>
                    <td><img width="100px" src="{{ asset("img/upload/mall/$mall->icon")  }}"/></td>

                    @if(LaravelLocalization::getCurrentLocale()=="ar")

                    <td style="vertical-align: middle;height:100%">{{ $mall->name_ar }}</td>


                    @else

                    <td style="vertical-align: middle;height:100%">{{ $mall->name_en }}</td>


                    @endif


                    <td style="vertical-align: middle;height:100%"><span class="btn " >{{ $mall->person }}</span></td>
                    <td style="vertical-align: middle;height:100%">{{ $mall->email }}</td>
                    <td style="vertical-align: middle;height:100%">{{ $mall->mobile }}</td>
                    <td style="vertical-align: middle;height:100%">{{ $mall->address }}</td>
                    <td style="vertical-align: middle;height:100%">
                      <a href="{{ url("admin/edit_mall/{$mall->id}") }}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                      <a  onclick="delete_mall({{ $mall->id }})" class="btn btn-danger"><i class=" fa fa-trash"></i></a>

                    </td>


                </tr>

                @endforeach       





            </tbody>


        </table>
        </div>
        <a href="{{ route('add_mall') }}" class="btn btn-primary"><i class="fas fa-plus"></i>{{ __("messages.Add mall") }}</a>
        <br/>
        <br/>
<div id="pagin_mall" class="d-flex justify-content-center">{{ $admin2->links() }}</div>







    </div>
  








  </div>







  @include("admin.layout.footer")
