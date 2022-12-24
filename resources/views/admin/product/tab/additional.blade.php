<div class="tab-pane fade show " id="product_additional">
    <h4 class="text-center text-bold">{{ __("messages.Product More Information") }}</h4>

       
    <div class="input-product m-auto">
        <label>{{ __("messages.Color") }}</label>

        <select style="background:rgb(28, 41, 42);color:#fff;font-weight:800"   multiple name="color_id[]" class="form-control @error('color_id')is-invalid @enderror"> 
            @foreach(\App\Models\color::get() as $color)

            
            @if(LaravelLocalization::getCurrentLocale()=="ar")

            <option class="p-2 "  value="{{ $color->id }}">{{ $color->name_ar }}</option>


            @else

            <option class="p-2 "  value="{{ $color->id }}">{{ $color->name_en }}</option>


            @endif

            @endforeach

        </select>
        @error('color_id')
        <span class="invalid-feedback " role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror  

    </div>
        




    <div class="input-product m-auto">
        <label>{{ __("messages.tax") }}</label>
        <input value="{{ old("tax") }}"  class="form-control @error('tax')is-invalid @enderror" name="tax" placeholder="{{ __("messages.Enter tax") }}"/>
        @error('tax')
        <span class="invalid-feedback " role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror    
   
    </div>
 

    <div class="input-product m-auto">
        <label>{{ __("messages.shipping") }}</label>
        <input value="{{ old("shipping") }}"  class="form-control @error('shipping')is-invalid @enderror" name="shipping" placeholder="{{ __("messages.Enter shipping") }}"/>
        @error('shipping')
        <span class="invalid-feedback " role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror    
   
    </div>
 



    <div class="input-product m-auto">
        <label>{{ __("messages.Factory") }}</label>

        <select name="factory_id" class="form-control @error('factory_id')is-invalid @enderror"> 
            @foreach(\App\Models\factory1::get() as $factory)

            @if(LaravelLocalization::getCurrentLocale()=="ar")

            <option value="{{ $factory->id }}">{{ $factory->name_ar }}</option>

            @else

            <option value="{{ $factory->id }}">{{ $factory->name_en }}</option>


            @endif


            @endforeach
        </select>
        @error('factory_id')
        <span class="invalid-feedback " role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror  
    </div>
    <br/>
        



</div>