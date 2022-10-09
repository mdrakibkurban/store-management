@extends('admin.layouts.app')

@section('title-content')
<div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0">Brand</h1>
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
              <h3 class="card-title mt-2">Brand List</h3>
    
              <div class="card-tools">
                    <a href="{{ route('brands.create')}}" class="btn btn-primary">Add Brand</a>
              </div>
            </div>
            <div class="card-body">
              <table class="table table-bordered table-striped" id="dataTable">
                <thead>
                  <tr>
                    <th style="width: 20px">#</th>
                    <th>Brand Name</th>
                    <th style="width: 120px">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($brands as $brand)
                    <tr>
                        <td style="width: 20px">{{ $loop->iteration }}</td>
                        <td>{{ $brand->name }}</td>
                        <td style="width: 120px">
                            <a href="{{ route('brands.edit',$brand->id)}}" class="btn btn-warning btn-sm">Edit</a>


                            <a href="javascript:void(0)" data-form-id="delete-brand-{{ $brand->id }}" class="btn btn-danger btn-sm delete-brand"
                             >Delete</a>
 

                             <form id ="delete-brand-{{ $brand->id }}"  action="{{ route('brands.destroy',$brand->id)}}" method="post">
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
   
  $(document).on("click",".delete-brand",function() {
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
