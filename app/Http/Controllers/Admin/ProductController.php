<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\IProductRepository;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;



class ProductController extends Controller
{


    protected $productRepo;

    public function __construct(IProductRepository $productRepo)
    {
        $this->productRepo = $productRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $data['products'] = $this->productRepo->productGet();
        return view('admin.product.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'         => 'required',
            'category_id'  => 'required',
            'brand_id'     => 'required',
            'sku'          => 'required',
            'cost_price'   => 'required',
            'retail_price' => 'required',
            'year'         => 'required',
            'description'  => 'required',
            'image'        => 'required',
        ]);
 
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors'  => $validator->errors()
            ],422);
        }
        $this->productRepo->productStore($request);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['product'] =  $this->productRepo->productFind($id);
        return view('admin.product.details',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['product'] =  $this->productRepo->productFind($id);
        return view('admin.product.edit',$data);
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
        $validator = Validator::make($request->all(), [
            'name'         => 'required',
            'category_id'  => 'required',
            'brand_id'     => 'required',
            'sku'          => 'required',
            'cost_price'   => 'required',
            'retail_price' => 'required',
            'year'         => 'required',
            'description'  => 'required',
        ]);
 
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors'  => $validator->errors()
            ],422);
        }
        $this->productRepo->productUpdate($request,$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->productRepo->productDelete($id);
        return redirect()->back();
    }

    public function active($id){
         $product = Product::find($id);
         if(!$product){
            flash('data not fount')->error();
         }
          $product->status = true;
          $product->save();
          flash('product active success')->success();
          return redirect()->back();
    }

    public function inactive($id){
        $product = Product::find($id);
        if(!$product){
           flash('data not fount')->error();
        }
         $product->status = false;
         $product->save();
         flash('product Inactive success')->success();
         return redirect()->back();
   }
}
