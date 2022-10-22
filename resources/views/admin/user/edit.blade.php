@extends('admin.layouts.app')

@section('title-content')
<div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0">User</h1>
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
                <h3 class="card-title mt-2">User Create</h3>
      
                <div class="card-tools">
                      <a href="{{ route('users.index')}}" class="btn btn-success"><i class="fas fa-list"></i> User List</a>
                </div>
              </div>
                  <form action="{{ route('users.update',$user->id)}}" method="post">
                        @csrf
                        @method('put')
                      <div class="card-body">
                          <div class="form-group">
                            <label for="name">User Name</label>
                            <input type="text" class="form-control" id="name" value="{{ $user->name }}" name="name" placeholder="Enter User Name">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>

                          <div class="form-group">
                            <label for="name">User Email</label>
                            <input type="email" class="form-control" id="email" value="{{ $user->email }}" name="email" placeholder="Enter User Email">
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>

                          <div class="form-group">
                            <label for="name">Pasword</label>
                            <input type="password" class="form-control" id="Password" value="{{ old('password')}}" name="password" placeholder="Enter User Password">
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>

                          <div class="form-group">
                            <label for="name">Confirm Pasword</label>
                            <input type="password" class="form-control" id="password_confirmation" value="{{ old('password_confirmation')}}" name="password_confirmation" placeholder="Enter User Password">
                          </div>
                      </div>
                      <!-- /.card-body -->
                      <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                      </div>

                  </form>
              <!-- /.card-footer-->
            </div>
         

          </div>
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
@endsection