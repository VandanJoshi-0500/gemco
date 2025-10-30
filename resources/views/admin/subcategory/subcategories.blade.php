@extends('admin.layouts.app')

@section('content')
    <div class="card my-3">
        <div class="card-body d-sm-flex d-block  align-items-center p-lg-3 p-2 user_header ">
            <div class="pe-4 fs-5">Sub - Categories</div>
            <div class="ms-auto">
                <div class="d-flex align-items-center">
                    <a href="#" class="d-none d-sm-block"><img src="{{url('/')}}/Assets/Images/search.png" alt="" class="ed_btn me-3"></a>
                    <a href="{{route('admin.add.subcategory')}}" class="btn gc_btn align-items-center d-none d-md-flex"><span class="fs-4 me-2">+</span>Add SubCategories</a>
                </div>
            </div>
        </div>
    </div>
    <div class="card mt-3">
        <div class="card-body table-responsive">
            <table id="" class="table table-custom rwd-table example1" style="width:100%">
                <thead>
                    @if (session('success'))
                        <div class="alert alert-success" id="alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <tr>
                        <th>ID</th>
                        <th>SubCategory</th>
                        <th>Parent</th>
                        <th>Status</th>
                        <th class="text-end">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if (!blank($subcategories))
                        @foreach ($subcategories as $subcategory)
                            <tr>
                                <td data-header="#">{{$loop->index+1}}</td>
                                {{-- <td data-header="CategoryId">{{$subcategory->category_id}}</td> --}}
                                <td data-header="subcategory">{{$subcategory->name}}</td>
                                <td data-header="parent">{{ $subcategory->category->name }}</td>
                                <td data-header="Status">
                                    @if ($subcategory->status == 1)
                                        <div class="badge bg-success">Active</div>
                                    @else
                                        <div class="badge bg-danger">Deactive</div>
                                    @endif
                                </td>
                                <td data-header="Action">
                                    <div class="d-flex">
                                        <a href="{{route('admin.edit.subcategory',$subcategory->id)}}" class="ms-auto me-2">
                                            <i class="ri-edit-2-fill fs-20"></i>
                                        </a>
                                        <a href="javascript:void(0);" data-id="{{ $subcategory->id }}" class="me-2 delete-btn">
                                            <i class="ri-delete-bin-fill fs-20"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
@section('script')
<script>
    $(document).ready(function(){
    $(document).on('click','.delete-btn',function(){
        var user_id = $(this).attr('data-id');
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
                $.ajax({
                    url : "{{route('delete.subcategory', '')}}"+"/"+user_id,
                    type : 'GET',
                    dataType:'json',
                    success : function(data) {
                        if (data.status === 'success') {
                            Swal.fire({
                                title: 'Deleted!',
                                text: data.message,
                                icon: 'success',
                                confirmButtonColor: '#3085d6',
                                confirmButtonText: 'Ok'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    location.reload();
                                }
                            });
                        } else {
                            Swal.fire({
                                title: 'Error!',
                                text: data.message,
                                icon: 'error',
                                confirmButtonColor: '#d33',
                                confirmButtonText: 'Ok'
                            });
                        }
                    }
                });
            }
        });
    });
});

// disable success message
document.addEventListener("DOMContentLoaded", function () {
        let successMessage = document.getElementById("alert-success");

        if (successMessage) {
            setTimeout(function () {
                successMessage.style.display = "none";
            }, 3000);
        }
    });
</script>
@endsection
