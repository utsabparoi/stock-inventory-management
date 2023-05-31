<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['categories'] = Category::orderBy('id','asc')->get();
        return view('frontend.pages.contact_us', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $contact = new ContactUs();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->address = $request->address;
        $contact->message = $request->message;
        $contact->save();

        flash('Category Created Successfully')->success();
        return back();
    }
}
