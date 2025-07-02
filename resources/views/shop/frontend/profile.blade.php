<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        body {
            background: url('{{ asset('assets/imgs/login.png') }}') no-repeat center center fixed;
            background-size: cover;
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .profile-container {
            background: rgba(255, 255, 255, 0.95);
            padding: 2.5rem 2rem;
            border-radius: 12px;
            box-shadow: 0 4px 24px rgba(0,0,0,0.10);
            width: 400px;
        }
        .profile-form h2 {
            margin-bottom: 1.5rem;
            color: rgb(49, 104, 28);
            text-align: center;
            font-weight: bold;
        }
        .input-group {
            margin-bottom: 1.2rem;
        }
        .input-group label {
            display: block;
            margin-bottom: 0.4rem;
            color: #333;
        }
        .input-group input[type="text"],
        .input-group input[type="email"],
        .input-group input[type="file"] {
            width: 100%;
            padding: 0.6rem;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 1rem;
            transition: border-color 0.2s;
            background: #f6f9ff;
        }
        .input-group input:focus {
            border-color: #4e54c8;
            outline: none;
        }
        .profile-avatar {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 50%;
            margin: 0 auto 1rem auto;
            display: block;
            border: 2px solid #98ca52;
            background: #f6f9ff;
        }
        .btn-save {
            width: 100%;
            background: rgb(49, 104, 28);
            color: rgb(5, 5, 5);
            border: none;
            padding: 0.8rem;
            font-size: 1.1rem;
            border-radius: 6px;
            cursor: pointer;
            transition: background 0.2s;
            font-weight: bold;
            margin-top: 0.5rem;
            margin-bottom: 0.5rem;
        }
        .btn-save:hover {
            background: #FFF2D9;
        }
        .alert-danger {
            background: #ffe4e4;
            color: #a20000;
            border-radius: 5px;
            padding: 0.7rem 1rem;
            margin-bottom: 1rem;
        }
        .alert-success {
            background: #e9ffd9;
            color: #208c3c;
            border-radius: 5px;
            padding: 0.7rem 1rem;
            margin-bottom: 1rem;
        }
    </style>
</head>
<body>
<div class="profile-container">
    <form class="profile-form" method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <h2>Edit Profile</h2>
        
        @if(session('success'))
            <div class="alert-success">{{ session('success') }}</div>
        @endif

        @if ($errors->any())
            <div class="alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- صورة البروفايل الحالية -->
        @if (auth()->user()->avatar)
            <img src="{{ asset('storage/' . auth()->user()->avatar) }}" alt="Profile Image" class="profile-avatar">
        @else
            <img src="{{ asset('assets/imgs/user-default.png') }}" alt="Profile Image" class="profile-avatar">
        @endif

        <div class="input-group">
            <label for="avatar">Profile Image</label>
            <input type="file" name="avatar" id="avatar" accept="image/*">
        </div>
        <div class="input-group">
            <label for="name">Full Name</label>
            <input type="text" id="name" name="name" value="{{ old('name', auth()->user()->name) }}" required>
        </div>
        <div class="input-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email', auth()->user()->email) }}" required>
        </div>
        <div class="input-group">
            <label for="phone">Phone</label>
            <input type="text" id="phone" name="phone" value="{{ old('phone', auth()->user()->phone) }}">
        </div>
        <div class="input-group">
            <label for="address">Address</label>
            <input type="text" id="address" name="address" value="{{ old('address', auth()->user()->address) }}">
        </div>
        <div class="input-group">
            <label for="city">City</label>
            <input type="text" id="city" name="city" value="{{ old('city', auth()->user()->city) }}">
        </div>
        <div class="input-group">
            <label for="postal_code">Postal Code</label>
            <input type="text" id="postal_code" name="postal_code" value="{{ old('postal_code', auth()->user()->postal_code) }}">
        </div>
        <div class="input-group">
            <label for="country">Country</label>
            <input type="text" id="country" name="country" value="{{ old('country', auth()->user()->country) }}">
        </div>
        <button type="submit" class="btn-save">Save Changes</button>
    </form>
</div>
</body>
</html>
