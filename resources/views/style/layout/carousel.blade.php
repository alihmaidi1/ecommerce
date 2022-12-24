
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        @foreach(\App\Models\product::where("add_carousel","yes")->where("numbers",">",0)->get() as $product)
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{ $loop->iteration-1 }}" class="active" aria-current="true" aria-label="Slide 1"></button>

        @endforeach
     </div>
    <div class="carousel-inner">
    
        @foreach(\App\Models\product::where("add_carousel","yes")->where("numbers",">",0)->get() as $product)


        <div class="carousel-item @if($loop->iteration==1) active  @endif">
            <a href="{{ route("show_product_detail",$product->id) }}"><img id="img-carousel"  style="cursor: pointer;" src="{{ asset("img/upload/product/".$product->photo) }}" class="d-block w-100" alt="..."></a>
            <div  class="carousel-caption ">
                <div>

            <h4 class="caption subtitle">
                @for($i = 0; $i < $product->rating; $i++)
                <i class="fa fa-star text-warning"></i>
                @endfor
                @for($i = $product->rating; $i < 5; $i++)
                <i class="far fa-star text-warning"></i>
                @endfor
            </h4>
            <h4  class="caption subtitle"><span style="background:#000;padding:3px;border-radius:10px;margin-top:20px">{{ __("messages.price is") }} <span  style="color: rgb(246, 143, 8)">
                        
                @if(empty($product->price_offer))
                ${{ $product->price }}
                
                
                @else
                ${{ $product->price_offer }}

                @endif
            
            </span>
          </span>
          </h4>
            <h4 style="margin-top:20px" class="caption subtitle text-danger"  ><span style="background:#000;padding:3px;border-radius:10px">{{ __("messages.remain") }} {{ $product->numbers }} {{ __("messages.peices") }}</span></h4>
            <a class="caption button-radius" style="text-decoration: none" href="{{ route("show_product_detail",$product->id) }}"><i class="fas fa-cart-arrow-down"></i>{{ __("messages.Shop now") }}</a>

                </div>
            </div>
          </div>
        
          @endforeach


    </div>



    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>


