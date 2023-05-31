<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use App\Models\Category;
use App\Models\Product;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data['popular_categories'] = Category::orderBy('id','asc')->paginate(9);
        $data['new_arrivals'] = Product::with('category')->latest()->paginate(12);
        $data['category_offers'] = Category::orderBy('id','asc')->paginate(4);

        return view('frontend.welcome', $data);
    }

    public function aboutUs(){
        $data['categories'] = Category::orderBy('id','asc')->get();
        $data['about_us'] = AboutUs::first();
        return view('frontend.pages.about_us', $data);
    }

    public function singleCategory($id){
        // $cat_id = Category::find($id);
        // $data['categories'] = Category::orderBy('id','asc')->get();
        $data['category_info'] = Product::with('category')->where('category_id', $id)->get();
        $data['popular_categories'] = Category::orderBy('id','asc')->paginate(9);
        return view('frontend.pages.single-category', $data);
    }
}

