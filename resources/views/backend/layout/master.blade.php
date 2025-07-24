<!DOCTYPE html>
<html lang="ar">

<head>
    <!-- ================= Meta Tags ================= -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>ClickBasket</title>
    <!-- ================= Favicon  ================= -->
    <link rel="icon" href="{{ asset('backassets/images/favicon-32x32.png') }}" type="image/png" />

    <!-- ================= Core CSS ================= -->
    <link href="{{asset('backassets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('backassets/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('backassets/css/icons.css') }}" rel="stylesheet">
    <link href="{{ asset('backassets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('backassets/css/responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('backassets/css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('backassets/css/theme.css') }}" rel="stylesheet">
    <link href="{{ asset('backassets/css/pages.css') }}" rel="stylesheet">

    <!-- ================= Plugin CSS ================= -->
    <link href="{{asset('backassets/plugins/simplebar/css/simplebar.css')}}" rel="stylesheet">
    <link href="{{ asset('backassets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />
    <link href="{{ asset('backassets/plugins/vectormap/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet" />
    <link href="{{asset('backassets/plugins/metismenu/css/metisMenu.min.css')}}" rel="stylesheet">
إ
    <!-- ================= Loader CSS ================= -->
    <link href="{{ asset('backassets/css/pace.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('backassets/js/pace.min.js') }}"></script>
    <!-- ================= Core JS ================= -->
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
     <!-- ================= Plugin JS ================= -->
    <script src="{{asset('backassets/plugins/metismenu/js/metisMenu.min.j')}}'"></script>
    <!-- ================= DataTable ================= -->
    <link href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.bootstrap5.min.css" />
    <!-- ================= Bootstrap ================= -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('backassets/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('backassets/css/icons.css') }}" rel="stylesheet">
    <!-- ================= Theme Style CSS ================= -->
    <link rel="stylesheet" href="{{ asset('backassets/css/dark-theme.css') }}" />
    <link rel="stylesheet" href="{{ asset('backassets/css/semi-dark.css') }}" />
    <link rel="stylesheet" href="{{ asset('backassets/css/header-colors.css') }}" />
    <!-- ================= Styles from Pages ================= -->
    @stack('styles')
</head>

<body>


    <div class="wrapper">
        <header>
            <nav>

                <!-- ================= Navbar ================= -->
                @include('backend.layout.body.navbar')
            </nav>
        </header>
        <div class="container">
            <aside>


                <!-- ================= Sidebar ================= -->
                @include('backend.layout.body.sidebar')
            </aside>

            <div class="page-wrapper">
                <div class="page-content">
                    <div class="card radius-10">

                        <!-- ================= Main Content ================= -->
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>

        <!-- ================= Footer ================= -->
        <footer class="page-footer">
            <p class="mb-0">Copyright © 2021. All right reserved.</p>
            <!-- ================= New DataTable ================= -->
        </footer>

    </div>


    <!-- ================= Bootstrap JS ================= -->
    <script src="{{ asset('backassets/js/bootstrap.bundle.min.js') }}"></script>
    <!-- ================= DataTable JS ================= -->
   
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vfs-fonts/2.0.0/vfs_fonts.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
    <!-- ================= Plugins JS ================= -->
    <script src="{{ asset('assets/js/backend/dashboard.js') }}"></script>

    <script src="{{ asset('backassets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
    <script src="{{ asset('backassets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('backassets/plugins/chartjs/js/Chart.min.js') }}"></script>
    <script src="{{ asset('backassets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
    <script src="{{ asset('backassets/plugins/vectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
    <script src="{{ asset('backassets/plugins/jquery.easy-pie-chart/jquery.easypiechart.min.js') }}"></script>
    <script src="{{ asset('backassets/plugins/sparkline-charts/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('backassets/plugins/jquery-knob/excanvas.js') }}"></script>
    <script src="{{ asset('backassets/plugins/jquery-knob/jquery.knob.js') }}"></script>
    <!-- App JS -->
    <script src="{{ asset('backassets/js/app.js') }}"></script>

    <!-- Optional file generation libs (for excel/pdf exports) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <!-- ================= Page-specific JS ================= -->
    @stack('scripts') <!-- لإضافة أي ملفات JavaScript إضافية من الصفحات الفرعية -->
    <script src="{{ asset('js/custom.js') }}"></script>


</body>

</html>