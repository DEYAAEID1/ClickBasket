<!-- resources/views/products/import.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Import Products</title>
</head>
<body>

    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <h2>Import Products from Excel</h2>

    <form action="{{ route('products.import') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="file" required>
        <br><br>
        <button type="submit">Import</button>
    </form>

</body>
</html>
