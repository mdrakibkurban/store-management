<?php

namespace App\Repositories;

use App\Interfaces\IProductRepository;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Image;

class ProductRepository extends BaseRepository implements IProductRepository
{
    public function __construct(Product $model)
    {
        parent::__construct($model);
    }

    public function productStore($request){
           try {
            if($request->image){
                $file = explode(';',$request->image);
                $file = explode('/', $file[0]);
                $file_ex = end($file);
                $file_name = date('Ymd-his').'.'.$file_ex;
                Image::make($request->image)->resize(100, 100)->save(public_path('/uploads/products/').$file_name);      
            }else{
                $file_name = null;
            }
           $product = $this->model;
           $product->name         = $request->name;
           $product->user_id      = Auth::id();
           $product->category_id  = $request->category_id;
           $product->brand_id     = $request->brand_id;
           $product->sku          = $request->sku;
           $product->cost_price   = $request->cost_price;
           $product->retail_price = $request->retail_price;
           $product->year         = $request->year;
           $product->description  = $request->description;
           $product->image        = $file_name;
           $product->save();
           return response()->json([
            'success' => true,
            'message' => 'product create success',
            'product' => $product
           ]);
           } catch (\Throwable $th) {
              return response()->json([
                  'success' => false,
                  'message' =>'something wrong'
              ]);
           }
         
    }
}
