@extends('admin.layouts.app')

@section('content')
    <div class="card my-3">
        <div class="card-body d-sm-flex d-block  align-items-center p-lg-3 p-2 user_header ">
            <div class="pe-4 fs-5">All Collection</div>
            <div class="ms-auto">
                <div class="d-flex align-items-center">
                    <a href="#" class="d-none d-sm-block"><img src="{{url('/')}}/Assets/Images/search.png" alt="" class="ed_btn me-3"></a>
                    <a href="{{route('admin.add.collection')}}" class="btn gc_btn align-items-center d-none d-md-flex"><span class="fs-4 me-2">+</span>Add Collection</a>
                </div>
            </div>
        </div>
    </div>
    <div class="card mt-3">
        <div class="card-body table-responsive">
            <table id="" class="table table-custom rwd-table example1" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>OrderNo</th>
                        <th>Status</th>
                        <th>UGITerm</th>
                        <th class="text-end">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if (!blank($collections))
                        @foreach ($collections as $collection)
                            <tr>
                                <td data-header="#">{{$loop->index+1}}</td>
                                <td data-header="Name">{{$collection->name}}</td>
                                <td data-header="OrderNo">{{$collection->order_no}}</td>
                                <td data-header="Status">
                                    @if ($collection->status == 1)
                                        <div class="badge bg-success">Active</div>
                                    @else
                                        <div class="badge bg-danger">Deactive</div>
                                    @endif
                                </td>
                                <td data-header="UGITerm">
                                    @if ($collection->parent != 0)
                                        @foreach ($collections as $collection1)
                                            @if ($collection1->id == $collection->parent)
                                                {{$collection1->name}}
                                            @endif
                                        @endforeach
                                    @endif
                                </td>
                                <td data-header="Action">
                                    <div class="d-flex">
                                        <a href="{{route('admin.edit.collection',$collection->id)}}" class="ms-auto me-2">
                                            <i class="ri-edit-2-fill fs-20"></i>
                                        </a>
                                        <a href="javascript:void(0);" data-id="{{ $collection->id }}" class="me-2 delete-btn">
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
                    url : "{{route('delete.collection', '')}}"+"/"+user_id,
                    type : 'GET',
                    dataType:'json',
                    success : function(data) {
                        Swal.fire({
                            title: 'Deleted!',
                            text: "Collection has been deleted.",
                            icon: 'success',
                            showCancelButton: false,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Ok'
                            }).then((result) => {
                            if (result.isConfirmed) {
                               location.reload();
                            }
                        });
                    }
                });
            }
            });
        });
    });
</script>
@endsection
