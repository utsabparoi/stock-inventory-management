<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stocks = Stock::with(['category', 'product'])->get();
        return view('stocks.index', compact('stocks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $products  = Product::all();
        return view('stocks.create', compact('categories', 'products'));
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
        
        $this->validate($request, [
            'category_id' => 'required',
            'product_id' => 'required|unique:stocks',
        ]);

        try {
            $this->storeOrUpdateWithExtraInfo($request);
            return redirect()->route('stocks.index')->with('success', 'Added Success');
            flash('Stock Created Successfully')->success();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error',$th->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['product'] = Stock::findOrFail($id);
        $data['categories'] = Category::all();

        return view('stocks.edit', $data);
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
            'category_id' => 'required',
            'product_id' => 'required|unique:stocks,product_id',
        ]);
        // Error response
        if ($validate->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validate->errors()
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        // $this->storeOrUpdate($request,$id);
        $this->storeOrUpdateWithExtraInfo($request);
        return redirect()->route('stocks.index')->with('success', 'Updated Success');
        flash('Stock Updated Successfully')->success();
        return response()->json([
            'success' => true,
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
        $product = Stock::findOrFail($id);

        $product->delete();
        flash('Stock Deleted Successfully')->success();
        return back();
    }

    //Handle AJAX request
    public function getProductsJson()
    {
        $stocks = Stock::get();

        return response()->json([
            'success' => true,
            'data' => $stocks
        ], Response::HTTP_OK);
    }

    // private function storeOrUpdate($request, $id = null)
    // {
    //     try {
    //         Stock::updateOrCreate([
    //             'id'             => $id,
    //         ],[
    //             'category_id'           => $request->category_id,
    //             'product_id'            => $request->product_id,
    //             'recieved_quantitiy'    => $request->recieved_quantitiy,
    //             'current_quantity'      => $request->current_quantity,
    //         ]);

    //     } catch (\Throwable $th) {
    //         throw $th;
    //     }
    // }

    public function storeOrUpdateWithExtraInfo($request, $id = null)
    {
        foreach ($request->category_id as $key => $value) {
            $stock = Stock::updateOrCreate(
                [
                    'id' => $id,
                ],
                [
                    'category_id' => Category::where('name', $request->category_id[$key])->first()->id,
                    'product_id' => Product::where('name', $request->product_id[$key])->first()->id,
                    'recieved_quantity' => $request->recieved_quantity[$key],
                    'current_quantity' => $request->current_quantity[$key],
                ]
            );
        }
        return $stock;
    }
}
