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
              <th style="min-width:120px;vertical-align: middle ;">{{ __("messages.Email") }}</th>
              <th>{{ __("messages.Subject") }}</th>
              <th>{{ __("messages.content") }}</th>
              <th style="min-width:170px;vertical-align: middle ;">{{ __("messages.Created at") }}</th>
              <th style="min-width:120px;vertical-align: middle ;">{{ __("messages.Action") }}</th>

          </thead>
          <tbody id="tbody_suggest">
       @foreach($admin2=App\Models\suggest::paginate(8) as $suggest)
           
              <tr>

                  <td style="vertical-align: middle ;"><span class="btn btn-warning">{{ $suggest->id }}</span></td>
                  <td style="vertical-align: middle ;"><span class="btn" >{{ $suggest->name }}</span></td>
                  <td style="vertical-align: middle ;"><span class="btn" >{{ $suggest->email }}</span></td>
                  <td style="vertical-align: middle ;">{{ $suggest->subject }}</td>
                  <td style="min-width:200px;vertical-align: middle ;overflow:auto;height:150px">{{ $suggest->content }}</td>
                  <td style="vertical-align: middle ;">{{ $suggest->created_at }}</td>
                  <td style="vertical-align: middle ;">
                    <a  onclick="delete_suggest({{ $suggest->id }})"  class="btn btn-danger"><i class=" fa fa-trash"></i></a>

                  </td>


              </tr>

              @endforeach       





          </tbody>


      </table>
      

          </div>        


  <div id="pagin_suggest" class="d-flex justify-content-center">{{ $admin2->links() }}</div>        


    </div>
  








  </div>







  @include("admin.layout.footer")
