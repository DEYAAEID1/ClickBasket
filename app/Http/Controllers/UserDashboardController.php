<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    /**
     * Show the user dashboard.
     */
    public function index()
    {
        return view('shop.frontend.user');
    }
}
