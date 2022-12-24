<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          {{ __("messages.Department") }}
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
          @foreach(\App\models\category::get() as $department)
          <li><a class="dropdown-item text-center" href="{{ route("show_department_product",$department->id) }}">{{ $department->name }}</a></li>
          @endforeach

        </ul>
    </li>

      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route("logout") }}" class="nav-link">{{ __("messages.Logout") }}</a>
      </li>
      
    </ul>
    

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      

      <!-- Messages Dropdown Menu -->
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item  d-sm-inline-block">
       
       
        <div class="dropdown">
          <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
            {{ __("messages.Language") }}
          </button>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">

            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
            <li class="d-flex justify-content-center p-1">
                <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                    {{ $properties['native'] }}
                </a>
            </li>
        @endforeach
          </ul>
        </div>
        
      
      </li>
      
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
 