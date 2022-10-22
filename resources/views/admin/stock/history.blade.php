@extends('admin.layouts.app')

@section('title-content')
<div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0">Stock</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Home</a></li>
        <li class="breadcrumb-item active">Stock History</li>
      </ol>
    </div><!-- /.col -->
  </div><!-- /.row -->
@endsection


@section('main-content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title mt-2">Stock History</h3>
            </div>
           
            <div class="card-body">
              <table class="table table-bordered table-striped" id="dataTable">
                <thead>
                  <tr>
                    <th style="width: 20px">#</th>
                    <th>Date</th>
                    <th>Product</th>
                    <th>Size</th>
                    <th>Quantity</th>
                    <th>Stock Type</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($stockhistories as $stockhistory)
                    <tr>
                        <td style="width: 20px">{{ $loop->iteration }}</td>
                        <td> {{ $stockhistory->date }}</td>
                        <td> {{ $stockhistory->Product->name }} </td>
                        <td> {{ $stockhistory->size->size }} </td>
                        <td> {{ $stockhistory->quantity }} </td>
                        <td> {{ strtoupper($stockhistory->stock_type) }} </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            
          </div>

        </div>
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
@endsection


