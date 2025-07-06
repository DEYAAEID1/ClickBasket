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
    <link rel="shortcut icon" type="image/x-icon" href="assets/imgs/theme/favicon.svg" />
    <!-- Template CSS -->
    <link rel="stylesheet" href="assets/css/plugins/animate.min.css" />
    <link rel="stylesheet" href="assets/css/landmain.css?v=5.3" />
</head>

<body>
    
    
    <!-- Header  -->
    <header class="header-area header-style-1 header-height-2">
        
        <div class="header-bottom header-bottom-bg-color sticky-bar">
            <div class="container">
             <div class="header-wrap header-space-between position-relative">
             <div class="logo logo-width-1">
                        <a href="{{ route('landing') }}"><img src="assets/imgs/logow.png" alt="logo" /></a>
                    </div>
            <div class="header-nav d-none d-lg-flex">
                <div class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block font-heading">
                    <nav>
                        <ul>
                            <li>
                                <a class="active" href="{{ route('login') }}">Login</a>
                          </li>
                            <li>
                                <a class="active" href="{{ route('register') }}">Register</a>
                            </li>
                      </ul>
                    </nav>
                </div>
            </div>
            <div class="header-action-icon-2 d-block d-lg-none">
                <div class="burger-icon burger-icon-white">
                    <span class="burger-icon-top"></span>
                    <span class="burger-icon-mid"></span>
                    <span class="burger-icon-bottom"></span>
                </div>
            </div>
            <div class="header-action-right d-block d-lg-none">
                <div class="header-action-2">
                    <div class="header-action-icon-2">
                        <a href="shop-wishlist.html">
                            <img alt="Nest" src="assets/imgs/theme/icons/icon-heart.svg" />
                            <span class="pro-count white">4</span>
                        </a>
                    </div>
                    <div class="header-action-icon-2">
                        <a class="mini-cart-icon" href="#">
                            <img alt="Nest" src="assets/imgs/theme/icons/icon-cart.svg" />
                            <span class="pro-count white">2</span>
                        </a>
                        <div class="cart-dropdown-wrap cart-dropdown-hm2">
                            <ul>
                                <li>
                                    <div class="shopping-cart-img">
                                        <a href="shop-product-right.html"><img alt="Nest" src="assets/imgs/shop/thumbnail-3.jpg" /></a>
                                    </div>
                                    <div class="shopping-cart-title">
                                        <h4><a href="shop-product-right.html">Plain Striola Shirts</a></h4>
                                        <h3><span>1 × </span>$800.00</h3>
                                    </div>
                                    <div class="shopping-cart-delete">
                                        <a href="#"><i class="fi-rs-cross-small"></i></a>
                                    </div>
                                </li>
                                <li>
                                    <div class="shopping-cart-img">
                                        <a href="shop-product-right.html"><img alt="Nest" src="assets/imgs/shop/thumbnail-4.jpg" /></a>
                                    </div>
                                    <div class="shopping-cart-title">
                                        <h4><a href="shop-product-right.html">Macbook Pro 2022</a></h4>
                                        <h3><span>1 × </span>$3500.00</h3>
                                    </div>
                                    <div class="shopping-cart-delete">
                                        <a href="#"><i class="fi-rs-cross-small"></i></a>
                                    </div>
                                </li>
                            </ul>
                            <div class="shopping-cart-footer">
                                <div class="shopping-cart-total">
                                    <h4>Total <span>$383.00</span></h4>
                                </div>
                                <div class="shopping-cart-button">
                                    <a href="shop-cart.html">View cart</a>
                                    <a href="shop-checkout.html">Checkout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </div>
           </div>
     </div>
  </header>

 <main class="main">

     <section class="section-padding pb-5">
    <div class="container">
        <div class="section-title wow animate__animated animate__fadeIn">
            <h3 class=""> Top Selections & Discounts </h3>
        </div>
        <div class="row">
            <div class="col-lg-3 d-none d-lg-flex wow animate__animated animate__fadeIn">
                <div class="banner-img style-2">
                    <div class="banner-text">
                        <h2 class="mb-100">Bring nature into your home</h2>
                        <a href="shop-grid-right.html" class="btn btn-xs">Shop Now <i class="fi-rs-arrow-small-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-12 wow animate__animated animate__fadeIn" data-wow-delay=".4s">
                <div class="tab-content" id="myTabContent-1">
                    <div class="tab-pane fade show active" id="tab-one-1" role="tabpanel" aria-labelledby="tab-one-1">
                        <div class="carausel-4-columns-cover arrow-center position-relative">
                            <div class="slider-arrow slider-arrow-2 carausel-4-columns-arrow" id="carausel-4-columns-arrows"></div>
                            <div class="carausel-4-columns carausel-arrow-center" id="carausel-4-columns">
                                @php
                                    $subset = $products->slice(11, 12);
                                @endphp
                                @foreach($subset as $product)
                                    <div class="product-cart-wrap" style="min-width:260px;max-width:260px;min-height:420px;max-height:420px;display:inline-block;">
                                        <div class="product-img-action-wrap" style="height:220px;display:flex;align-items:center;justify-content:center;">
                                            <div class="product-img product-img-zoom" style="width:200px;height:200px;display:flex;align-items:center;justify-content:center;position:relative;">
                                                <a href="#">
                                                    <img class="default-img" src="{{ asset($product->image) }}" alt="{{ $product->name }}" style="max-width:100%;max-height:100%;object-fit:contain;" />
                                                </a>
                                            </div>
                                            <div class="product-action-1">
                                                <a aria-label="Quick view" class="action-btn small hover-up" href="#"><i class="fi-rs-eye"></i></a>
                                                <a aria-label="Add To Wishlist" class="action-btn small hover-up" href="#"><i class="fi-rs-heart"></i></a>
                                                <a aria-label="Compare" class="action-btn small hover-up" href="#"><i class="fi-rs-shuffle"></i></a>
                                            </div>
                                        </div>
                                        <div class="product-content-wrap" style="min-height:180px;">
                                            <div class="product-category">
                                                <a href="#">{{ $product->category->name ?? '' }}</a>
                                            </div>
                                            <h2 style="font-size:1.1rem;min-height:48px;"><a href="#">{{ $product->name }}</a></h2>
                                            <div class="product-price mt-10">
                                                <span>${{ $product->price }}</span>
                                            </div>
                                            <a href="#" class="btn w-100 hover-up"><i class="fi-rs-shopping-cart mr-5"></i>Add To Cart</a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!--End tab-pane-->
                </div>
                <!--End tab-content-->
            </div>
            <!--End Col-lg-9-->
        </div>
    </div>
</section>


  </main>
      <script src="assets/js/vendor/modernizr-3.6.0.min.js"></script>
    <script src="assets/js/vendor/jquery-3.6.0.min.js"></script>
    <script src="assets/js/vendor/jquery-migrate-3.3.0.min.js"></script>
    <script src="assets/js/vendor/bootstrap.bundle.min.js"></script>
    <script src="assets/js/plugins/slick.js"></script>
    <script src="assets/js/plugins/jquery.syotimer.min.js"></script>
    <script src="assets/js/plugins/waypoints.js"></script>
    <script src="assets/js/plugins/wow.js"></script>
    <script src="assets/js/plugins/perfect-scrollbar.js"></script>
    <script src="assets/js/plugins/magnific-popup.js"></script>
    <script src="assets/js/plugins/select2.min.js"></script>
    <script src="assets/js/plugins/counterup.js"></script>
    <script src="assets/js/plugins/jquery.countdown.min.js"></script>
    <script src="assets/js/plugins/images-loaded.js"></script>
    <script src="assets/js/plugins/isotope.js"></script>
    <script src="assets/js/plugins/scrollup.js"></script>
    <script src="assets/js/plugins/jquery.vticker-min.js"></script>
    <script src="assets/js/plugins/jquery.theia.sticky.js"></script>
    <script src="assets/js/plugins/jquery.elevatezoom.js"></script>
    <!-- Template  JS -->
    <script src="assets/js/main.js?v=5.3"></script>
    <script src="assets/js/shop.js?v=5.3"></script>
</body>
</html>