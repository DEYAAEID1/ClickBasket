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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
                        <div class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block font-heading">
                            <nav>
                                <ul>
                                    <li><a href="{{ route('admin.categories.index') }}">Manage Categories </a></li>
                                    <li>
                                        <a href="#"> Manage Products <i class="fi-rs-angle-down"></i></a>
                                        <ul class="sub-menu">
                                            <li><a href="#" id="showFormBtn">Add Products</a></li>
                                            <li><a href="#" id="EditshowFormBtn">Edit Products</a></li>
                                        </ul>
                                    </li>

                                    <li>
                                        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log Out</a>
                                    </li>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </ul>


                            </nav>

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

                            <!-- الجزء الخاص باضافة منتج -->
                            <div id="addProductForm" style="display: none;">
                                <h3 class="mb-0">Add Product</h3>


                                <form action="{{ route('admin.products.create') }}" id="addProductForm" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    

                                    <div class="form-group">
                                        <label for="name">Product Name:</label>
                                        <input type="text" name="name" id="name" placeholder="Enter product name" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="description">Description:</label>
                                        <textarea name="description" id="description" placeholder="Enter product description"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="price">Price:</label>
                                        <input type="number" name="price" id="price" placeholder="Enter product price" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="cost_price">Cost Price:</label>
                                        <input type="number" name="cost_price" id="cost_price" placeholder="Enter product cost price">
                                    </div>

                                    <div class="form-group">
                                        <label for="stock_quantity">Stock Quantity:</label>
                                        <input type="number" name="stock_quantity" id="stock_quantity" placeholder="Enter product stock quantity" required>
                                    </div>


                                    <div class="form-group">
                                        <label for="image">Main Image:</label>
                                        <input type="file" name="image" id="image" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="gallery">Gallery Images (optional):</label>
                                        <input type="file" name="gallery[]" id="gallery" multiple>
                                    </div>

                                    <div class="form-group">
                                        <label for="is_active">Is Active:</label>
                                        <input type="checkbox" name="is_active" id="is_active">
                                    </div>

                                    <button type="submit">Add Product</button>
                                </form>

                                <!-- مكان عرض الرسائل -->
                                <div id="responseMessage"></div>
                            </div>
                            <!-- الجزء الخاص بتعديل منتج -->

                            <div id="EditproductForm" style="display: none;">
                                <h3 class="mb-0">Edit Product</h3>
                                <!-- Search form -->
                                <form id="searchProductForm">
                                    <div class="form-group">
                                        <label for="product_id">Search Product by ID:</label>
                                        <input type="number" name="product_id" id="product_id" placeholder="Enter Product ID" required>
                                        <button type="submit" id="searchProductBtn">Search</button>
                                    </div>
                                </form>

                                <!-- Edit Product Form -->
                                <form action="{{ route('admin.products.update') }}" id="EditproductForm" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    

                                    <div class="form-group">
                                        <label for="name">Product Name:</label>
                                        <input type="text" name="name" id="Edit_name" placeholder="Enter product name" value="{{ old('name', $product->name ?? '') }}" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="description">Description:</label>
                                        <textarea name="description" id="Edit_description" placeholder="Enter product description" step="any">{{ old('description', $product->description ?? '') }}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="price">Price:</label>
                                        <input type="number" name="price" id="Edit_price" placeholder="Enter product price" step="any" value="{{ old('price', $product->price ?? '') }}" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="cost_price">Cost Price:</label>
                                        <input type="number" name="cost_price" id="Edit_cost_price" placeholder="Enter product cost price" step="any" value="{{ old('cost_price', $product->cost_price ?? '') }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="stock_quantity">Stock Quantity:</label>
                                        <input type="number" name="stock_quantity" id="Edit_stock_quantity" placeholder="Enter product stock quantity" step="any" value="{{ old('stock_quantity', $product->stock_quantity ?? '') }}" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="image">Main Image:</label>
                                        <input type="file" name="image" id="Edit_image" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="gallery">Gallery Images (optional):</label>
                                        <input type="file" name="gallery[]" id="Edit_gallery" multiple>
                                    </div>

                                    <div class="form-group">
                                        <label for="is_active">Is Active:</label>
                                        <input type="checkbox" name="is_active" id="Edit_is_active" {{ old('is_active', $product->is_active ?? false) ? 'checked' : '' }}>
                                    </div>
                                  
                                    <button type="submit">Edit Product</button>
                                </form>


                                <!-- مكان عرض الرسائل -->
                                <div id="responseMessage"></div>

                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
        $(document).ready(function() {
            // إخفاء الفورم بشكل افتراضي
            $("#addproductForm").hide();
            $("#EditproductForm").hide();
            // إرسال الطلب عند الضغط على Search
            $("#searchProductForm").submit(function(e) {
                e.preventDefault(); // منع الإرسال الافتراضي للـ form

                // الحصول على ID المنتج من الحقل
                var productId = $("#product_id").val();

                // إرسال الطلب إلى السيرفر عبر AJAX
                $.ajax({
                    url: "{{ route('admin.products.search') }}", // الراوت الذي سيستقبل الطلب
                    type: "GET",
                    data: {
                        product_id: productId
                    },
                    success: function(response) {
                        if (response.product) {
                            // تعبئة البيانات في الـ form
                            
                            $("#Edit_name").val(response.product.name);
                            $("#Edit_description").val(response.product.description);
                            $("#Edit_price").val(response.product.price);
                            $("#Edit_cost_price").val(response.product.cost_price);
                            $("#Edit_stock_quantity").val(response.product.stock_quantity);
                            $("#Edit_image").val(response.product.image);
                            $("#Edit_gallery").val(response.product.gallery);
                            $("#Edit_is_active").val(response.product.is_active);
                            

                            // يمكنك إضافة الحقول الأخرى هنا
                        } else {
                            // في حال لم يتم العثور على المنتج
                            $("#responseMessage").html("<p style='color:red;'>Product not found!</p>");
                        }
                    },
                    error: function(xhr) {
                        $("#responseMessage").html("<p style='color:red;'>Error searching for product. Please try again.</p>");
                    }
                });
            });



            // إظهار الفورم عند الضغط على زر Add Product
            $("#EditshowFormBtn").click(function() {

                $("#EditproductForm").toggle();
            });
            $("#addProductForm").submit(function(e) {
                e.preventDefault(); // Prevent the form from refreshing the page

                // Get form data
                var formData = new FormData(this);

                // Send the data using AJAX
                $.ajax({
                    url: "{{ route('admin.products.store') }}", // Add your correct route here
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        $("#responseMessage").html("<p>Product added successfully!</p>").css("color", "green");
                        $("#productForm").hide();
                    },
                    error: function(xhr) {
                        $("#responseMessage").html("<p>Error adding product. Please try again.</p>").css("color", "red");
                    }
                });
            });
            $("#showFormBtn").click(function() {
                $("#addProductForm").toggle();

            });

            // إرسال الفورم باستخدام AJAX
            $("#addProductForm").submit(function(e) {
                e.preventDefault(); // منع إعادة تحميل الصفحة

                // الحصول على البيانات من الفورم
                var formData = new FormData(this);

                // إرسال البيانات باستخدام AJAX
                $.ajax({
                    url: "{{ route('admin.products.store') }}",
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        console.log(response); // قم بمراجعة الرد هنا
                        $("#responseMessage").html("<p>Product added successfully!</p>").css("color", "green");
                        $("#productForm").hide();
                    },
                    error: function(xhr, status, error) {
                        console.log("Error status:", status);
                        console.log("Error:", error);
                        console.log("Response:", xhr.responseText); // عرض الاستجابة كاملة من السيرفر
                        $("#responseMessage").html("<p>Error adding product. Please try again.</p>").css("color", "red");
                    }
                });

            });
        });
    </script>
</body>

</html>