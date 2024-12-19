<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="{{ asset('assets/') }}" data-template="vertical-menu-template-no-customizer">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>Sistem Manajemen Layanan dan Keuangan</title>
    <link rel="icon" type="image/x-icon" href="https://cdn-icons-png.flaticon.com/512/8074/8074804.png" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/core.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/theme-default.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}" />
    <!-- Tambahkan ini di dalam tag <head> di app.blade.php -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <!DOCTYPE html>

    <html
        lang="en"
        class="light-style layout-menu-fixed"
        dir="ltr"
        data-theme="theme-default"
        data-assets-path="../assets/"
        data-template="vertical-menu-template-free">

    <head>
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

        <title>Dashboard - Analytics | Sneat - Bootstrap 5 HTML Admin Template - Pro</title>

        <meta name="description" content="" />

        <!-- Favicon -->
        <link rel="icon" type="image/x-icon" href="https://cdn-icons-png.flaticon.com/512/8074/8074804.png" />

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link
            href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
            rel="stylesheet" />

        <!-- Icons. Uncomment required icon fonts -->
        <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />

        <!-- Core CSS -->
        <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" />
        <link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
        <link rel="stylesheet" href="../assets/css/demo.css" />

        <!-- Vendors CSS -->
        <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

        <link rel="stylesheet" href="../assets/vendor/libs/apex-charts/apex-charts.css" />


    </head>

    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->

            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
                <div class="app-brand demo">
                    <a href="index.html" class="app-brand-link">
                        <span class="app-brand-logo demo">
                            <img src="https://cdn-icons-png.flaticon.com/512/8074/8074804.png" style="height:50px;" />
                        </span>
                        <span class="app-brand-text demo menu-text fw-bolder ms-2">Admin</span>
                    </a>

                    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                        <i class="bx bx-chevron-left bx-sm align-middle"></i>
                    </a>
                </div>

                <div class="menu-inner-shadow"></div>

                <ul class="menu-inner py-1">
                    
    <!-- Dashboard -->
    <li class="menu-item active">
        <a href="/" class="menu-link">
            <i class="menu-icon tf-icons bx bx-home-circle"></i>
            <div data-i18n="Analytics">Dashboard</div>
        </a>
    </li>
    <li class="menu-item active">
        <a href="/book" class="menu-link">
        <i class="menu-icon tf-icons bx bx-book"></i>

            <div data-i18n="Analytics">Data Buku</div>
        </a>
    </li>
    <li class="menu-item active">
        <a href="/students" class="menu-link"> <!-- Ganti dengan route laporan -->
        <i class="menu-icon tf-icons bx bx-group"></i>
        <!-- Ganti dengan ikon yang sesuai -->
            <div data-i18n="Laporan">Data Siswa</div> <!-- Teks menu -->
        </a>
    </li>
    <li class="menu-item active">
        <a href="/borrowings" class="menu-link"> <!-- Ganti dengan route gaji -->
        <i class="menu-icon tf-icons bx bx-book-open"></i>

        <!-- Ganti dengan ikon yang sesuai -->
            <div data-i18n="Gaji">Peminjaman</div> <!-- Teks menu -->
        </a>
    </li>
    <li class="menu-item active">
        <a href="/returns" class="menu-link"> <!-- Ganti dengan route dataKaryawan -->
        <i class="menu-icon tf-icons bx bx-package"></i>
        <!-- Ganti dengan ikon yang sesuai -->
            <div data-i18n="Data Karyawan">Pengembalian</div> <!-- Teks menu -->
        </a>
    </li>

    <!-- Logout -->
    <li class="menu-item active" style="margin-top: auto; margin-bottom:25%;">
        
        <a href="{{ route('logout') }}" class="menu-link"> <!-- Ganti dengan route logout -->
            
            <i class="menu-icon tf-icons bx bx-log-out"></i> <!-- Ikon logout -->
            <div data-i18n="Logout">Logout</div> <!-- Teks menu -->
        </a>
    </li>
</ul>

                </li>
                </ul>
            </aside>
            <!-- / Menu -->
            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->
                

                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->

                    <div class="flex-grow-1 ">
                        <div class="row">
                            <div class="col-lg-8  order-0">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 order-1">
                            <div class="row">
                                <div class="col-lg-6 col-md-12 col-6 mb-4">
                                    <div class="card">

                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 col-6 mb-4">
                                    <div class="card">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- / Content -->
                <div class="container flex-grow-1 container-p-y my-2">
                    @yield('content')
                </div>
                <!-- Footer -->
                
                <!-- / Footer -->

                <div class="content-backdrop fade"></div>
            </div>
            <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->


    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../assets/vendor/libs/popper/popper.js"></script>
    <script src="../assets/vendor/js/bootstrap.js"></script>
    <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="../assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="../assets/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="../assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="../assets/js/dashboards-analytics.js"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>


    <script src="{{ asset('assets/vendor/js/core.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/theme-default.js') }}"></script>
</body>

</html>