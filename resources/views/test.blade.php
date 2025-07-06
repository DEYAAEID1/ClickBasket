<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Product</title>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <h3>Add New Product</h3>

    <!-- زر لإظهار الفورم -->
    <button id="showFormBtn">Add Product</button>

    <!-- الفورم (مخفي بشكل افتراضي) -->
    <div id="productForm" style="display: none;">
        <form action="{{ route('admin.products.edit_delete') }}" method="POST">
            @csrf
            <input type="text" name="product_id" placeholder="Enter Product ID" required>
            <button type="submit">Edit/Delete Product</button>
        </form>

        <form id="addProductForm" method="POST" enctype="multipart/form-data">
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
                <label for="subcategory_id">Select Subcategory:</label>
                <select name="subcategory_id" id="subcategory_id" required>
                    <option value="">-- Select Subcategory --</option>
                    @foreach($subcategories as $subcategory)
                    <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                    @endforeach
                </select>
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

    <script>
        // إظهار الفورم عند الضغط على زر Add Product
        $("#showFormBtn").click(function() {
            $("#productForm").toggle(); // إظهار أو إخفاء الفورم
        });

        // إرسال الفورم باستخدام AJAX
        $("#addProductForm").submit(function(e) {
            e.preventDefault(); // منع إعادة تحميل الصفحة

            // الحصول على البيانات من الفورم
            var formData = new FormData(this);

            // إرسال البيانات باستخدام AJAX
            $.ajax({
                url: "{{ route('admin.products.store') }}", // الراوت الذي سيتم إرسال البيانات إليه
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    // عرض رسالة النجاح أو الفشل
                    $("#responseMessage").html("<p>Product added successfully!</p>").css("color", "green");

                    // إخفاء الفورم بعد النجاح
                    $("#productForm").hide();
                },
                error: function(xhr) {
                    // عرض رسالة الخطأ
                    $("#responseMessage").html("<p>Error adding product. Please try again.</p>").css("color", "red");
                }
            });
        });
    </script>
</body>

</html>