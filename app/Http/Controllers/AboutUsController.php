<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use App\Traits\FileSaver;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    use FileSaver;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = AboutUs::orderby('created_at', 'DESC')->paginate(20);
        return view('about_us.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('about_us.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $this->storeOrUpdate($request);
            flash('Infromation Created Successfully')->success();
            return redirect()->route('about_us.index')->with('success','Added Success');

        } catch (\Throwable $th) {
            return redirect()->back()->with('error',$th->getMessage());

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AboutUs  $aboutUs
     * @return \Illuminate\Http\Response
     */
    public function show(AboutUs $aboutUs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AboutUs  $aboutUs
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = AboutUs::findOrFail($id);
        return view('about_us.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AboutUs  $aboutUs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $this->storeOrUpdate($request,$id);
            flash('Information Updated Successfully')->success();
            return redirect()->route('about_us.index');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error',$th->getMessage());
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AboutUs  $aboutUs
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = AboutUs::find($id);

        if(file_exists($data->image))
        {
            unlink($data->image);
        }
        $data->delete();

        flash('Information Deleted Successfully')->success();
        return redirect()->route('about_us.index');
    }

    private function storeOrUpdate($request, $id = null)
    {
        // ddd($request);
        try {
            $about_us = AboutUs::updateOrCreate([
                'id'             => $id,
            ],[
                'title'          => $request->title,
                'description'    => $request->description,
            ]);
            $this->upload_file($request->image, $about_us, 'image', 'images/about_us');

        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
