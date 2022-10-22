<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductStock;
use App\Models\ReturnProduct;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){

        $data['total_product'] = Product::where('status',1)->count();
        $data['total_user'] = User::count();
        $data['total_stock'] = ProductStock::where('stock_type','in')->count();
        $data['total_return_product'] = ReturnProduct::count();
        $data['latest_products'] = Product::latest()->limit(5)->get();
        return view('admin.dashboard.index',$data);
    }
}
