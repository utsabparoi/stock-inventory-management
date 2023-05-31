<?php
namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterUserController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.register-user.create');
    }
    public function loginUser(){
        return view('frontend.welcome');
    }
    public function registerUser(){
        $categories = Category::get();
        return view('frontend.register-user.register', compact('categories'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // ddd($request);
        // $this->validate($request, [
        //     'name' => 'required|min:2|max:100',
        //     'email' => 'required|email|unique:users',
        //     'password' => 'required|min:8|max:50|confirmed'
        // ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password); //hash for encryption the password
        $user->user_type = 2;
        $user->save();

        flash('User created successfully')->success();
        return redirect()->route('loginForm');
    }

    public function userLogout(){
        Auth::logout();
        return redirect('/');
    }
}
