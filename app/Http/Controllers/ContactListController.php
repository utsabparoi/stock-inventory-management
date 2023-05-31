<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['allContact'] = ContactUs::latest()->get();
        return view('contact_us.contact_list', $data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact = ContactUs::findOrFail($id);
        $contact->delete();

        flash('Category Deleted Successfully')->success();
        return redirect()->route('contact_list');
    }
}
