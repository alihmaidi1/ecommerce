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

        <table class="table table-hover text-center">
          <thead class="table-dark">
              <th>{{ __("messages.#id") }}</th>
              <th>{{ __("messages.Name") }}</th>
              <th style="min-width:170px;vertical-align: middle ;">{{ __("messages.Created at") }}</th>
              <th style="min-width:170px;vertical-align: middle ;">{{ __("messages.Updated at") }}</th>
              <th style="min-width:120px;vertical-align: middle ;">{{ __("messages.Action") }}</th>

          </thead>
          <tbody id="tbody_size">
       @foreach($admin2=App\Models\size::paginate(8) as $size)
           
              <tr>

                  <td style="vertical-align: middle;height:100%"><span class="btn btn-warning">{{ $size->id }}</span></td>


                  @if(LaravelLocalization::getCurrentLocale()=="ar")

                  <td style="vertical-align: middle;height:100%"><span class="btn " >{{ $size->name_ar }}</span></td>

                  @else

                  <td style="vertical-align: middle;height:100%"><span class="btn " >{{ $size->name_en }}</span></td>


                  @endif

                  <td style="vertical-align: middle;height:100%">{{ $size->created_at }}</td>
                  <td style="vertical-align: middle;height:100%">{{ $size->updated_at }}</td>
                  <td style="vertical-align: middle;height:100%">
                    <a href="{{ url("admin/edit_size/{$size->id}") }}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                    <a  onclick="delete_size({{ $size->id }})"  class="btn btn-danger"><i class=" fa fa-trash"></i></a>

                  </td>


              </tr>

              @endforeach       





          </tbody>


      </table>
    </div>
      
  <div id="pagin_size" class="d-flex justify-content-center">{{ $admin2->links() }}</div>        

      <a href="{{ route('add_size') }}" class="btn btn-primary"><i class="fas fa-plus"></i>{{ __("messages.Add size") }}</a>


    </div>
  








  </div>







  @include("admin.layout.footer")
