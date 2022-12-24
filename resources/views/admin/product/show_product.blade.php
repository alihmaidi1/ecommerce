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


          <br/>
        <div class="container" style="overflow: auto">

        <table class="table table-hover text-center">
          <thead class="table-dark">
            <th>{{ __("messages.#id") }}</th>
            <th>{{ __("messages.photo") }}</th>
              <th>{{ __("messages.Title") }}</th>
              <th style="min-width:140px;vertical-align: middle ;">{{ __("messages.Numbers_left") }}</th>
              <th>{{ __("messages.price") }}</th>
              <th style="min-width:170px;vertical-align: middle ;">{{ __("messages.department") }}</th>
              <th style="min-width:170px;vertical-align: middle ;">{{ __("messages.Updated at") }}</th>
              <th style="min-width:120px;vertical-align: middle ;">{{ __("messages.Action") }}</th>

          </thead>
          <tbody id="tbody_product">
       @foreach($admin2=App\Models\product::paginate(8) as $product)
           
              <tr>

                  <td style="vertical-align: middle;height:100%"><span class="btn btn-warning">{{ $product->id }}</span></td>
                  <td><img style="width:120px;height:90px" src={{asset("img/upload/product/$product->photo")  }} /></td>

                  @if(LaravelLocalization::getCurrentLocale()=="ar")

                  <td style="vertical-align: middle;height:100%"><span class="btn " >{{ $product->title_ar }}</span></td>


                  @else

                  <td style="vertical-align: middle;height:100%"><span class="btn " >{{ $product->title_en }}</span></td>

                  @endif


                  <td style="vertical-align: middle;height:100%"><span class="btn" >{{ $product->numbers }}</span></td>
                  <td style="vertical-align: middle;height:100%"><span class="btn " >{{ $product->price }}</span></td>

                  @if(LaravelLocalization::getCurrentLocale()=="ar")

                  <td style="vertical-align: middle;height:100%"><span class="btn " >{{ $product->department->name_ar }}</span></td>


                  @else

                  <td style="vertical-align: middle;height:100%"><span class="btn " >{{ $product->department->name_en }}</span></td>


                  @endif

                  <td style="vertical-align: middle;height:100%">{{ $product->updated_at }}</td>
                  <td style="vertical-align: middle;height:100%">
                    <a href="{{ url("admin/edit_product/{$product->id}") }}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                    <a  onclick="delete_product({{ $product->id }})"  class="btn btn-danger"><i class=" fa fa-trash"></i></a>

                  </td>


              </tr>

              @endforeach       





          </tbody>


      </table>
    </div>
        

      <a href="{{ route('add_product') }}" class="btn btn-primary"><i class="fas fa-plus"></i>{{ __("messages.Add Product") }}</a>

    </div>
  
    <div id="pagin_product" class="d-flex justify-content-center">{{ $admin2->links() }}</div>        








  </div>







  @include("admin.layout.footer")
