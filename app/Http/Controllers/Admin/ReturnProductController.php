<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductSizeStock;
use App\Models\ReturnProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReturnProductController extends Controller
{
    public function returnProduct(){
        return view('admin.return_product.return');
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'product_id'  => 'required',
            'date'        => 'required',
            'items'        => 'required',
        ]);
 
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors'  => $validator->errors()
            ],422);
        }

        foreach ($request->items as $item) {
          
            if($item['quantity'] && $item['quantity'] > 0){
                $stock = new ReturnProduct();
                $stock->product_id = $request->product_id;
                $stock->date       = $request->date;
                $stock->size_id    = $item['size_id'];
                $stock->quantity   = $item['quantity'];
                $stock->save();

                $stockQuantity = ProductSizeStock::where('product_id',$request->product_id)->where('size_id',$item['size_id'])->first();

                $stockQuantity->quantity =  $stockQuantity->quantity + $item['quantity'];
               
                $stockQuantity->save();
            }

        }

        return response()->json([
            'success' => true,
        ]);

    }


    public function history(){
         $data['returnProducts'] = ReturnProduct::with('product','size')->latest()->get();
         return view('admin.return_product.history',$data);
    }
}
