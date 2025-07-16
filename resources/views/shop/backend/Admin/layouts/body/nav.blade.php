<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon -->
    <link rel="icon" href="assets/imgs/logo.png" type="image/png" />

    <!-- Bootstrap CSS -->
    <link href="backassets/css/bootstrap.min.css" rel="stylesheet">
    <link href="backassets/css/app.css" rel="stylesheet">
    <link href="backassets/css/icons.css" rel="stylesheet">

    <!-- Plugins CSS -->
    <link href="backassets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
    <link href="backassets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
    <link href="backassets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
    <link href="backassets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />

    <!-- Theme Style CSS -->
    <link rel="stylesheet" href="backassets/css/dark-theme.css" />
    <link rel="stylesheet" href="backassets/css/semi-dark.css" />
    <link rel="stylesheet" href="backassets/css/header-colors.css" />

    <!-- Loader CSS -->
    <link href="backassets/css/pace.min.css" rel="stylesheet" />
    <script src="backassets/js/pace.min.js"></script>

    <title>ClickBasket Admin Dashboard</title>
</head>

<body>
    <header>
        <div class="topbar d-flex align-items-center">
            <nav class="navbar navbar-expand">
                <div class="mobile-toggle-menu"><i class='bx bx-menu'></i></div>
                <div class="top-menu ms-auto"></div>
                <div class="user-box dropdown">
                    <div id="User_Name" class="text-center">
                        <h3 class="mb-0">Welcome {{ optional(auth()->user())->name ?? 'Guest' }}</h3>
                    </div>
                </div>
            </nav>
        </div>
    </header>

    <!-- Wrapper -->
    <div class="wrapper">
        <!-- Sidebar Wrapper -->
        <div class="sidebar-wrapper" data-simplebar="true">
            <div class="sidebar-header">
                <div>
                    <img src="assets/imgs/logo.png" class="logo-icon" alt="logo icon">
                </div>
                <div>
                    <h4 class="logo-text">Rukada</h4>
                </div>
                <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i></div>
            </div>

            <!-- Navigation -->
            <ul class="metismenu" id="menu">
                <!-- Dashboard Section -->
                <li>
                <li><a href="index.html">
                    <i class="bx bx-right-arrow-alt"></i>Dashboard</a></li>

                </li>

                <!-- Product Management -->
                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon"><i class='bx bx-category'></i></div>
                        <div class="menu-title">Product Management</div>
                    </a>
                    <ul>
                        <li><a href="add-product.html"><i class="bx bx-right-arrow-alt"></i>Add Products</a></li>
                        <li><a href="edit-product.html"><i class="bx bx-right-arrow-alt"></i>Edit Products</a></li>

                    </ul>
                </li>
                <li>
                    <a href="manage-categories.html">
                        <i class="bx bx-right-arrow-alt"></i>Manage Categories
                    </a>
                </li>
                <!-- User Profile Section -->
                <li>
                    <a href="edit-profile.html">
                        <i class="bx bx-right-arrow-alt"></i>Edit Profile
                    </a>
                </li>

                <!-- Logout -->
                <li>
                    <a href="logout.html">
                        <i class="bx bx-right-arrow-alt"></i>Log Out
                    </a>
                </li>
            </ul>

        </div>
    </div>

    <!-- JavaScript files -->
    <script src="backassets/js/jquery.min.js"></script>
    <script src="backassets/js/bootstrap.bundle.min.js"></script>

    <!-- Plugins JS -->
    <script src="backassets/plugins/simplebar/js/simplebar.min.js"></script>
    <script src="backassets/plugins/metismenu/js/metisMenu.min.js"></script>

    <!-- Custom Script for DataTables Initialization -->
    <script>
        $(document).ready(function() {
            $('#menu').metisMenu(); // Initialize Metismenu
        });
    </script>

    <!-- Custom Dashboard Script -->
    <script src="backassets/js/dashboard-eCommerce.js"></script>

    <!-- App JS -->
    <script src="backassets/js/app.js"></script>

    <!-- Initialize PerfectScrollbar -->
    <script>
        new PerfectScrollbar('.product-list');
        new PerfectScrollbar('.customers-list');
    </script>


</body>

</html>