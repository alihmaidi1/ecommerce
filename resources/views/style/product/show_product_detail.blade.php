<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="{{ asset("include/css/bootstrap.css") }}"/>
{{-- <link rel="stylesheet" href="{{ asset("include/css/product_details.css") }}"> --}}
<link rel="stylesheet" href="{{ asset('site/css1/vendor.css') }}">        
<link rel="stylesheet" href={{ asset('site/style.css') }}>    
<link rel="stylesheet" href="{{ asset("include/fontawesome/css/all.min.css") }}">

</head>
<body class="config" style="background:rgb(221, 221, 221)">
    @include('style.layout.navbar')
  
    <div class="u-s-p-y-60 " style="padding: 0px;padding-top:10px;background:rgb(223, 227, 230)">

      
      <!--====== Section Content ======-->
      <div class="section__content" style="background:rgb(223, 227, 230)">
          <div class="container">
              <div class="breadcrumb">
                  <div class="breadcrumb__wrap w-100" style="background: rgb(46, 46, 46)">
                      <ul class="breadcrumb__list w-100 list-unstyled d-flex " style="color:white;text-decoration:none">
                          <li class="has-separator pt-3  ms-4">

                              <a  style="color:white;text-decoration:none" href="{{ route('show_style_user') }}">{{ __("messages.Home") }}</a></li>
                          <li class="is-marked ms-4 pt-3">

                              <a style="color:white;text-decoration:none" href="{{ route("show_style_user") }}">{{ __("messages.My Cart") }}</a></li>
                      </ul>
                  </div>
              </div>
          </div>
      </div>
  
  </div>

  



  <div class="card" style="width:380px;margin:0 auto">
    <img src="{{ asset("img/upload/product/".$product->photo) }}" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title text-center">{{ $product->title }}</h5>
      <p class="card-text text-center" style="color:rgba(0, 0, 0, 0.507);font-size:12px">{{ $product->content }} fjjsjsjhfjsjh shfh shkghsg hgf gfsgf gsjjhjasha h gagjdgjag gjagj gjagdg aghad</p>
    </div>
    <hr/>
    <div class = "product-rating text-center" style="color:rgb(243, 166, 0);font-size:22px">
                @for($i = 0; $i < $product->rating; $i++)
                <i class = "fas fa-star"></i>        
                @endfor
                @for($i = $product->rating; $i < 5; $i++)
                <i class = "far fa-star"></i>        
                @endfor
              <span style="color:#000"> {{ $product->rating }} ({{ count(\App\Models\number_stars::where("user_id",auth('web')->user()->id)->where("product_id",$product->id)->get()) }})<span style="color: rgba(0, 0, 0, 0.623);font-size:11px">review</span></span>
            </div>
            <hr/>
    <ul class="list-unstyled">
                <li class="ms-3"><button class="btn btn-sm btn-primary me-2">{{ __("messages.Color:") }} <span></span></button><button class="btn btn-sm btn-danger me-2"><span>{{ __("messages.Available:") }} <span>{{ __("messages.in stock") }}</span></span></button><button class="me-2 btn btn-sm btn-warning ">{{ __("messages.Category:") }} <span>{{ $product->department->name }}</span></button></li>
                <hr/>
                <li class=" d-flex justify-content-around"></li>
                <li class="text-center">
                  <button class="btn btn-success me-2">{{ __("messages.Shipping Fee:") }} <span>{{ $product->shipping }}</span></button><a href="{{ route("add_cart",[$product->id,auth('web')->user()->id]) }}" class = "btn btn-primary">
                {{ __("messages.Add to Cart") }} <i class = "fas fa-shopping-cart"></i></a>
              <a style="color: rgb(253, 94, 46);font-size:26px" href="{{ route("add_heart",[$product->id,auth('web')->user()->id]) }}" class = "btn "><i class="fa fa-heart"></i></button>


      </li>

    </ul>
    <a class="d-none"></a>
  </div>
  




<!-- Button trigger modal -->
<button style="display: none" id="click1" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal1">
    Launch demo modal
  </button>
  
  <!-- Modal -->
  <div class="modal fade"  id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width:400px">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Give us your opinion about Product</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body text-center" style="font-size: 25px;color:rgb(255, 157, 0);cursor: pointer;">
          <i id="star-1" onclick="change_star(1)" class="fas fa-star"></i>
          <i id="star-2" onclick="change_star(2)" class="fas fa-star"></i>
          <i id="star-3" onclick="change_star(3)" class="fas fa-star"></i>
          <i id="star-4" onclick="change_star(4)" class="fas fa-star"></i>
          <i id="star-5" onclick="change_star(5)" class="fas fa-star"></i>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button data-bs-dismiss="modal" onclick="save_star({{ $product->id }},{{ auth('web')->user()->id }})"  type="button" class="btn btn-primary">Send</button>
          <input  id="input_star" type="hidden" value="5" />
        </div>
      </div>
    </div>
  </div>









<br/>

            <!--====== Product Detail Tab ======-->

@include("style.layout.footer1")
<script src="{{ asset("include/js/jquery-3.6.0.min.js") }}"></script>
<script src="{{ asset("include/js/bootstrap.js") }}"></script>
<script>

let x=document.getElementById("click1")
x.click()
function change_star(index){

    document.getElementById("input_star").value=index


for(let i=1;i<=index;i++){

let star=document.getElementById("star-"+i);
star.classList.remove("far");
star.classList.add("fas");

}


for(let i=index+1;i<=5;i++){

let star=document.getElementById("star-"+i);
star.classList.remove("fas");
star.classList.add("far");
}
}

function save_star(product,user){

let rating=document.getElementById("input_star").value;
let request=new XMLHttpRequest();
request.open("get","/save_star?product="+product+"&user="+user+"&rating="+rating);
request.send()



}

</script>
</html>