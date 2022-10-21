<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductSizeStock;
use App\Models\ProductStock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StocksController extends Controller
{
    public function stocks(){
        return view('admin.stock.stock');
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'product_id'  => 'required',
            'date'        => 'required',
            'stock_type'  => 'required',
            'items'       => 'required',
        ]);
 
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors'  => $validator->errors()
            ],422);
        }

        foreach ($request->items as $item) {
          
            if($item['quantity'] && $item['quantity'] > 0){
                $stock = new ProductStock();
                $stock->product_id = $request->product_id;
                $stock->date       = $request->date;
                $stock->stock_type = $request->stock_type;
                $stock->size_id    = $item['size_id'];
                $stock->quantity   = $item['quantity'];
                $stock->save();

                $stockQuantity = ProductSizeStock::where('product_id',$request->product_id)->where('size_id',$item['size_id'])->first();

                if($request->stock_type == 'in'){
                    $stockQuantity->quantity =  $stockQuantity->quantity + $item['quantity'];
                }else{
                    $stockQuantity->quantity =  $stockQuantity->quantity - $item['quantity'];
                }
                $stockQuantity->save();
            }

        }

        return response()->json([
            'success' => true,
        ]);

    }
}
