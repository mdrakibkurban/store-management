@extends('admin.layouts.app')

@section('title-content')
<div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0">Return Product History</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Home</a></li>
        <li class="breadcrumb-item active">Return Product History</li>
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
              <h3 class="card-title mt-2">Return Product History</h3>
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
                  </tr>
                </thead>
                <tbody>
                    @foreach ($returnProducts as $returnProduct)
                    <tr>
                        <td style="width: 20px">{{ $loop->iteration }}</td>
                        <td> {{ $returnProduct->date }}</td>
                        <td> {{ $returnProduct->Product->name }} </td>
                        <td> {{ $returnProduct->size->size }} </td>
                        <td> {{ $returnProduct->quantity }} </td>
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





