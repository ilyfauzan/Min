<!doctype html>
<html lang="en" data-layout="vertical" data-layout-style="detached" data-sidebar="dark" data-topbar="dark"
    data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">

<head>

    <meta charset="utf-8" />
    <title>{{ @$sub_breadcrumbs ? @$sub_breadcrumbs . ' - ' : '' }} {{ config('app.name', 'Laravel') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- One of the following themes -->
    <link rel="stylesheet" href="{{ asset('velzon/assets/') }}/libs/@simonwep/pickr/themes/classic.min.css" />
    <!-- 'classic' theme -->
    <link rel="stylesheet" href="{{ asset('velzon/assets/') }}/libs/@simonwep/pickr/themes/monolith.min.css" />
    <!-- 'monolith' theme -->
    <link rel="stylesheet" href="{{ asset('velzon/assets/') }}/libs/@simonwep/pickr/themes/nano.min.css" />
    <!-- 'nano' theme -->
    {{-- select 2 --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('velzon/img/') }}/icon.png">

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

    {{-- sweet alert --}}
    <link href="{{ asset('velzon/assets/') }}/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    @yield('style')
    <script type='text/javascript' src='http://code.jquery.com/jquery-1.11.0.js'></script>
    <script type='text/javascript'
        src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>

</head>

<body>

    <!-- Begin page -->
    <div id="layout-wrapper">

        @include('admin.layouts.header')
        <!-- Vertical Overlay-->
        <div class="vertical-overlay"></div>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">
                    <!-- start page title -->
                    @if (@$breadcrumbs)
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">
                                        {{ $sub_breadcrumbs ? $sub_breadcrumbs : $breadcrumbs ?? '' }}
                                    </h4>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a
                                                    href="javascript: void(0);">{{ $breadcrumbs ?? null }}</a></li>
                                            <li class="breadcrumb-item active">{{ $sub_breadcrumbs ?? null }}</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                    @endif
                    @yield('breadcrumbs')
                    @include('admin.layouts.alert')
                    @yield('content')
                    <!-- end page title -->
                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            @include('admin.layouts.footer')

        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    <!--start back-to-top-->
    <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
        <i class="ri-arrow-up-line"></i>
    </button>
    <!--end back-to-top-->

    <!-- JAVASCRIPT -->
    <script src="{{ asset('velzon/assets/') }}/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('velzon/assets/') }}/libs/simplebar/simplebar.min.js"></script>
    <script src="{{ asset('velzon/assets/') }}/libs/node-waves/waves.min.js"></script>
    <script src="{{ asset('velzon/assets/') }}/libs/feather-icons/feather.min.js"></script>
    <script src="{{ asset('velzon/assets/') }}/js/pages/plugins/lord-icon-2.1.0.js"></script>
    {{-- <script src="{{ asset('velzon/assets/') }}/js/plugins.js"></script> --}}

    <!-- App js -->
    <script src="{{ asset('js/appv2.js') }}"></script>
    <script src="{{ asset('velzon/assets/') }}/js/app.js"></script>

    <script src="{{ asset('velzon/assets/') }}/js/pages/select2.init.js"></script>

    <!--jquery cdn-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!--select2 cdn-->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <!-- Sweet Alerts js -->
    <script src="{{ asset('velzon/assets/') }}/libs/sweetalert2/sweetalert2.min.js"></script>
    <!-- Sweet alert init js-->
    <script src="{{ asset('velzon/assets/') }}/js/pages/sweetalerts.init.js"></script>

    @yield('script')
    <script>
        (document.querySelectorAll("[toast-list]") || document.querySelectorAll("[data-choices]") || document
            .querySelectorAll("[data-provider]")) && (document.writeln(
                "<script type='text/javascript' src='https://cdn.jsdelivr.net/npm/toastify-js'><\/script>"),
            document.writeln(
                "<script type='text/javascript' src='velzon/assets/libs/choices.js/public/assets/scripts/choices.min.js'><\/script>"
            ),
            document.writeln(
                "<script type='text/javascript' src='velzon/assets/libs/flatpickr/flatpickr.min.js'><\/script>"));
    </script>
</body>

</html>
