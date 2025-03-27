<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <style>
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
            overflow-x: hidden; /* Prevent horizontal scroll */
        }

        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .page-wrapper {
            flex: 1;
            display: flex;
            flex-direction: column;
            overflow: hidden;
        }

        .page-body-wrapper {
            flex: 1;
            display: flex;
            flex-direction: column;
            overflow: hidden;
        }

        .page-body {
            flex: 1;
            display: flex;
            flex-direction: column;
            overflow-y: auto; /* Enables vertical scroll if needed */
        }
    </style>

    @include('admin.layout.css')
</head>

<body>

    <!-- Tap to top button -->
    <div class="tap-top">
        <i class="iconly-Arrow-Up icli"></i>
    </div>

    <!-- Loader -->
    <div class="loader-wrapper">
        <div class="loader">
            <span></span><span></span><span></span><span></span><span></span>
        </div>
    </div>

    <!-- Page wrapper -->
    <div class="page-wrapper" id="pageWrapper">
        @include('admin.layout.top')

        <!-- Sidebar + Content wrapper -->
        <div class="page-body-wrapper">
            @include('admin.layout.sidebar')

            <!-- Main content area -->
            <div class="page-body">
                <div class="container-fluid mb-5">
                    <div class="page-title">
                        <div class="row">
                            <div class="col-sm-6 col-12">
                                <h2>@yield('breadcrumb')</h2>
                            </div>
                            <div class="col-sm-6 col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="/">
                                            <i class="iconly-Home icli svg-color"></i>
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item">@yield('main_breadcrumb')</li>
                                    <li class="breadcrumb-item active">@yield('breadcrumb')</li>
                                </ol>
                            </div>
                        </div>
                    </div>

                    <!-- Your dynamic page content -->
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    @include('admin.layout.script')
</body>

</html>
