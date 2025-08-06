
      <header class="header-area header-style-1 header-height-2">
          <div class="mobile-promotion">
              <span>Grand opening, <strong>up to 15%</strong> off all items. Only <strong>3 days</strong> left</span>
          </div>
          <div class="header-top header-top-ptb-1 d-none d-lg-block">
              <div class="container">
                  <div class="row align-items-center">
                      <div class="col-xl-3 col-lg-4">
                          <div class="header-info">
                              <ul>

                                  <li><a href="page-account.html">My Cart</a></li>
                                  <li><a href="shop-wishlist.html">Checkout</a></li>
                              </ul>
                          </div>
                      </div>
                      <div class="col-xl-6 col-lg-4">
                          <div class="text-center">
                              <div id="news-flash" class="d-inline-block">
                                  <ul>
                                      <li>100% Secure delivery without contacting the courier</li>
                                      <li>Supper Value Deals - Save more with coupons</li>
                                      <li>Trendy 25silver jewelry, save up 35% off today</li>
                                  </ul>
                              </div>
                          </div>
                      </div>
                      <div class="col-xl-3 col-lg-4">
                          <div class="header-info header-info-right">
                              <ul>

                                  <li>
                                      <a class="language-dropdown-active" href="#">English <i class="fi-rs-angle-small-down"></i></a>
                                      <ul class="language-dropdown">
                                          <li>
                                              <a href="#"><img src="{{ asset('assets/imgs/theme/flag-fr.png') }}" alt="" />Français</a>
                                          </li>
                                          <li>
                                              <a href="#"><img src="{{ asset('assets/imgs/theme/flag-dt.png') }}" alt="" />Deutsch</a>
                                          </li>
                                          <li>
                                              <a href="#"><img src="{{ asset('assets/imgs/theme/flag-ru.png') }}" alt="" />Pусский</a>
                                          </li>
                                      </ul>

                                  </li>

                                  <li>Need help? Call Us: <strong class="text-brand"> + 1800 900</strong></li>

                              </ul>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
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
                  <div class="header-wrap header-space-between position-relative">
                      <div class="logo logo-width-1 d-block d-lg-none">
                          <a href="{{ route('landing') }}"><img src="assets/imgs/logow.png" alt="logo" /></a>
                      </div>
                  </div>
              </div>
          </div>
      </header>
      <div class="mobile-header-active mobile-header-wrapper-style">
          <div class="mobile-header-wrapper-inner">
              <div class="mobile-header-top">
                  <div class="mobile-header-logo">
                      <a href="{{ route('landing') }}"><img src="{{ asset('assets/imgs/logow.png') }}" alt="logo" /></a>
                  </div>
                  <div class="mobile-menu-close close-style-wrap close-style-position-inherit">
                      <button class="close-style search-close">
                          <i class="icon-top"></i>
                          <i class="icon-bottom"></i>
                      </button>
                  </div>
              </div>
              <div class="mobile-header-content-area">
                  <div class="mobile-search search-style-3 mobile-header-border">
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
                  <div class="site-copyright">Copyright 2022 © Nest. All rights reserved. Powered by AliThemes.</div>
              </div>
          </div>
      </div>