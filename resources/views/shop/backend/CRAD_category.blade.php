<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Category Management</title>

    <style>
        body {
            background-image: url('/assets/imgs/login.png');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            font-family: Arial, sans-serif;
            color: #333;
        }

        .container {
            max-width: 1200px;
            margin: 50px auto;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            display: flex;
            justify-content: space-between;
        }

        .category-column, .subcategory-column {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 20px;
            width: 48%;
            border-radius: 8px;
            min-height: 400px;
        }

        .category-item, .subcategory-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            margin-bottom: 10px;
            background-color: #f4f4f4;
            border-radius: 5px;
        }

        .category-item button, .subcategory-item button {
            background: none;
            border: none;
            color: #007bff;
            cursor: pointer;
            font-size: 16px;
        }

        .action-buttons {
            display: flex;
            gap: 5px;
        }

        .bottom-actions {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .bottom-actions a {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border-radius: 5px;
            text-decoration: none;
        }

        .bottom-actions a:hover {
            background-color: #0056b3;
        }

        /* Hide elements initially */
        .subcategory-column {
            display: none;
        }
    </style>

</head>
<body>
    <div class="container">
        <!-- الفئات الرئيسية -->
        <div class="category-column">
            @foreach ($categories as $category)
                <div class="category-item" data-category-id="{{ $category->id }}" onclick="toggleSubcategories('{{ $category->id }}')">
                    <span>{{ $category->name }}</span>
                    <div class="action-buttons">
                        <a href="{{ route('admin.categories.edit', $category->id) }}">Edit</a>
                        <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('هل أنت متأكد من حذف هذه الفئة؟')">Delete</button>
                        </form>
                    </div>
                </div>

            @endforeach
        </div>

        <!-- الفئات الفرعية -->
         
        <div class="subcategory-column" style="display:none;">
            <h4>Subcategories</h4>
            <div id="subcategories-list"></div>
        </div>
    </div>

    <div class="bottom-actions">
        <a href="{{ route('admin.categories.create') }}">Add Category</a>
        <a href="{{ route('admin.dashboard') }}">Back to dashboard</a>
        <a href="{{ route('admin.subcategories.create') }}" id="add-subcategory" style="display: none;">Add Subcategory</a>
    </div>

    <!-- ربط ملف الجافاسكربت -->
    <script src="{{ asset('assets/js/category-subcategory.js') }}"></script>


</body>




</html>