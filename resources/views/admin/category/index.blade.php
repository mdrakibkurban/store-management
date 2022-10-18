@extends('admin.layouts.app')

@section('title-content')
<div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0">Category</h1>
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
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title mt-2">Category List</h3>
              <div class="card-tools">
                    <a href="{{ route('categories.create')}}" class="btn btn-primary">Add Category</a>
              </div>
            </div>
           
            <div class="card-body">
              <table class="table table-bordered table-striped" id="dataTable">
                <thead>
                  <tr>
                    <th style="width: 20px">#</th>
                    <th>Category Name</th>
                    <th>Slug</th>
                    <th style="width: 120px">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                    <tr>
                        <td style="width: 20px">{{ $loop->iteration }}</td>
                        <td>{{ $category->name }}</td>
                        <td> {{ $category->slug }} </td>
                        <td style="width: 120px">
                            <a href="{{ route('categories.edit',$category->id)}}" class="btn btn-warning btn-sm">Edit</a>


                            <a href="javascript:void(0)" class="btn btn-danger btn-sm delete-category ml-2"
                             data-form-id ="category-delete-{{$category->id}}">Delete</a>

                            <form id="category-delete-{{$category->id}}" action="{{ route('categories.destroy',$category->id)}}" method="post">
                               @csrf
                               @method('delete')
                               
                            </form>
                        </td>
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





@push('scripts')
<script>
   
  $(document).on("click",".delete-category",function() {
        let form_id = $(this).data('form-id');
          Swal.fire({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
          if (result.isConfirmed) {
            $('#'+form_id).submit();
            Swal.fire(
              'Deleted!',
              'Your data has been deleted.',
              'success'
            )
          } 
        })
        });
      
</script>
@endpush
