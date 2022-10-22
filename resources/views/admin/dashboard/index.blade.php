@extends('admin.layouts.app')

@section('title-content')
<div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0">Dashboard</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Home</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
      </ol>
    </div><!-- /.col -->
  </div><!-- /.row -->
@endsection


@section('main-content')

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
                <h3>{{$total_user ?? 0}}</h3>

                <p>Total User</p>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
            <a href="{{ route('users.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3>{{$total_product ?? 0}}</h3>
              <p>Total Product</p>
            </div>
            <div class="icon">
              <i class="fa fa-list"></i>
            </div>
            <a href="{{ route('products.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-dark">
            <div class="inner">
              <h3>{{$total_stock ?? 0}}</h3>

              <p>Stock In</p>
            </div>
            <div class="icon">
              <i class="fas fa-cart-plus"></i>
            </div>
            <a href="{{ url('/stocks/history')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3>{{ $total_return_product ?? 0 }}</h3>

              <p>Total Return Product</p>
            </div>
            <div class="icon">
              <i class="fas fa-list"></i>
            </div>
            <a href="{{ url('/return-product-list')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>


      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Latest Product</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>sku</th>
                    <th>Category</th>
                    <th>Brand</th>
                    <th class="text-center" style="width: 100px;">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($latest_products as $product)
                <tr>
                    <td style="width: 10px">{{ $loop->iteration }}</td>
                    <td class="text-center"><img width="50" src="{{ asset("uploads/products/$product->image") }}" alt=""></td>
                        <td>{{ $product->name ?? '' }}</td>
                        <td>{{ $product->sku ?? '' }}</td>
                        <td>{{ $product->category->name ?? '' }}</td>
                        <td>{{ $product->brand->name ?? '' }}</td>
                        <td class="text-center" style="width: 100px;">
                            <a href="{{ route('products.show',$product->id)}}" class="btn btn-primary btn-sm">Details</a>
                        </td>
                          
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        <!-- /.col -->
      </div>
  </div><!-- /.container-fluid -->
@endsection