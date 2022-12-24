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
                <th>{{ __("messages.User") }}</th>
                <th style="min-width:190px;vertical-align: middle ;">{{ __("messages.Email") }}</th>
                <th>{{ __("messages.Total") }}</th>
                <th>{{ __("messages.status") }}</th>
                <th style="min-width:170px;vertical-align: middle ;">{{ __("messages.Date") }}</th>
                <th>{{ __("messages.Action") }}</th>
  
            </thead>
            <tbody>
         @foreach($admin2=App\Models\order::paginate(8) as $order)
             
                <tr>
  
                    <td><span class="btn btn-warning">{{ $order->id }}</span></td>
                    <td>{{ $order->user->name }}</td>
                    <td>{{ $order->user->email }}</td>
                    <td><span class="btn " >{{ $order->total }}</span></td>
                    <td  @if($order->status=="success") class="text-success text-bold" @else class="text-danger text-bold"  @endif>{{ $order->status }}</td>
                    <td style="color: red">{{ $order->created_at }}</td>
                    
  
  
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
