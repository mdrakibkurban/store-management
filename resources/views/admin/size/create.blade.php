@extends('admin.layouts.app')

@section('title-content')
<div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0">Size</h1>
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
        <div class="col-md-8 offset-2">
            <!-- general form elements -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title mt-2">Size Create</h3>
      
                <div class="card-tools">
                      <a href="{{ route('sizes.index')}}" class="btn btn-success"><i class="fas fa-list"></i> Size List</a>
                </div>
              </div>
                  <form action="{{ route('sizes.store')}}" method="post">
                        @csrf
                      <div class="card-body">
                          <div class="form-group">
                            <label for="name">Size</label>
                            <input type="text" class="form-control" id="name" value="{{ old('size')}}" name="size" placeholder="Enter Size Name">
                            @error('size')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>
                      </div>
                      <!-- /.card-body -->
                      <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Create</button>
                      </div>

                  </form>
              <!-- /.card-footer-->
            </div>
         

          </div>
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
@endsection