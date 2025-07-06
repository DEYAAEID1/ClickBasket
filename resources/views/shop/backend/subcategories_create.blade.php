<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subcategory Form</title>

    <style>
        body {
            background-image: url('{{ asset("/assets/imgs/login.png") }}');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
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

        .form-group input,
        .form-group textarea,
        .form-group select {
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
    @if(isset($subcategory) && $subcategory)
        Edit Subcategory: {{ $subcategory->name }}
    @else
        Add New Subcategory
    @endif
</h4>

<form action="@if(isset($subcategory) && $subcategory){{ route('admin.subcategories.update', $subcategory->id) }}@else{{ route('admin.subcategories.store') }}@endif" method="POST" enctype="multipart/form-data">
    @csrf
    @if(isset($subcategory) && $subcategory)
        @method('PUT')
    @endif

    <div class="form-group">
        <label for="category_id">Select Category:</label>
        <select name="category_id" id="category_id" required>
            <option value="">-- Select Category --</option>
            @foreach($categories as $cat)
                <option value="{{ $cat->id }}" {{ old('category_id', $subcategory->category_id ?? '') == $cat->id ? 'selected' : '' }}>
                    {{ $cat->name }}
                </option>
            @endforeach
        </select>
    </div>

    <!-- Name Field -->
    <div class="form-group">
        <label for="name">Subcategory Name:</label>
        <input type="text" name="name" id="name" value="{{ old('name', $subcategory->name ?? '') }}" required>
    </div>

    <!-- Description Field -->
    <div class="form-group">
        <label for="description">Description:</label>
        <textarea name="description" id="description" required>{{ old('description', $subcategory->description ?? '') }}</textarea>
    </div>

    <!-- Image Field -->
    <div class="form-group">
        <label for="image">Optional Image:</label>
        <input type="file" name="image" id="image">
    </div>

    <button type="submit">
        @if(isset($subcategory) && $subcategory)
            Update Subcategory
        @else
            Add Subcategory
        @endif
    </button>
</form>



        <div class="back-link">
            <a href="{{ route('admin.categories.index') }}">Back to Categories Page</a>
        </div>
    </div>

</body>
</html>
