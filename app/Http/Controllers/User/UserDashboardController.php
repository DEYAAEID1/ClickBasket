<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

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
}
