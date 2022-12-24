<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href={{ asset("AdminLTE/plugins/fontawesome-free/css/all.min.css") }}>
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href={{ asset("AdminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css") }}>
  <!-- Theme style -->
  <link rel="stylesheet" href={{ asset("AdminLTE/dist/css/adminlte.min.css") }}>
  <meta name="google-signin-client_id" content="955884544911-9jiv95lnlihdioarlk83o6bmp3q89vpj.apps.googleusercontent.com">

  <script src="https://apis.google.com/js/platform.js" async defer></script>


</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href=""><b>User</b><span class="text-danger text-bold"> ecommerce</span></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      @if(Session()->has("error"))
      <div class="alert alert-danger">{{ Session("error") }}</div>
      @endif
      <form  action="{{ route('login_user') }}" method="post">

        @csrf
        <div class="input-group mb-3">
          <input type="email" class="form-control" name="email" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" name="remember_me" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="social-auth-links text-center mb-3">
        <p>- OR -</p>

        <a href="auth/login/google" class="btn btn-danger w-100"><i class="fab fa-google"></i> Login with google </a>
        <br/>
        <br/>
        <a href="auth/login/facebook" class="btn btn-primary w-100"><i class="fab fa-facebook"></i> login With facebook</a>
      <!-- /.social-auth-links -->
<br/>
<br/>

      <p class="mb-1">
        <a href="{{ route("forget_style") }}">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="{{ route("register_style") }}" class="text-center">Register a new membership</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src={{ asset("AdminLTE/plugins/jquery/jquery.min.js") }}></script>
<!-- Bootstrap 4 -->
<script src={{ asset("AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js") }}></script>
<!-- AdminLTE App -->
<script src={{ asset("AdminLTE/dist/js/adminlte.min.js") }}></script>

</body>
</html>
