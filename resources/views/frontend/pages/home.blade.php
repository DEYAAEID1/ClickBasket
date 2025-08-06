@extends('frontend.layout.master')

@section('content')

<div class="page-header breadcrumb-wrap">
    <div class="container">
        <div class="header-bottom header-bottom-bg-color sticky-bar">
            <div class="container">
                <div class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block font-heading">
                    <nav>
                        <ul>
                            <li>
                                <a class="active" href="{{route('user.dashboard')}}">Shop </a>
                                @csrf
                            </li>
                            <li>
                                <a class="active" href="backend.cart">Cart </a>
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
    </div>
</div>
<div class="page-content pt-150 pb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 m-auto">
                <div class="row">
                    <div class="col-md-3">

                    </div>
                    <div class="tab-content account dashboard-content pl-50">
                        <div id="product-list" class="row">
                        </div>
                        <div class="tab-pane fade active show" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="mb-0">Welcome {{ auth()->user()->name }}</h3>

                                </div>
                                <div class="card-body">
                                    <p>
                                        From your account dashboard. you can easily check &amp; view your <a href="#">recent orders</a>,<br />
                                        manage your <a href="#">shipping and billing addresses</a> and <a href="#">edit your password and account details.</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="{{ asset('assets\js\frontend\userdash.js')}}"></script>
@endpush

<div class="modal fade custom-modal" id="quickViewModal" tabindex="-1" aria-labelledby="quickViewModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6 col-sm-12 col-xs-12 mb-md-0 mb-sm-5">
                        <div class="detail-gallery">
                            <span class="zoom-icon"><i class="fi-rs-search"></i></span>
                            <!-- MAIN SLIDES -->
                            <div class="product-image-slider">
                                <figure class="border-radius-10">
                                    <img src="assets/imgs/shop/product-16-2.jpg" alt="product image" />
                                </figure>
                                <figure class="border-radius-10">
                                    <img src="assets/imgs/shop/product-16-1.jpg" alt="product image" />
                                </figure>
                                <figure class="border-radius-10">
                                    <img src="assets/imgs/shop/product-16-3.jpg" alt="product image" />
                                </figure>
                                <figure class="border-radius-10">
                                    <img src="assets/imgs/shop/product-16-4.jpg" alt="product image" />
                                </figure>
                                <figure class="border-radius-10">
                                    <img src="assets/imgs/shop/product-16-5.jpg" alt="product image" />
                                </figure>
                                <figure class="border-radius-10">
                                    <img src="assets/imgs/shop/product-16-6.jpg" alt="product image" />
                                </figure>
                                <figure class="border-radius-10">
                                    <img src="assets/imgs/shop/product-16-7.jpg" alt="product image" />
                                </figure>
                            </div>
                            <!-- THUMBNAILS -->
                            <div class="slider-nav-thumbnails">
                                <div><img src="assets/imgs/shop/thumbnail-3.jpg" alt="product image" /></div>
                                <div><img src="assets/imgs/shop/thumbnail-4.jpg" alt="product image" /></div>
                                <div><img src="assets/imgs/shop/thumbnail-5.jpg" alt="product image" /></div>
                                <div><img src="assets/imgs/shop/thumbnail-6.jpg" alt="product image" /></div>
                                <div><img src="assets/imgs/shop/thumbnail-7.jpg" alt="product image" /></div>
                                <div><img src="assets/imgs/shop/thumbnail-8.jpg" alt="product image" /></div>
                                <div><img src="assets/imgs/shop/thumbnail-9.jpg" alt="product image" /></div>
                            </div>
                        </div>
                        <!-- End Gallery -->
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="detail-info pr-30 pl-30">
                            <span class="stock-status out-stock"> Sale Off </span>
                            <h3 class="title-detail"><a href="shop-product-right.html" class="text-heading">Seeds of Change Organic Quinoa, Brown</a></h3>
                            <div class="product-detail-rating">
                                <div class="product-rate-cover text-end">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 90%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (32 reviews)</span>
                                </div>
                            </div>
                            <div class="clearfix product-price-cover">
                                <div class="product-price primary-color float-left">
                                    <span class="current-price text-brand">$38</span>
                                    <span>
                                        <span class="save-price font-md color3 ml-15">26% Off</span>
                                        <span class="old-price font-md ml-15">$52</span>
                                    </span>
                                </div>
                            </div>
                            <div class="detail-extralink mb-30">
                                <div class="detail-qty border radius">
                                    <a href="#" class="qty-down"><i class="fi-rs-angle-small-down"></i></a>
                                    <input type="text" name="quantity" class="qty-val" value="1" min="1">
                                    <a href="#" class="qty-up"><i class="fi-rs-angle-small-up"></i></a>
                                </div>
                                <div class="product-extra-link2">
                                    <button type="submit" class="button button-add-to-cart"><i class="fi-rs-shopping-cart"></i>Add to cart</button>
                                </div>
                            </div>
                            <div class="font-xs">
                                <ul>
                                    <li class="mb-5">Vendor: <span class="text-brand">Nest</span></li>
                                    <li class="mb-5">MFG:<span class="text-brand"> Jun 4.2022</span></li>
                                </ul>
                            </div>
                        </div>
                        <!-- Detail Info -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>