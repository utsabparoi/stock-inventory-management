<?php

namespace App\Http\Controllers;
use App\Models\ProductStock;
use App\Models\Product;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\ProductSizeStock;

use Illuminate\Http\Request;


class StocksController extends Controller
{
    public function stock(){
        return view('stocks.stock');
    }

    public function stockSubmit(Request $request){
        // return $request->all();

        //Validate data
        $validate = Validator::make($request->all(), [
            'product_id' => 'required|numeric',
            'date' => 'required|string',
            'stock_type' => 'required|string',
            'items' => 'required'
            
        ]);
        // Error response
        if ($validate->fails()){
            return response()->json([
                'success' =>false,
                'errors' => $validate->errors()
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        //Store product stock
        foreach($request->items as $item){
            if ($item['quantity'] && $item['quantity'] > 0) {
                $new_item = new ProductStock();
                $new_item->product_id = $request->product_id;
                $new_item->date = $request->date;
                $new_item->status = $request->stock_type;
                $new_item->size_id = $item['size_id'];
                $new_item->quantity = $item['quantity'];
                $new_item->save();

                //Product stock size update
                $product_stock_quantity = ProductSizeStock::where('product_id', $request->product_id)
                ->where('size_id', $item['size_id'])
                ->first();

                if($request->stock_type == ProductStock::STOCK_IN){
                    //Stock in
                    $product_stock_quantity->quantity = $product_stock_quantity->quantity + $item['quantity'];
                }else {
                    //Stock out
                    $product_stock_quantity->quantity = $product_stock_quantity->quantity - $item['quantity'];
                }

                $product_stock_quantity->save();
            }
        }

        flash('Stock updated successfully')->success();

        return response()->json([
            'success' => true
        ], Response::HTTP_OK);
    }

    public function history(){
        $stocks = ProductStock::with(['product', 'size'])->orderBy('created_at', 'DESC')->get();
        return view('stocks.history', compact('stocks'));
    }
}
