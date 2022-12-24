<div id="product_setting" class="tab-pane fade show ">
    <h4 class="text-center text-bold">{{ __("messages.Product Setting") }}</h4>

    <div class="input-product m-auto">
        <label>{{ __("messages.Price") }}</label>
        <input  value="{{ old("price") }}" class="form-control @error('price')is-invalid @enderror" name="price" placeholder="{{ __("messages.Enter Price") }}"/>
        @error('price')
        <span class="invalid-feedback " role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror    
    </div>

    <div class="input-product m-auto">
        <label>{{ __("messages.Quantity") }}</label>
        <input value="{{ old("numbers") }}" class="form-control @error('numbers')is-invalid @enderror" name="numbers" placeholder="{{ __("messages.Enter Quantity") }}"/>
        @error('numbers')
        <span class="invalid-feedback " role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
    </div>
          
    
    
    <div class="input-product m-auto">
        <label>{{ __("messages.Price the Offer") }}</label>
        <input value="{{ old("price_offer") }}" class="form-control @error('price_offer')is-invalid @enderror" name="price_offer" placeholder="{{ __("messages.Enter price offer") }}"/>
        @error('price_offer')
        <span class="invalid-feedback " role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
    </div>


    <div class="input-product m-auto">


        <div class="row">
            <div class="col-md-6 col-sm-12">
            <div class="col-md-6 col-sm-12"><label> {{ __("messages.offer start_at") }}</label></div>

                <input value="{{ old("start_offer_at") }}" type="date" class="form-control @error('start_offer_at')is-invalid @enderror" name="start_offer_at" placeholder=" Start_offer_at"/>
                @error('start_offer_at')
                <span class="invalid-feedback " role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
            <div class="col-md-6 col-sm-12">
            <div class="col-md-6 col-sm-12"><label>{{ __("messages.offer end_at") }}</label></div>

        <input  value="{{ old("end_offer_at") }}" type="date" class="form-control @error('end_offer_at')is-invalid @enderror" name="end_offer_at" placeholder=" End_offer_at"/>
        @error('end_offer_at')
        <span class="invalid-feedback " role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror        
    </div>
        </div>
    </div>

    <div class="input-product m-auto">
        <label>{{ __("messages.Status") }}</label>
        <select name="status" class="form-control @error('status')is-invalid @enderror">
            <option value="active">{{ __("messages.active") }}</option>
            <option value="waiting">{{ __("messages.waiting") }}</option>
            <option value="ending">{{ __("messages.ending") }}</option>

        </select>
        @error('status')
        <span class="invalid-feedback " role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror


    </div>
        
    <br/>


</div>

<br/>