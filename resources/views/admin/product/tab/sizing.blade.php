<div id="product_sizing" class="tab-pane fade show " >
    <h4 class="text-center text-bold">{{ __("messages.Product Sizing") }}</h4>
    
    
    <div class="input-product m-auto">
        <label>{{ __("messages.size") }}</label>

        <select style="background:rgb(28, 41, 42);color:#fff;font-weight:800"   multiple name="size_id[]" class="form-control @error('size_id')is-invalid @enderror"> 
            @foreach(\App\Models\size::get() as $size)

            @if(LaravelLocalization::getCurrentLocale()=="ar")

            <option class="p-2 "  value="{{ $size->id }}">{{ $size->name_ar }}</option>


            @else

            <option class="p-2 "  value="{{ $size->id }}">{{ $size->name_en }}</option>


            @endif
            

            @endforeach

        </select>
        @error('size_id')
        <span class="invalid-feedback " role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror  

    </div>
    
   
   
   
   
   
    <div class="input-product m-auto">
        <label>{{ __("messages.Weight") }}</label>
        <input  value="{{ old("weight") }}" class="form-control @error('weight')is-invalid @enderror" name="weight" placeholder="{{ __("messages.Enter Product Weight") }}"/>
        @error('weight')
        <span class="invalid-feedback " role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror    
   
    </div>
    <br/>


</div>

<br/>