<!-- sidebar.blade.php -->

<!-- Wrapper -->
<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{asset('assets/imgs/logo.png')}}" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">ClickBasket</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i></div>
    </div>

    <!-- Navigation -->
    <ul class="metismenu" id="menu">

        <!-- Dashboard Section -->
        <li><a href="{{ route('admin.dashboard') }}"><i class="bx bx-right-arrow-alt"></i>Dashboard</a></li>

        <!-- Product Management -->
        <li>
            <a href="javascript:;" class="menu-item" id="product-management-link">
                <div class="parent-icon"><i class='bx bx-category'></i></div>
                <div class="menu-title">Product Management</div>
            </a>

        </li>

        <!-- Manage Categories -->
        <li>
            <a href="{{ route('categories.index') }}" id="manageCategoriesLink">
    <i class="Category"></i> Manage Categories
</a>

        </li>

        <!-- User Profile Section -->
        <li>
            <a href="edit-profile.html">
                <i class="bx bx-right-arrow-alt"></i>Edit Profile
            </a>
        </li>

        <!-- Logout -->
        <li>
            <form action="{{ route('admin.Logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" class="dropdown-item">Logout</button>
            </form>
        </li>
    </ul>
</div>