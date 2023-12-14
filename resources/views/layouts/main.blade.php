<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>{{ $title }} | Zanshop</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('velzon/img/') }}/icon.png">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <meta name="title" content="Zanshop" />
    <meta name="description"
        content="Zanshop adalah platform inovatif yang bertujuan untuk membantu
                            nelayan dan petani ikan air tawar di desa Berasan Mulya dalam memasarkan produk mereka
                            secara online. Kami berkomitmen untuk mendukung perekonomian lokal dan pelestarian sumber
                            daya alam." />

    <!--Swiper slider css-->
    <link href="{{ asset('velzon/assets/') }}/libs/swiper/swiper-bundle.min.css" rel="stylesheet" type="text/css" />

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
    <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>

    <!-- password-addon init -->
    <script src="{{ asset('velzon/assets/') }}/js/pages/password-addon.init.js"></script>
    <script src="{{ asset('js/appv2.js/') }}"></script>

</head>

<body data-bs-spy="scroll" data-bs-target="#navbar-example">

    <!-- Begin page -->
    <div class="layout-wrapper landing">

        @include('layouts.header')
        <section class="section job-hero-section bg-light pb-0" id="hero">
            <div class="container">

                @yield('content')
                <!-- end row -->
            </div>
            <!-- end container -->
        </section>
        @include('layouts.footer')
    </div>
    <!-- end layout wrapper -->

    <!-- JAVASCRIPT -->
    <script src="{{ asset('velzon/assets/') }}/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('velzon/assets/') }}/libs/simplebar/simplebar.min.js"></script>
    <script src="{{ asset('velzon/assets/') }}/libs/node-waves/waves.min.js"></script>
    <script src="{{ asset('velzon/assets/') }}/libs/feather-icons/feather.min.js"></script>
    <script src="{{ asset('velzon/assets/') }}/js/pages/plugins/lord-icon-2.1.0.js"></script>
    <script src="{{ asset('velzon/assets/') }}/js/plugins.js"></script>

    <!--Swiper slider js-->
    <script src="{{ asset('velzon/assets/') }}/libs/swiper/swiper-bundle.min.js"></script>

    <!--job landing init -->
    <script src="{{ asset('velzon/assets/') }}/js/pages/job-lading.init.js"></script>

    <!--select2 cdn-->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <link href="{{ asset('velzon/assets/') }}/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />

    <script src="{{ asset('velzon/assets/') }}/js/pages/select2.init.js"></script>
    @yield('script')

    <script>
        $(document).ready(function() {
            console.log("ready!");
        });
        var rupiah = document.getElementsByClassName("rupiah");
        for (let i = 0; i < rupiah.length; i++) {
            rupiah[i].value = formatRupiah(rupiah[i].value);
            rupiah[i].addEventListener("keyup", function(e) {
                rupiah[i].value = formatRupiah(this.value);
            });
        }
        /* Fungsi formatRupiah */
        function formatRupiah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, "").toString(),
                split = number_string.split(","),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            // tambahkan titik jika yang di input sudah menjadi angka ribuan
            if (ribuan) {
                separator = sisa ? "." : "";
                rupiah += separator + ribuan.join(".");
            }

            rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
            return prefix == undefined ? rupiah : rupiah ? rupiah : "";
        }
    </script>
    @include('sweetalert::alert')

    <!-- Sweet Alerts js -->
    <script src="{{ asset('velzon/assets/') }}/libs/sweetalert2/sweetalert2.min.js"></script>
    <!-- Sweet alert init js-->
    <script src="{{ asset('velzon/assets/') }}/js/pages/sweetalerts.init.js"></script>
</body>

</html>
