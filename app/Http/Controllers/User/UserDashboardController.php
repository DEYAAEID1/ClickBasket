<?php

namespace App\Http\Controllers\User;

use App\Models\Category\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserDashboardController extends Controller
{
    /**
     * Show the user dashboard.
     */
    public function index()
    {
        $categories = Category::with('subcategories')->whereHas('subcategories')->get();
        return view('shop.frontend.user', compact('categories'));
    }

    public function Adminlogin()
    {

        return view('auth.admin-Login');
    }
    public function AdminDashboard()
    {

        return view('backend.pages.dashboard');
    }
}
