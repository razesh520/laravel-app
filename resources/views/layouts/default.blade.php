<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="Saquib" content="Blade">
    <title>@yield('title')</title>
    <!-- plugin css for this page -->
    <link rel="stylesheet" href="/assets/vendors/mdi/css/materialdesignicons.min.css"/>
    <link rel="stylesheet" href="/assets/vendors/aos/dist/aos.css/aos.css" />

    <!-- End plugin css for this page -->
    <link rel="shortcut icon" href="/assets/images/favicon.png" />

    <!-- inject:css -->
    <link rel="stylesheet" href="/assets/css/style.css">
    <!-- endinject -->
</head>

<body>
    <div class="container-scroller">
        <div class="main-panel">
            @include('includes.header')

            <div class="content-wrapper">
                <div class="container">
                    @yield('content')
                </div>
            </div>

            @include('includes.footer')
        </div>
    </div>

    <!-- inject:js -->
    <script src="/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- plugin js for this page -->
    <script src="/assets/vendors/aos/dist/aos.js/aos.js"></script>
    <!-- End plugin js for this page -->
    <!-- Custom js for this page-->
    <script src="/assets/js/demo.js"></script>
    <script src="/assets/js/jquery.easeScroll.js"></script>
    <!-- End custom js for this page-->
</body>

</html>