<nav class="navbar navbar-expand-lg  navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand " style="font-weight: 700" href="{{ route("show_style_user") }}">E-<span class="text-danger">Commerce</span></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route("show_style_user") }}">{{ __("messages.Home") }}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route("my_profile") }}"><i class="fas fa-user"></i> {{ __("messages.Account") }}</a>
          </li>
          <li class="nav-item">
            <div class="dropdown">
                <button style="color: rgb(199, 194, 194)" class="btn   dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                  {{ __("messages.Category") }}
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    @foreach(\App\Models\category::get() as $department)

                  <li class="text-center p-1"><a class="dropdown-item" href="{{ route("department_items",$department->id) }}">{{ $department->name }}</a></li>


                    @endforeach

                </ul>
              </div>


          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              {{ __("messages.Language") }}
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                <li class="d-flex justify-content-center p-2">
                    <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                        {{ $properties['native'] }}
                    </a>
                </li>
            @endforeach
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route("contact") }}">{{ __("messages.Suggest") }}</a>
          </li>

          <li class="nav-item ">
            <a class="nav-link" href="{{ route("logout_style") }}">{{ __("messages.Logout") }}</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>