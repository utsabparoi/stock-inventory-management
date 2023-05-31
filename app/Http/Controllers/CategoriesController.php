<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Traits\FileSaver;
use Illuminate\Http\Response;

class CategoriesController extends Controller
{
    use FileSaver;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderby('created_at', 'DESC')->get();
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //form validation
        $this->validate($request, [
            'name'  =>  'required|min:2|max:50|unique:categories',
        ]);

        try {
            $this->storeOrUpdate($request);
            flash('Category Created Successfully')->success();
            return redirect()->route('categories.index')->with('success','Added Success');

        } catch (\Throwable $th) {
            return redirect()->back()->with('error',$th->getMessage());

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //form validation
        $this->validate($request, [
            'name'  =>  'required|min:2|max:50|unique:categories,name,' . $id,
        ]);

        try {
            $this->storeOrUpdate($request,$id);
            flash('Category Updated Successfully')->success();
            return redirect()->route('categories.index');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error',$th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        flash('Category Deleted Successfully')->success();
        return redirect()->route('categories.index');
    }

    //Handle AJAX request
    public function getCategoriesJson(){
        $categories = Category::all();

        return response()->json([
            'success' => true,
            'data' => $categories
        ], Response::HTTP_OK);
    }

    private function storeOrUpdate($request, $id = null)
    {
        // ddd($request);
        try {
            Category::updateOrCreate([
                'id'             => $id,
            ],[
                'name'          => $request->name,
            ]);

        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
