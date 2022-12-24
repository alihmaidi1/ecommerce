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

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">{{ __("messages.Dashboard") }}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a >{{ __("messages.Home") }}</a></li>
              <li class="breadcrumb-item active">{{ __("messages.Dashboard") }}</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->

        @if(Session()->has("error"))
        <div class="alert alert-danger text-center">{{ Session("error") }}</div>
        @endif
      

        @if(Session()->has("success"))
        <div class="alert alert-success text-center">{{ Session("success") }}</div>
        @endif

      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ count(\App\models\order::get()) }}</h3>

                <p>{{ __("messages.New Orders") }}</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="{{ url("admin/show_order") }}" class="small-box-footer">{{ __("messages.More info") }}<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->





          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{ count(\App\Models\product::all()) }}</h3>

                <p>{{ __("messages.Product Numbers") }}</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="{{ route("show_product") }}" class="small-box-footer">{{ __("messages.More info") }}<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>


          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{ count(\App\models\User::all()) }}</h3>

                <p>{{ __("messages.User Registrations") }}</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="{{ route('show_user') }}" class="small-box-footer">{{ __("messages.More info") }}<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{ count(\App\Models\visitor::get()) }}</h3>

                <p>{{ __("messages.Unique Visitors") }}</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="{{ route("show_visitor") }}" class="small-box-footer">{{ __("messages.More info") }}<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="container" style="overflow: auto">

        <table class="table table-hover table-responesive  text-center">
          <thead class="table-light">
              <th>{{ __("messages.#id") }}</th>
              <th>{{ __("messages.User") }}</th>
              <th>{{ __("messages.Email") }}</th>
              <th>{{ __("messages.Total") }}</th>
              <th>{{ __("messages.status") }}</th>
              <th style="min-width:170px;vertical-align: middle ;">{{ __("messages.Date") }}</th>
              <th>{{ __("messages.Action") }}</th>

          </thead>
          <tbody>
       @foreach($admin2=App\Models\order::paginate(8) as $order)
           
              <tr>

                  <td style="vertical-align: middle"><span class="btn btn-warning">{{ $order->id }}</span></td>
                  <td style="vertical-align: middle">{{ $order->user->name }}</td>
                  <td style="vertical-align: middle">{{ $order->user->email }}</td>
                  <td style="vertical-align: middle"><span class="btn">{{ $order->total }}</span></td>
                  <td  style="vertical-align: middle" @if($order->status=="success") class="text-success text-bold" @else class="text-danger text-bold"  @endif>{{ $order->status }}</td>
                  <td style="vertical-align: middle">{{ $order->created_at }}</td>
                  <td><a style="color: #000;font-weight:700;border:2px solid #000;padding:9px;vertical-align:middle" href="{{ route("show_order_detail_admin",$order->id) }}">{{ __("messages.show_details") }}</a></td>                  


              </tr>

              @endforeach       

          </tbody>


      </table>

        </div>
        <div class="d-flex justify-content-center">{{ $admin2->links() }}</div>
      <br/> 

        <div class="row">
          <!-- Left col -->
          <section class="col-12 connectedSortable">
 
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="ion ion-clipboard mr-1"></i>
                  {{ __("messages.To Do List") }}
                </h3>

                <div class="card-tools">
                  {{ $pagin12=\App\Models\todolist::paginate(8) }}
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <ul class="todo-list" data-widget="todo-list">
                  @foreach(\App\Models\todolist::paginate(8) as $todolist)
                    
                  
                  <li>
                    <!-- drag handle -->
                    <span class="handle">
                      <i class="fas fa-ellipsis-v"></i>
                      <i  class="fas fa-ellipsis-v"></i>
                    </span>
                    <!-- checkbox -->

                    <!-- todo text -->
                    <span class="text">{{ $todolist->content }}</span>
                    <!-- Emphasis label -->
                    <small class="badge badge-danger"><i class="far fa-clock"></i> {{ $todolist->end_at }}</small>
                    <!-- General tools such as edit or delete-->
                    <div class="tools">
                      <a class="text-warning" href="/admin/edit_todolist/{{ $todolist->id }}" ><i class="fas fa-edit"></i></a>
                      <a class="text-danger" href="/admin/delete_todolist/{{ $todolist->id }}"><i class="fas fa-trash"></i></a>
                    </div>
                  </li>
                  @endforeach
                </ul>
              </div>
              <div class="d-flex justify-content-center">
                {{ $pagin12->links() }}
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <a href="{{ route("add_todolist") }}" class="btn btn-primary float-right"><i class="fas fa-plus"></i>{{ __("messages.Add Task") }}</a>
              </div>
            </div>
            <!-- /.card -->
          </section>
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->

          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy;  </strong>
    All rights reserved By<strong> Ali Hmaidi<strong>.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.2.0-rc
    </div>
  </footer>

  <!-- Control Sidebar -->

  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
@include("admin.layout.footer")
