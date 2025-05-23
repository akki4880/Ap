
<!DOCTYPE html>
<html lang="en">
<x-auth-session-status class="mb-4" :status="session('status')" />
<!-- Mirrored from admin.pixelstrap.net/admiro/template/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 27 Feb 2025 17:09:06 GMT -->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Admiro admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Admiro admin template, best javascript admin, dashboard template, bootstrap admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <title>Login</title>
    <!-- Favicon icon-->
    <link rel="icon" href="../assets/images/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="../assets/images/favicon.png" type="image/x-icon">
    <!-- Google font-->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:opsz,wght@6..12,200;6..12,300;6..12,400;6..12,500;6..12,600;6..12,700;6..12,800;6..12,900;6..12,1000&amp;display=swap" rel="stylesheet">
    <!-- Flag icon css -->
    <link rel="stylesheet" href="../assets/css/vendors/flag-icon.css">
    <!-- iconly-icon-->
    <link rel="stylesheet" href="../assets/css/iconly-icon.css">
    <link rel="stylesheet" href="../assets/css/bulk-style.css">
    <!-- iconly-icon-->
    <link rel="stylesheet" href="../assets/css/themify.css">
    <!--fontawesome-->
    <link rel="stylesheet" href="../assets/css/fontawesome-min.css">
    <!-- Whether Icon css-->
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/weather-icons/weather-icons.min.css">
    <!-- App css -->
    <link rel="stylesheet" href="../assets/css/style.css">
    <link id="color" rel="stylesheet" href="../assets/css/color-1.css" media="screen">
  </head>
  <body>
    <!-- tap on top starts-->
    <div class="tap-top"><i class="iconly-Arrow-Up icli"></i></div>
    <!-- tap on tap ends-->
    <!-- loader-->
    <div class="loader-wrapper">
      <div class="loader"><span></span><span></span><span></span><span></span><span></span></div>
    </div>
    <!-- login page start-->
    <div class="container-fluid p-0">
      <div class="row m-0">
        <div class="col-12 p-0">    
          <div class="login-card login-dark">
            <div>
              <!-- <div><a class="logo" href="index.html"><img class="img-fluid for-light m-auto" src="../assets/images/logo/logo1.png" alt="looginpage"><img class="img-fluid for-dark" src="../assets/images/logo/logo-dark.png" alt="logo"></a></div> -->
              <div class="login-main"> 
                <h2 class="text-center">{{ __('Admin Log in') }}</h2>
                <form method="POST" action="{{ route('admin.login') }}" class="space-y-4">
                  @csrf
                  <p class="text-center">Enter your email &amp; password to login</p>
                  <div class="form-group">
                    <label class="col-form-label">Email Address</label>
                    <input class="form-control" id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                    autocomplete="email">
                  </div>
                  <div class="form-group">
                    <label class="col-form-label">Password</label>
                    <div class="form-input position-relative">
                      <input class="form-control" id="password" type="password" name="password" required autocomplete="current-password"> 
                    </div>
                  </div>
                  <div class="form-group mb-0 checkbox-checked"> 
                    <a class="link" href="forget-password.html">Forgot password?</a>
                    <div class="text-end mt-3">
                      <button class="btn btn-primary btn-block w-100" type="submit">Login</button>
                    </div>
                  </div> 
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- jquery-->
      <script src="../assets/js/vendors/jquery/jquery.min.js"></script>
      <!-- bootstrap js-->
      <script src="../assets/js/vendors/bootstrap/dist/js/bootstrap.bundle.min.js" defer=""></script>
      <script src="../assets/js/vendors/bootstrap/dist/js/popper.min.js" defer=""></script>
      <!--fontawesome-->
      <script src="../assets/js/vendors/font-awesome/fontawesome-min.js"></script>
      <!-- password_show-->
      <script src="../assets/js/password.js"></script>
      <!-- custom script -->
      <script src="../assets/js/script.js"></script>
    </div>
  </body>

<!-- Mirrored from admin.pixelstrap.net/admiro/template/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 27 Feb 2025 17:09:06 GMT -->
</html>
