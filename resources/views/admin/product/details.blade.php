@extends('admin.layouts.app')

@section('title-content')
<div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0">Product Details</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Home</a></li>
        <li class="breadcrumb-item active">Create</li>
      </ol>
    </div><!-- /.col -->
  </div><!-- /.row -->
@endsection


@section('main-content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Product Info</h3>
            </div>
           
            <div class="card-body">
               
                <table class="table table-bordered">
                    <tr>
                        <th>Name</th>
                        <td>{{$product->name ?? ''}}</td>   
                    </tr>

                    <tr>
                        <th>Category</th>
                        <td>{{$product->category->name ?? ''}}</td>   
                    </tr>

                    <tr>
                        <th>brand</th>
                        <td>{{$product->brand->name ?? ''}}</td>   
                    </tr>

                    <tr>
                        <th>Sku</th>
                        <td>{{$product->sku ?? ''}}</td>   
                    </tr>
                    <tr>
                        <th>Cost Price</th>
                        <td>{{$product->cost_price ?? ''}}</td>   
                    </tr>
                    <tr>
                        <th>Retail Price</th>
                        <td>{{$product->retail_price ?? ''}}</td>   
                    </tr>
                    <tr>
                        <th>Year</th>
                        <td>{{$product->year ?? ''}}</td>   
                    </tr>

                    <tr>
                        <th>Description</th>
                        <td>{{strip_tags($product->description ?? '')}}</td>  
                    </tr>

                    <tr>
                        <th>Status</th>
                        <td>{{ $product->status == 1 ? 'Active' : 'Inactive'}}</td>   
                    </tr>
                  
                </table>
             
            </div>

            <div class="card-footer">
                 <a href="{{ route('products.index')}}" class="btn btn-primary"> <i class="fa fa-arrow-left"></i> back</a>
            </div>
            
          </div>

        </div>
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Product Image</h3>
                </div>
               
                <div class="card-body text-center">
                    <img width="150" src="{{ asset("uploads/products/$product->image") }}" alt="">  
                </div>
                
            </div>

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Product Stock</h3>
              </div>
             
              <div class="card-body">
                <table class="table table-bordered">
                        <tr>
                            <td>Product Size</td>
                            <td>Location</td>
                            <td>Quantity</td>
                        </tr>
                        @foreach($product->product_stocks as $p_stock)
                            <tr>
                                <td>{{  $p_stock->size->size ?? ''}}</td>
                                <td>{{  $p_stock->location ?? ''}}</td>
                                <td>{{  $p_stock->quantity ?? ''}}</td>
                            </tr>
                        @endforeach
                </table> 
              </div>
              
            </div>
  
          </div>
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
@endsection






