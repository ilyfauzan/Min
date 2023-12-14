<!doctype html>
<html lang="en" data-layout="vertical" data-layout-style="detached" data-sidebar="light" data-topbar="dark"
    data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">

<head>

    <meta charset="utf-8" />
    <title>Anda Dilarang | Zanshop</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- App favicon -->

    <!-- Layout config Js -->
    <script src="{{ asset('velzon/assets/') }}/js/layout.js"></script>
    <!-- Bootstrap Css -->
    <link href="{{ asset('velzon/assets/') }}/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('velzon/assets/') }}/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('velzon/assets/') }}/css/app.min.css" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="{{ asset('velzon/assets/') }}/css/custom.min.css" rel="stylesheet" type="text/css" />

</head>

<body>

    <!-- auth-page wrapper -->
    <div class="auth-page-wrapper py-5 d-flex justify-content-center align-items-center min-vh-100">

        <!-- auth-page content -->
        <div class="auth-page-content overflow-hidden p-0">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-7 col-lg-8">
                        <div class="text-center">
                            <img src="{{ asset('velzon/assets/') }}/images/503.jpg" width="500" alt="error img"
                                class="img-fluid">
                            <div class="mt-3">
                                <h3 class="text-uppercase">Maaf, Halaman dikunci 😭</h3>
                                <p class="text-muted mb-4">Anda tidak memiliki akses ke halaman ini!</p>
                                <a href="{{ route('home') }}" class="btn btn-info"><i class="mdi mdi-home me-1"></i>Back
                                    to home</a>
                            </div>
                        </div>
                    </div><!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end auth-page content -->
    </div>
    <!-- end auth-page-wrapper -->

</body>

</html>
