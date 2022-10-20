<?php

namespace App\Repositories;

use App\Interfaces\IProductRepository;
use App\Models\Product;
use App\Models\ProductSizeStock;
use Illuminate\Support\Facades\Auth;
use Image;

class ProductRepository extends BaseRepository implements IProductRepository
{
    public function __construct(Product $model)
    {
        parent::__construct($model);
    }

    public function productGet(){
        return $this->model->latest()->with('category','brand')->get();
    }

    public function productFind($id){
        $data = $this->model->latest()->with('category','brand','product_stocks.size')->find($id);;
        if(!$data){
            return null;
            flash('Data Not Found')->error();
        }else{
            return $data;
        }
    }

    public function productDelete($id){
        $product = $this->model->find($id);
        if(!$product){
            flash('Data not found')->error();
        }else{
            if(file_exists(public_path('/uploads/products/'.$product->image))) {
                unlink(public_path('/uploads/products/'.$product->image));
            }
            $product->delete();
            flash('Product Successfully delete')->success();
        }
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

           if($request->items){
               foreach( $request->items as $item){
                   $size_stock = new ProductSizeStock();
                   $size_stock->product_id = $product->id;
                   $size_stock->size_id = $item['size_id'];
                   $size_stock->location = $item['location'];
                   $size_stock->quantity = $item['quantity'];
                   $size_stock->save();
               }
           }
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


    public function productUpdate($request,$id){
         $product =  $this->myFind($id);
         try {
            if($request->image){
                if(file_exists(public_path('/uploads/products/'.$product->image))) {
                    unlink(public_path('/uploads/products/'.$product->image));
                }
                $file = explode(';',$request->image);
                $file = explode('/', $file[0]);
                $file_ex = end($file);
                $file_name = date('Ymd-his').'.'.$file_ex;
                Image::make($request->image)->resize(100, 100)->save(public_path('/uploads/products/').$file_name);      
            }else{
                $file_name =  $product->image;
            }
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

           ProductSizeStock::where('product_id',$id)->delete();

           if($request->items){
               foreach( $request->items as $item){
                   $size_stock = new ProductSizeStock();
                   $size_stock->product_id = $product->id;
                   $size_stock->size_id = $item['size_id'];
                   $size_stock->location = $item['location'];
                   $size_stock->quantity = $item['quantity'];
                   $size_stock->save();
               }
           }
           return response()->json([
            'success' => true,
            'message' => 'product update success',
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
