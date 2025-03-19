@extends('admin.layouts.app')

@section('content')
<div class="gc_row">
    <div class="card my-3">
        <div class="card-body d-sm-flex d-block  align-items-center p-lg-3 p-2 user_header ">
            <div class="pe-4 fs-5">Customer Group Master</div>
            <div class="ms-auto">
                <div class="d-flex align-items-center">
                    <a href="{{route('admin.add.group')}}" class="btn gc_btn align-items-center d-none d-md-flex"><span class="fs-4 me-2">+</span>Add New</a>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body table-responsive">
            <table class="table rwd-table mb-0 example1">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Group Name</th>
                        <th>Tax Class</th>
                        <th>Active</th>
                        <th>Created At</th>
                        <th class="text-end">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if (!blank($groups))
                        @foreach ($groups as $group)
                            <tr>
                                <td><a href="{{route('admin.edit.user',$group->id)}}">{{$loop->index+1}}</a></td>
                                <td data-header="Group Name" class="pt-2">
                                    {{$group->name}}
                                </td>
                                <td data-header="TaxClass">{{$group->tax_class}}</td>
                                <td data-header="Status">
                                    @if ($group->status == 1)
                                        <h4 class="badge bg-success">Active</h4>
                                    @else
                                        <h4 class="badge bg-danger">Deactive</h4>
                                    @endif
                                </td>
                                <td data-header="Created At">{{date('Y-m-d',strtotime($group['created_at']))}}</td>
                                <td data-header="Action" class="gc_flex">
                                    <div class="d-flex align-items-center justify-content-end">
                                        <a href="{{route('admin.edit.group',$group->id)}}"><i class="ri-edit-2-fill fs-20"></i></a>
                                        <a href="javascript:void(0);" data-id="{{ $group->id }}" class="ms-2 delete-btn"><i class="ri-delete-bin-fill fs-20"></i></a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
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
                    url : "{{route('delete.group', '')}}"+"/"+user_id,
                    type : 'GET',
                    dataType:'json',
                    success : function(data) {
                        Swal.fire({
                            title: 'Deleted!',
                            text: "Customer Group has been deleted.",
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
