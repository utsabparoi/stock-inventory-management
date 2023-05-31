<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Category;

class DashboardController extends Controller
{
    public function index(){
        $total_products = Product::count();
        $total_users = User::count();
        $total_categories = Category::count();

        return view('dashboard', compact('total_products', 'total_users', 'total_categories'));
    }
}
