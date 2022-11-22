<?php

namespace App\Http\Controllers;

use App\Models\ReturnProduct;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\ProductSizeStock;

use Illuminate\Http\Request;

class ReturnProductsController extends Controller
{
    public function returnProduct(){
        return view('return_products.return');
    }

    public function returnProductSubmit(Request $request){
        // return $request->all();

        //Validate data
        $validate = Validator::make($request->all(), [
            'product_id' => 'required|numeric',
            'date' => 'required|string',
            'items' => 'required'
            
        ]);
        // Error response
        if ($validate->fails()){
            return response()->json([
                'success' =>false,
                'errors' => $validate->errors()
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        //Store return product
        foreach($request->items as $item){
            if ($item['quantity'] && $item['quantity'] > 0) {
                $new_item = new ReturnProduct();
                $new_item->product_id = $request->product_id;
                $new_item->date = $request->date;
                $new_item->size_id = $item['size_id'];
                $new_item->quantity = $item['quantity'];
                $new_item->save();

                //Product stock size update
                $product_stock_quantity = ProductSizeStock::where('product_id', $request->product_id)
                ->where('size_id', $item['size_id'])
                ->first();

                //Stock in
                $product_stock_quantity->quantity = $product_stock_quantity->quantity + $item['quantity'];                

                $product_stock_quantity->save();
            }
        }

        flash('Return product updated successfully')->success();

        return response()->json([
            'success' => true
        ], Response::HTTP_OK);
    }

    public function history(){
        $return_products = ReturnProduct::with(['product', 'size'])->orderBy('created_at', 'DESC')->get();
        return view('return_products.history', compact('return_products'));
    }
}
