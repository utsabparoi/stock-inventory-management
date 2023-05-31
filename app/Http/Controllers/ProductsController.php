<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Traits\FileSaver;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class ProductsController extends Controller
{
    use FileSaver;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with(['category'])->get();
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $products = Product::all();
        return view('products.create', compact('categories','products'));
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
        //Validate data
        $validate = Validator::make($request->all(), [
            'category_id' => 'required|numeric',
            'name' => 'required|string|max:200',
        ]);
        // Error response
        if ($validate->fails()){
            return response()->json([
                'success' =>false,
                'errors' => $validate->errors()
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        $this->storeOrUpdate($request);
        return redirect()->route('products.index')->with('success','Added Success');
        flash('Product Created Successfully')->success();

        return response()->json([
            'success' =>true,
        ], Response::HTTP_OK);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::with(['category'])
        ->where('id', $id)
        ->first();

        return view('products.show', compact('product'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['product'] = Product::findOrFail($id);
        $data['categories'] = Category::all();

        return view('products.edit', $data);
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
        //Validate data
        $validate = Validator::make($request->all(), [
            'category_id' => 'required|numeric',
            'name' => 'required|string|max:200'
        ]);
        // Error response
        if ($validate->fails()){
            return response()->json([
                'success' =>false,
                'errors' => $validate->errors()
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $this->storeOrUpdate($request,$id);
        return redirect()->route('products.index')->with('success','Updated Success');
        flash('Product Updated Successfully')->success();
        return response()->json([
            'success' =>true,
        ], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        $product->delete();
        flash('Product Deleted Successfully')->success();
        return back();
    }

    //Handle AJAX request
    public function getProductsJson(){
        $products = Product::get();

        return response()->json([
            'success' => true,
            'data' => $products
        ], Response::HTTP_OK);
    }

    private function storeOrUpdate($request, $id = null)
    {
        try {
            Product::updateOrCreate([
                'id'             => $id,
            ],[
                'category_id'    => $request->category_id,
                'name'           => $request->name,
            ]);

        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
