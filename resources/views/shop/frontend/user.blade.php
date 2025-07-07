<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8" />
    <title>ClickBasket </title>
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
                                <select class="select-active" id="subcategory-select">
                                    <option value="">Select a Subcategory</option>
                                    @if(isset($categories))
                                    @foreach($categories as $category)
                                    <optgroup label="{{ $category->name }}">
                                        @foreach($category->subcategories as $subcategory)
                                        <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                                        @endforeach
                                    </optgroup>
                                    @endforeach
                                    @endif
                                </select>
                                <input type="text" placeholder="Search for items..." />
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="header-bottom header-bottom-bg-color sticky-bar">
            <div class="container">
                <div class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block font-heading">
                    <nav>
                        <ul>
                            <li>
                                <a class="active" href="user.dashboard">Shop </a>
                            </li>
                            <li>
                                <a class="active" href="shop.backend.cart">Cart </a>
                            </li>
                            <li>
                                <a href="#">Account <i class="fi-rs-angle-down"></i></a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="{{ route('profile.edit') }}" class="dropdown-item">
                                            Edit My Account
                                        </a>
                                    </li>
                                    <li>
                                        <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                                            @csrf
                                            <button type="submit" class="dropdown-item">Logout</button>
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>

    <main class="main pages" style="padding-top: 30px;">
        <div class="page-content pb-150">
            <div class="container">
                <div class="tab-content account dashboard-content pl-50">
                    <div class="tab-pane fade active show" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                        <div class="card">
                            <div class="card-header">
                                <div id="User_Name" class="text-center">
                                    <h3 class="mb-0">Welcome {{ auth()->user()->name }}</h3>
                                </div>
                            </div>
                            <div class="card-body">
                                <div id="product-container" class="row">
                                    <!-- Products will be loaded here via AJAX -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Core Vendor JS-->
    <script src="{{ asset('assets/js/vendor/modernizr-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/jquery-migrate-3.3.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/bootstrap.bundle.min.js') }}"></script>
    <!-- Sticky Header Plugin -->
    <script src="{{ asset('assets/js/plugins/jquery.theia.sticky.js') }}"></script>
    <!-- Template  JS -->
    <script src="{{ asset('assets/js/main.js?v=5.3') }}"></script>
    <script src="{{ asset('assets/js/shop.js?v=5.3') }}"></script>

    <script>
        $(document).ready(function() {
            var productContainer = $('#product-container');
            var UserName = $('#User_Name');

            // Hide container on page load
            productContainer.hide();

            // Setup AJAX to include CSRF token
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#subcategory-select').on('change', function() {
                var subcategoryId = $(this).val();

                if (subcategoryId) {
                    UserName.hide();
                    // Show loading state
                    productContainer.show();


                    // AJAX request to get products
                    $.ajax({
                        url: '/products/by-subcategory/' + subcategoryId,
                        type: 'GET',
                        success: function(response) {
                            productContainer.empty(); // Clear previous products or loading message

                            if (response.products && response.products.length > 0) {
                                $.each(response.products, function(index, product) {
                                    var productHtml = `
                                    <div class="col-lg-3 col-md-4 mb-4">
                                        <div class="product-cart-wrap">
                                            <div class="product-img-action-wrap" style="height: 220px; display: flex; align-items: center; justify-content: center;">
                                                <div class="product-img product-img-zoom" style="width: 200px; height: 200px; display: flex; align-items: center; justify-content: center;">
                                                    <a href="#">
                                                        <img class="default-img" src="/storage/${product.image}" alt="${product.name}" style="max-width: 100%; max-height: 100%; object-fit: contain;">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product-content-wrap">
                                                <div class="product-category">
                                                    <a href="#">${product.category ? product.category.name : 'Uncategorized'}</a>
                                                </div>
                                                <h2><a href="#">${product.name}</a></h2>
                                                <div class="product-price mt-10">
                                                    <span>$${product.price}</span>
                                                </div>

                                                <form action="{{ route('cart.add') }}" method="POST">
                @csrf
                <input type="hidden" name="product_id" value="${product.id}">
                <input type="hidden" name="quantity" value="1">
                <button type="submit" class="btn w-100 hover-up mt-10"><i class="fi-rs-shopping-cart mr-5"></i>Add To Cart</button>
            </form>
                                            </div>
                                        </div>
                                    </div>
                                `;
                                    productContainer.append(productHtml);
                                });
                            } else {
                                productContainer.html('<p class="text-center">No products found in this subcategory.</p>');
                            }
                        },
                        error: function(xhr) {
                            var errorMessage = 'An error occurred while fetching products.';
                            // Try to get a more specific error message from the server response
                            if (xhr.responseJSON && xhr.responseJSON.message) {
                                errorMessage = xhr.responseJSON.message;
                            }
                            console.error(xhr);
                            productContainer.html('<p class="text-center text-danger">' + errorMessage + '</p>');
                        }
                    });
                } else {
                    // Clear and hide if no subcategory is selected
                    productContainer.empty().hide();
                    UserName.show();
                }
            });
        });
    </script>
</body>

</html>