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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" />
    <link src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" />
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
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">First</th>
                                        <th scope="col">Last</th>
                                        <th scope="col">Handle</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>إ
                                        <th scope="row">1</th>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>@mdo</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>Jacob</td>
                                        <td>Thornton</td>
                                        <td>@fat</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td colspan="2">Larry the Bird</td>
                                        <td>@twitter</td>
                                    </tr>
                                </tbody>
                            </table>
                            <!-- الجزء الخاص باضافة منتج -->
                            <div id="addProductForm" style="display: none;">
                                <h3 class="mb-0">Add Product</h3>


                                <form id="add_product_form_element" method="POST" enctype="multipart/form-data">
                                    @csrf


                                    <div class="form-group">
                                        <label for="name">Product Name:</label>
                                        <input type="text" name="name" id="name" placeholder="Enter product name" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="add_category_id">Main Category:</label>
                                        <select name="category_id" id="add_category_id" class="form-control" required>
                                            <option value="">-- Select Category --</option>
                                            @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="add_subcategory_id">Subcategory:</label>
                                        <select name="subcategory_id" id="add_subcategory_id" class="form-control" required>
                                            <option value="">-- Select Main Category First --</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="description">Description:</label>
                                        <textarea name="description" id="description" placeholder="Enter product description"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="price">Price:</label>
                                        <input type="number" name="price" id="price" placeholder="Enter product price" step="any" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="cost_price">Cost Price:</label>
                                        <input type="number" name="cost_price" id="cost_price" placeholder="Enter product cost price" step="any">
                                    </div>

                                    <div class="form-group">
                                        <label for="stock_quantity">Stock Quantity:</label>
                                        <input type="number" name="stock_quantity" id="stock_quantity" placeholder="Enter product stock quantity" step="any" required>
                                    </div>


                                    <div class="form-group">
                                        <label for="image">Main Image:</label>
                                        <input type="file" name="image" id="image">
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
                                <div id="addResponseMessage"></div>
                            </div>
                            <!-- الجزء الخاص بتعديل منتج -->

                            <div id="EditproductForm" style="display: none;">
                                <h3 class="mb-0">Edit Product</h3>
                                <!-- Search form -->
                                <form id="searchProductForm">
                                    @csrf
                                    <div class="form-group">
                                        <label for="product_id">Search Product by ID:</label>
                                        <input type="number" name="product_id" id="product_id" placeholder="Enter Product ID" required>
                                        <button type="submit" id="searchProductBtn">Search</button>
                                    </div>
                                </form>


                                <!-- Edit Product Form -->
                                <form action="{{ isset($product) ? route('admin.products.update', $product->id) : '' }}" id="Editproduct" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')


                                    <div class="form-group">
                                        <label for="name">Product Name:</label>
                                        <input type="text" name="name" id="Edit_name" placeholder="Enter product name" value="{{ old('name', $product->name ?? '') }}" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="Edit_category_id">Main Category:</label>
                                        <select name="category_id" id="Edit_category_id" class="form-control" required>
                                            <option value="">-- Select Category --</option>
                                            @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="Edit_subcategory_id">Subcategory:</label>
                                        <select name="subcategory_id" id="Edit_subcategory_id" class="form-control" required>
                                            <option value="">-- Select Main Category First --</option>
                                        </select>
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
                                        <input type="file" name="image" id="Edit_image">
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
                                <div id="editResponseMessage"></div>

                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
        // في ملف: resources/views/shop/backend/admin.blade.php
        $("#Edit_category_id").change(function() {
            var categoryId = $(this).val(); // الحصول على ID الفئة المختارة
            // ...
            $.ajax({
                url: '/admin/categories/' + categoryId + '/subcategories', // إرسال الطلب لهذا المسار
                type: 'GET',
                success: function(data) {
                    // ... (هنا يتم ملء القائمة الثانية بالبيانات القادمة من الخادم)
                    var subcategorySelect = $("#Edit_subcategory_id");
                    subcategorySelect.empty(); // تفريغ القائمة القديمة
                    // إضافة الخيارات الجديدة
                    $.each(data.subcategories, function(key, value) {
                        subcategorySelect.append('<option value="' + value.id + '">' + value.name + '</option>');
                    });
                }
            });
        });

        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    // لتوصيل ال req من ال back  مع تشفير للبيانات 
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            // إخفاء الفورم بشكل افتراضي
            $("#addproductForm").hide();
            $("#EditproductForm").hide();
            var productId = null; // global id to use it in the defrent function
            // إرسال الطلب عند الضغط على Search
            $("#searchProductForm").submit(function(e) {
                e.preventDefault(); // منع الإرسال الافتراضي للـ form

                // الحصول على ID المنتج من الحقل
                var productIdInput = $("#product_id").val();

                // إرسال الطلب إلى السيرفر عبر AJAX
                $.ajax({
                    url: "{{ route('admin.products.search') }}", // الراوت الذي سيستقبل الطلب
                    type: "GET",
                    data: {
                        product_id: productIdInput
                    },
                    success: function(response) {
                        if (response.product) {
                            var product = response.product;
                            // تعبئة البيانات في الـ form
                            $("#Edit_name").val(product.name);
                            $("#Edit_description").val(product.description);
                            $("#Edit_price").val(product.price);
                            $("#Edit_cost_price").val(product.cost_price);
                            $("#Edit_stock_quantity").val(product.stock_quantity);
                            $("#Edit_is_active").prop('checked', product.is_active);

                            productId = product.id; // save id in a global productId

                            // تعيين الفئة الرئيسية وجلب الفئات الفرعية
                            var categoryId = product.category_id;
                            $("#Edit_category_id").val(categoryId);

                            // جلب الفئات الفرعية وتحديد الفئة الفرعية للمنتج
                            if (categoryId) {
                                $.ajax({
                                    url: '/admin/categories/' + categoryId + '/subcategories',
                                    type: 'GET',
                                    success: function(data) {
                                        var subcategorySelect = $("#Edit_subcategory_id");
                                        subcategorySelect.empty();
                                        subcategorySelect.append('<option value="">Select Subcategory</option>');
                                        $.each(data.subcategories, function(key, value) {
                                            subcategorySelect.append('<option value="' + value.id + '">' + value.name + '</option>');
                                        });
                                        // تحديد الفئة الفرعية الحالية للمنتج
                                        subcategorySelect.val(product.subcategory_id);
                                    }
                                });
                            } else {
                                $("#Edit_subcategory_id").empty().append('<option value="">Select Main Category First</option>');
                            }

                            // تحديث الرابط باستخدام الـ productIdInput الذي تم العثور عليه
                            var updateUrl = "{{ route('admin.products.update', ':id') }}";
                            updateUrl = updateUrl.replace(':id', product.id); // استخدام الـ id من الـ response

                            console.log("Updated URL:", updateUrl); // تحقق من الـ URL المحدث

                            // إخفاء أو عرض الفورم بشكل مناسب
                            $("#EditproductForm").show();
                        } else {
                            // في حال لم يتم العثور على المنتج
                            $("#editResponseMessage").html("<p style='color:red;'>Product not found!</p>");
                        }
                    },

                    error: function(xhr) {
                        $("#editResponseMessage").html("<p style='color:red;'>Error searching for product. Please try again.</p>");
                    }
                });
            });

            // جلب الفئات الفرعية عند تغيير الفئة الرئيسية
            $("#Edit_category_id").change(function() {
                var categoryId = $(this).val();
                var subcategorySelect = $("#Edit_subcategory_id");

                subcategorySelect.html('<option value="">Loading...</option>');

                if (!categoryId) {
                    subcategorySelect.html('<option value="">Select Main Category First</option>');
                    return;
                }

                $.ajax({
                    url: '/admin/categories/' + categoryId + '/subcategories', // تأكد من أن هذا المسار صحيح
                    type: 'GET',
                    success: function(data) {
                        subcategorySelect.empty();
                        subcategorySelect.append('<option value="">Select Subcategory</option>');
                        $.each(data.subcategories, function(key, value) {
                            subcategorySelect.append('<option value="' + value.id + '">' + value.name + '</option>');
                        });
                    },
                    error: function() {
                        subcategorySelect.html('<option value="">Could not load subcategories</option>');
                    }
                });
            });

            // جلب الفئات الفرعية عند تغيير الفئة الرئيسية في فورم الإضافة
            $("#add_category_id").change(function() {
                var categoryId = $(this).val();
                var subcategorySelect = $("#add_subcategory_id");

                subcategorySelect.html('<option value="">Loading...</option>');

                if (!categoryId) {
                    subcategorySelect.html('<option value="">Select Main Category First</option>');
                    return;
                }

                $.ajax({
                    url: '/admin/categories/' + categoryId + '/subcategories', // تأكد من أن هذا المسار صحيح
                    type: 'GET',
                    success: function(data) {
                        subcategorySelect.empty();
                        subcategorySelect.append('<option value="">Select Subcategory</option>');
                        $.each(data.subcategories, function(key, value) {
                            subcategorySelect.append('<option value="' + value.id + '">' + value.name + '</option>');
                        });
                    },
                    error: function() {
                        subcategorySelect.html('<option value="">Could not load subcategories</option>');
                    }
                });
            });




            // إظهار الفورم عند الضغط على زر Add Product
            $("#EditshowFormBtn").click(function() {

                $("#EditproductForm").toggle();
            });

            $("#showFormBtn").click(function() {
                $("#addProductForm").toggle();

            });

            // إرسال فورم الإضافة باستخدام AJAX
            $("#add_product_form_element").submit(function(e) {
                e.preventDefault();
                var formData = new FormData(this);

                $.ajax({
                    url: "{{ route('admin.products.store') }}",
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        // إخفاء الفورم
                        $("#add_product_form_element").hide();

                        // عرض رسالة النجاح
                        $("#addResponseMessage")
                            .html("<p style='color: green; text-align: center; font-size: 1.2em;'>Product added successfully!</p>")
                            .show();

                        // بعد 10 ثوانٍ، إخفاء الحاوية بالكامل وإعادة تهيئتها
                        setTimeout(function() {
                            $("#addProductForm").hide(); // إخفاء الحاوية بالكامل
                            $("#add_product_form_element")[0].reset(); // إعادة تعيين الفورم
                            $("#add_subcategory_id").empty().append('<option value="">-- Select Main Category First --</option>');
                            $("#addResponseMessage").empty().hide(); // إفراغ وإخفاء الرسالة
                            $("#add_product_form_element").show(); // إعادة إظهار الفورم داخل الحاوية المخفية
                        }, 10000); // 10000 ميلي ثانية = 10 ثوانٍ
                    },
                    error: function(xhr) {
                        var errors = xhr.responseJSON.errors;
                        var errorHtml = '<ul style="color:red; list-style-type: none; padding: 0;">';
                        $.each(errors, function(key, value) {
                            errorHtml += '<li>' + value[0] + '</li>';
                        });
                        errorHtml += '</ul>';
                        $("#addResponseMessage").html(errorHtml).show();
                    }
                });
            });

            // إرسال فورم التعديل باستخدام AJAX
            $("#Editproduct").submit(function(e) {
                e.preventDefault(); // منع إعادة تحميل الصفحة

                var formElement = $("#Editproduct")[0];
                if (formElement && formElement.tagName === "FORM") {
                    // الحصول على البيانات من الفورم
                    var formData = new FormData($("#Editproduct")[0]); // استخدام المرجع الصحيح للنموذج

                    // التحقق من محتويات FormData
                    for (var pair of formData.entries()) {
                        console.log(pair[0] + ': ' + pair[1]); // عرض الحقول المرسلة
                    }

                    // التأكد من أن الحقل "name" ليس فارغًا
                    var name = $("#Edit_name").val();
                    if (!name) {
                        alert("Product name cannot be empty.");
                        return; // إيقاف الإرسال إذا كان الحقل فارغًا
                    }

                    // التأكد من أن productId تم تخزينه في متغير global
                    if (productId === null) {
                        console.error("Product ID is not set properly.");
                        $("#editResponseMessage").html("<p>Error: Product ID is missing.</p>").css("color", "red");
                        return;
                    }

                    // إنشاء الرابط باستخدام productId الذي تم تخزينه
                    var updateUrl = "{{ route('admin.products.update', ':id') }}";
                    updateUrl = updateUrl.replace(':id', productId); // استخدام الـ ID المخزن

                    console.log("Updated URL:", updateUrl); // تحقق من الـ URL المحدث

                    // إرسال البيانات باستخدام AJAX
                    $.ajax({
                        url: updateUrl, // استخدم الرابط المعدل
                        type: "POST", //  <-- التعديل هنا
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            console.log(response);

                            // 1. إخفاء نماذج البحث والتعديل لإفساح المجال للرسالة
                            $("#searchProductForm, #Editproduct").hide();

                            // 2. عرض رسالة النجاح مكان الفورم
                            $("#editResponseMessage")
                                .html("<p style='color: green; text-align: center; font-size: 1.2em;'>Product updated successfully!</p>")
                                .show();

                            // 3. بعد 10 ثوانٍ، إخفاء الحاوية بالكامل وإعادة تهيئتها للاستخدام التالي
                            setTimeout(function() {
                                $("#EditproductForm").hide(); // إخفاء الحاوية بالكامل كما طلبت
                                $("#Editproduct")[0].reset(); // إعادة تعيين حقول الفورم
                                $("#searchProductForm")[0].reset(); // إعادة تعيين حقول البحث
                                $("#editResponseMessage").empty().hide(); // إفراغ وإخفاء الرسالة
                                $("#searchProductForm, #Editproduct").show(); // إعادة إظهار النماذج داخل الحاوية المخفية استعداداً للنقرة التالية
                            }, 10000); // 10000 ميلي ثانية = 10 ثوانٍ
                        },
                        error: function(xhr, status, error) {
                            console.log("Error status:", status);
                            console.log("Error:", error);
                            console.log("Response:", xhr.responseText); // عرض الاستجابة كاملة من السيرفر
                            $("#editResponseMessage").html("<p>Error updating product. Please try again.</p>").css("color", "red");
                        }
                    });
                } else {
                    console.error("The element is not a valid form. Element details:", formElement);
                    $("#editResponseMessage").html("<p>Error: The form element is invalid.</p>").css("color", "red");
                }
            });





        });
    </script>
</body>

</html>