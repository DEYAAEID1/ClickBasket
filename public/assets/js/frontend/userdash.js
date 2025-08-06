  $(document).ready(function() {
        $('#subcategory-select').on('change', function() {
            var subcategoryId = $(this).val();
            if (subcategoryId) {
                 $('#dashboard').hide();
                $.ajax({
                    url: '/products/by-subcategory/' + subcategoryId,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('#product-list').empty();
                         if(data.products && data.products.length > 0) {
                        $.each(data.products, function(key, value) {
                             var productCard = `
                                <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                                    <div class="product-cart-wrap mb-30 wow animate__animated animate__fadeIn" data-wow-delay=".1s">
                                        <div class="product-img-action-wrap">
                                            <div class="product-img product-img-zoom">
                                                <a href="shop-product-right.html">
                                                    <img class="default-img" src="${value.image}" alt="" />
                                                    <img class="hover-img" src="${value.image}" alt="" />
                                                </a>
                                            </div>
                                            <div class="product-action-1">
                                                <a aria-label="Add To Wishlist" class="action-btn" href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                                <a aria-label="Compare" class="action-btn" href="shop-compare.html"><i class="fi-rs-shuffle"></i></a>
                                                <a aria-label="Quick view" class="action-btn quick-view-btn" data-bs-toggle="modal" data-bs-target="#quickViewModal" data-product-id="${value.id}"><i class="fi-rs-eye"></i></a>
                                            </div>
                                            <div class="product-badges product-badges-position product-badges-mrg">
                                                <span class="hot">Hot</span>
                                            </div>
                                        </div>
                                        <div class="product-content-wrap">
                                            <div class="product-category">
                                                <a href="shop-grid-right.html">${value.subcategory.name}</a>
                                            </div>
                                            <h2><a href="shop-product-right.html">${value.name}</a></h2>
                                            <div class="product-rate-cover">
                                                <div class="product-rate d-inline-block">
                                                    <div class="product-rating" style="width: 90%"></div>
                                                </div>
                                                <span class="font-small ml-5 text-muted"> (4.0)</span>
                                            </div>
                                            <div>
                                                <span class="font-small text-muted">By <a href="vendor-details-1.html">NestFood</a></span>
                                            </div>
                                            <div class="product-card-bottom">
                                                <div class="product-price">
                                                    <span>${value.price}</span>
                                                    <span class="old-price">$32.8</span>
                                                </div>
                                                <div class="add-cart">
                                                    <a class="add" href="shop-cart.html"><i class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>`;
                            $('#product-list').append(productCard);
                        });
                    }
               
             else {
                        $('#product-list').append('<p>No products found for this subcategory.</p>');
            }
        }, error: function() {
                    $('#product-list').html('<p>There was an error fetching the products. Please try again later.</p>');
                }
            });
        }else{
 $('#product-list').empty();
            $('#dashboard-content').show();


        }
    });

    $(document).on('click', '.quick-view-btn', function() {
        var productId = $(this).data('product-id');
        $.ajax({
            url: '/products/' + productId,
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                var product = data.product;
                var slider = $('#quickViewModal .product-image-slider');
                var thumbnails = $('#quickViewModal .slider-nav-thumbnails');

                slider.empty();
                thumbnails.empty();

                slider.append('<figure class="border-radius-10"><img src="' + product.image + '" alt="product image" /></figure>');
                thumbnails.append('<div><img src="' + product.image + '" alt="product image" /></div>');

                if (product.gallery && product.gallery.length > 0) {
                    product.gallery.forEach(function(image) {
                        slider.append('<figure class="border-radius-10"><img src="' + image.image + '" alt="product image" /></figure>');
                        thumbnails.append('<div><img src="' + image.image + '" alt="product image" /></div>');
                    });
                }

                $('#quickViewModal .title-detail a').text(product.name);
                $('#quickViewModal .current-price').text(product.price);

                // Re-initialize slider
                $('.product-image-slider').slick('unslick');
                $('.slider-nav-thumbnails').slick('unslick');
                $('.product-image-slider').slick({
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    arrows: false,
                    fade: false,
                    asNavFor: '.slider-nav-thumbnails'
                });
                $('.slider-nav-thumbnails').slick({
                    slidesToShow: 4,
                    slidesToScroll: 1,
                    asNavFor: '.product-image-slider',
                    dots: false,
                    focusOnSelect: true,
                    prevArrow: '<button type="button" class="slick-prev"><i class="fi-rs-arrow-small-left"></i></button>',
                    nextArrow: '<button type="button" class="slick-next"><i class="fi-rs-arrow-small-right"></i></button>'
                });
            }
        });
    });
});