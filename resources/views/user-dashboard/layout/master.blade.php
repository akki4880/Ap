<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from admin.pixelstrap.net/admiro/template/accordion.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 28 Feb 2025 17:20:39 GMT -->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <title>@yield('title')</title>
    @include('user-dashboard.layout.css')
</head>

<body>
    <!-- page-wrapper Start-->
    <!-- tap on top starts-->
    <div class="tap-top"><i class="iconly-Arrow-Up icli"></i></div>
    <!-- tap on tap ends-->
    <!-- loader-->
    <div class="loader-wrapper">
        <div class="loader"><span></span><span></span><span></span><span></span><span></span></div>
    </div>
    <div class="page-wrapper   " id="pageWrapper">
        @include('user-dashboard.layout.top')
        <!-- Page Body Start-->
        <div class="page-body-wrapper">
            <!-- Page sidebar start-->
            @include('user-dashboard.layout.sidebar')
            <!-- Page sidebar end-->
            <div class="page-body">
                <div class="container-fluid">
                    <div class="page-title">
                        <div class="row">
                            <div class="col-sm-6 col-12">
                                <h2>@yield('breadcrumb')</h2>
                            </div>
                            <div class="col-sm-6 col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"> <a href="/"> <i class="iconly-Home icli svg-color"></i></a></li>
                                    <li class="breadcrumb-item">@yield('main_breadcrumb')</li>
                                    <li class="breadcrumb-item active">@yield('breadcrumb')</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Container-fluid starts-->
                <div class="container-fluid">
                @yield('content')

                </div>
            </div> 
        </div>
    </div>
    @include('user-dashboard.layout.script')

</body>



</html>