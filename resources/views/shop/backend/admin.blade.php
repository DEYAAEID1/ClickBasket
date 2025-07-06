<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8" />
    <title>ClickBasket </title>
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:title" content="" />
    <meta property="og:type" content="" />
    <meta property="og:url" content="" />
    <meta property="og:image" content="" />
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/imgs/theme/favicon.svg') }}" />
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/animate.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/landmain.css?v=5.3') }}" />
</head>

<body>


    <!-- Header  -->
    <header class="header-area header-style-1 header-height-2">


        <div class="header-middle header-middle-ptb-1 d-none d-lg-block">
            <div class="container">
                <div class="header-wrap">
                    <div class="logo logo-width-1">
                        <a href="{{ route('landing') }}"><img src="{{ asset('assets/imgs/logow.png') }}" alt="logo" /></a>
                    </div>
                    <div class="header-right">
                        <div class="search-style-2">
                            <form action="#">
                                <select class="select-active">
                                    <option>All Categories</option>
                                    <option>Milks and Dairies</option>
                                    <option>Wines & Alcohol</option>
                                    <option>Clothing & Beauty</option>
                                    <option>Pet Foods & Toy</option>
                                    <option>Fast food</option>
                                    <option>Baking material</option>
                                    <option>Vegetables</option>
                                    <option>Fresh Seafood</option>
                                    <option>Noodles & Rice</option>
                                    <option>Ice cream</option>
                                </select>
                                <input type="text" placeholder="Search for items..." />
                            </form>
                        </div>
                        <div class="header-action-right">
                            <div class="header-action-2">
                                <div class="search-location">
                                    <form action="#">
                                        <select class="select-active">
                                            <option>Your Location</option>
                                            <option>Alabama</option>
                                            <option>Alaska</option>
                                            <option>Arizona</option>
                                            <option>Delaware</option>
                                            <option>Florida</option>
                                            <option>Georgia</option>
                                            <option>Hawaii</option>
                                            <option>Indiana</option>
                                            <option>Maryland</option>
                                            <option>Nevada</option>
                                            <option>New Jersey</option>
                                            <option>New Mexico</option>
                                            <option>New York</option>
                                        </select>
                                    </form>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </header>



    <main class="main pages">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="header-bottom header-bottom-bg-color sticky-bar">
                    <div class="container">
                        <div class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block font-heading">
                            <nav>
                                <ul>
                                    <li>
                                        <a href="#">Users <i class="fi-rs-angle-down"></i></a>
                                        <ul class="sub-menu">
                                            <li><a href="page-account.html">All Users</a></li>
                                            <li><a href="page-account.html">New Users</a></li>

                                        </ul>
                                    </li>

                                    <li>
                                        <a href="#"> Products <i class="fi-rs-angle-down"></i></a>
                                        <ul class="sub-menu">
                                            <li><a href="page-account.html">All Shop</a></li>
                                            <li><a href="page-account.html">Recent Sales</a></li>
                                            <li><a href="page-account.html">Manage Products </a></li>
                                            <li><a href="{{ route('admin.categories.index') }}">Manage Categories </a></li>
                                            <li><a href="page-account.html">add discounts </a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                                            @csrf
                                            <button type="submit" class="active">Log Out</button>
                                        </form>

                                    </li>

                                </ul>


                            </nav>

                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="page-content pt-150 pb-150">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 m-auto">
                        <div class="row">
                            <div class="col-md-3">

                            </div>
                            <div class="col-md-9">
                                <div class="tab-content account dashboard-content pl-50">
                                    <div class="tab-pane fade active show" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="mb-0">Hello Rosie!</h3>
                                            </div>
                                            <div class="card-body">

                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="track-orders" role="tabpanel" aria-labelledby="track-orders-tab">
                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="mb-0">Orders tracking</h3>
                                            </div>
                                            <div class="card-body contact-from-area">
                                                <p>To track your order please enter your OrderID in the box below and press "Track" button. This was given to you on your receipt and in the confirmation email you should have received.</p>
                                                <div class="row">
                                                    <div class="col-lg-8">
                                                        <form class="contact-form-style mt-30 mb-50" action="#" method="post">
                                                            <div class="input-style mb-20">
                                                                <label>Order ID</label>
                                                                <input name="order-id" placeholder="Found in your order confirmation email" type="text" />
                                                            </div>
                                                            <div class="input-style mb-20">
                                                                <label>Billing email</label>
                                                                <input name="billing-email" placeholder="Email you used during checkout" type="email" />
                                                            </div>
                                                            <button class="submit submit-auto-width" type="submit">Track</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>


    <script src="{{ asset('assets/js/vendor/modernizr-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/jquery-migrate-3.3.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/slick.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/jquery.syotimer.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/waypoints.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/wow.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/magnific-popup.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/select2.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/counterup.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/images-loaded.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/isotope.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/scrollup.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/jquery.vticker-min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/jquery.theia.sticky.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/jquery.elevatezoom.js') }}"></script>
    <!-- Template  JS -->
    <script src="{{ asset('assets/js/main.js?v=5.3') }}"></script>
    <script src="{{ asset('assets/js/shop.js?v=5.3') }}"></script>
</body>

</html>