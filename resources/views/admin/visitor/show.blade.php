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
        <div style="overflow: auto">
        <table class="table table-hover  text-center">
            <thead class="table-dark">
                <th>{{ __("messages.#id") }}</th>
                <th>{{ __("messages.Ip") }}</th>
                <th>{{ __("messages.Address") }}</th>
                <th>{{ __("messages.Region") }}</th>
                <th>{{ __("messages.City") }}</th>
                <th>{{ __("messages.Visit in") }}</th>

            </thead>
            <tbody>
         @foreach($admin2=App\Models\visitor::paginate(8) as $visitor)
             
                <tr>

                    <td><span class="btn btn-warning">{{ $visitor->id }}</span></td>
                    <td  style="color: green;min-width:100px;vertical-align:middle">{{ $visitor->ip }}</td>
                    <td style="min-width:150px;vertical-align:middle"><span class="btn" > @if($visitor->address==""){{ __("messages.Unknown") }} @else{{ $visitor->address }}@endif</span></td>
                    <td style="min-width:150px;vertical-align:middle">@if($visitor->name_region==""){{ __("messages.Unknown") }} @else{{ $visitor->name_region }}@endif</td>
                    <td style="min-width:170px;vertical-align:middle">@if($visitor->city_name==""){{ __("messages.Unknown") }} @else{{ $visitor->city_name }}@endif</td>
                    <td style="color:red;min-width:170px;vertical-align:middle">{{ $visitor->created_at }}</td>



                </tr>

                @endforeach       





            </tbody>


        </table>
        </div>
        <br/>
        <br/>
<div class="d-flex justify-content-center">{{ $admin2->links() }}</div>







    </div>
  








  </div>







  @include("admin.layout.footer")
