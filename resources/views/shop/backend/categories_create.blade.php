<!-- resources/views/backend/admin/categories/edit-category.blade.php -->

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تعديل الفئة الرئيسية</title>

    <style>
        body {
            background-image: url('/assets/imgs/login.png');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            font-family: Arial, sans-serif;
        }
        
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 30px;
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 8px;
        }

        .form-title {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 10px;
        }

        .form-group input, .form-group textarea, .form-group select {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ddd;
        }

        .form-group button {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border-radius: 5px;
            border: none;
            cursor: pointer;
        }

        .form-group button:hover {
            background-color: #0056b3;
        }

        .back-link {
            display: block;
            margin-top: 20px;
            text-align: center;
        }
    </style>

</head>
<body>

    <div class="container">
        <h4 class="form-title">
            @if(isset($category) && $category)
                Edit Category: {{ $category->name }}
            @else
                Add New Category
            @endif
        </h4>

        <form action="@if(isset($category) && $category){{ route('admin.categories.update', $category->id) }}@else{{ route('admin.categories.store') }}@endif" method="POST" enctype="multipart/form-data">
            @csrf
            @if(isset($category) && $category)
                @method('PUT')
            @endif

            <div class="form-group">
                <label for="name">Category Name:</label>
                <input type="text" name="name" id="name" value="{{ $category->name ?? old('name') }}" required>
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <textarea name="description" id="description">{{ $category->description ?? old('description') }}</textarea>
            </div>

            <div class="form-group">
                <label for="image">Image (optional):</label>
                <input type="file" name="image" id="image">
            </div>

           

            <div class="form-group">
                <button type="submit">
                    @if(isset($category) && $category)
                        Update Category
                    @else
                        Add Category
                    @endif
                </button>
            </div>
        </form>

        <div class="back-link">
            <a href="{{ route('admin.categories.index') }}">Back to Categories Page</a>
        </div>
    </div>

    <script>
        // You can add custom JavaScript here if needed
    </script>

</body>


</html>
