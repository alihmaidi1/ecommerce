<div id="search_models" class="modal fade">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <button type="button" class="button dismiss-button ion ion-ios-close" data-dismiss="modal"></button>
            <div class="modal-body">
                <div class="modal-body u-s-p-x-0">
                    <div class="row align-items-center u-s-m-x-0">
                        <div class="col-lg-6 col-md-6 col-sm-12 u-s-p-x-0">
                            <div class="newsletter-image">
                                <a href="" class="banner-hover effect-dark-opacity">
                                    <img loading="lazy" class="img-fluid" src="{{ asset("site2/images/site2/11.jpg") }}" alt="Newsletter Image">
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="newsletter-wrapper">
                                <h1>{{ __("messages.Do you") }}
                                    <span>{{ __("messages.Search?") }}</span> 
                                    <br>{{ __("messages.About Anything") }}</h1>
                                <h5>{{ __("messages.Get All Product") }} </h5>
                                <form method="GET" action="{{ route("search_user") }}">
                                    @csrf
                            <label class="sr-only" for="search-landscape">{{ __("messages.Search") }}</label>
                            <div class="input-group">
                            <input id="search-landscape" required name="search" type="text" class="form-control" placeholder="{{ __("messages.Search everything") }}">
                            <div class="select-box-position">
                                <div style="color:#fff" class=" select-box-wrapper select-hide ">
                                    <label class="sr-only" for="select-category">{{ __("messages.Choose category for search") }}</label>
                                    <select class="select-box" name="department" id="select-category">
                                        <option selected="selected" value="0">
                                            {{ __("messages.All") }}
                                        </option>
                                        @foreach(\App\Models\category::get() as $department)
    
                                            @if(LaravelLocalization::getCurrentLocale()=="ar")
    
    
                                            <option value="{{ $department->id }}">{{ $department->name_ar }}</option>
    
    
                                            @else
    
                                            <option value="{{ $department->id }}">{{ $department->name_en }}</option>
    
    
                                            @endif
    
    
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            </div>
                            <input name="page" type="hidden" value="1"/>
                            <br/>
                            <button id="btn-search" type="submit" class="button w-100 p-2 button-primary ">{{ __("messages.Search") }}</button>
    
                                </form>
                            <br/>
                                <h6>{{ __("messages.you can get the product about any department") }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
