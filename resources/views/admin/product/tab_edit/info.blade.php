
<div id="product_info" class="tab-pane fade show active">

<h4 class="text-center text-bold">{{ __("messages.Product Information") }}</h4>
   
    <input type="hidden" name="id" value="{{ $product->id }}"/>
    <div class="input-product m-auto">
    <label>{{ __("messages.Title in arabic") }}</label>
    <input  value="{{ $product->title_ar }}" class="form-control @error('title_ar')is-invalid @enderror" name="title_ar" placeholder="{{ __("messages.Enter Title in arabic") }}"/>
    @error('title_ar')
    <span class="invalid-feedback " role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror  
</div>



<div class="input-product m-auto">
    <label>{{ __("messages.Title in English") }}</label>
    <input  value="{{ $product->title_en }}" class="form-control @error('title_en')is-invalid @enderror" name="title_en" placeholder="{{ __("messages.Enter Title in English") }}"/>
    @error('title_en')
    <span class="invalid-feedback " role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror  
</div>
   
    <div class="input-product m-auto">
        <label>{{ __("messages.Content in English") }}</label>
        <textarea  style="resize:none"  class="form-control @error('content_en')is-invalid @enderror" name="content_en" placeholder="{{ __("messages.Enter the Content in English") }}">{{ $product->content_en }}</textarea>
        @error('content_en')
        <span class="invalid-feedback " role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror  
    </div>



    <div class="input-product m-auto">
        <label>{{ __("messages.Content in Arabic") }}</label>
        <textarea  style="resize:none"  class="form-control @error('content_ar')is-invalid @enderror" name="content_ar" placeholder="{{ __("messages.Enter the Content in Arabic") }}">{{ $product->content_ar }}</textarea>
        @error('content_ar')
        <span class="invalid-feedback " role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror  
    </div>
    

    <div class="input-product m-auto">
        <label>{{ __("messages.Department") }}</label>
        
        <select id="product_department" name="department" class="form-control @error('department')is-invalid @enderror">
            <option value="0" selected>...</option>
            @foreach (\App\Models\category::get() as $department)


            @if(LaravelLocalization::getCurrentLocale()=="ar")

            <option value="{{ $department->id }}" @if($department->id==$product->department_id)selected @endif>{{ $department->name_ar }}</option>


            @else

            <option value="{{ $department->id }}" @if($department->id==$product->department_id)selected @endif>{{ $department->name_en }}</option>


            @endif


            @endforeach
        </select>
        @error('department')
        <span class="invalid-feedback " role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror  
    </div>
    <div class="w-100 m-auto">
        <label>{{ __("messages.Photo") }}</label>
        <input  type="file" id="input-id" value="{{ asset("img/upload/product/$product->photo") }}"  class="form-control file @error('photo')is-invalid @enderror" multiple name="photo[]" placeholder="Enter the Photo"/>
        @error('photo')
        <span class="invalid-feedback " role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror  
    </div>
    <br/>


</div>

<br/>