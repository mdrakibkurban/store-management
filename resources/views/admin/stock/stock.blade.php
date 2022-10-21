@extends('admin.layouts.app')

@section('title-content')
<div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0">Stock Manage</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Home</a></li>
        <li class="breadcrumb-item active">Stock Manage</li>
      </ol>
    </div><!-- /.col -->
  </div><!-- /.row -->
@endsection


@section('main-content')

<div class="container-fluid">
    <!-- general form elements -->
      <stock-manage></stock-manage>  
</div><!-- /.container-fluid -->
@endsection