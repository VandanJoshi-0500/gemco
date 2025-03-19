@extends('admin.layouts.app')

@section('content')
<div class="card">
    <div class="card-body card-head">
        <div class="d-md-flex gap-4 align-items-center">
            <div class="d-none d-md-flex"><h5 class="mb-0">All Pages</h5></div>
            <div class="ms-auto d-flex arcon-user-inner-search-outer">
                <a href="{{ route('admin.add.page') }}" class="ms-2 btn gc_btn">
                    <i class="bi bi-plus"></i>
                    Add New Page
                </a>
            </div>
        </div>
    </div>
</div>
<div class="card mt-3">
    <div class="card-body table-responsive">
        <table id="" class="table table-custom rwd-table example1" style="width:100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Page Title</th>
                    <th>Slug / Identifier</th>
                    <th>Status</th>
                    <th>Created At</th>
                    <th>Last Modified</th>
                    <th class="text-end">Action</th>
                </tr>
            </thead>
            <tbody>
                @if (count($pages) > 0)
                    @foreach ($pages as $page1)
                        <tr>
                            <td data-header="ID">{{$loop->index+1}}</td>
                            <td data-header="Page Title"><a href="{{ route('admin.edit_page',$page1->id) }}" class="text-primary">{{$page1->page_title}}</a></td>
                            <td data-header="Slug">{{$page1->slug}}</td>
                            <td data-th="Status">
                                @if($page1->status == 1)
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-danger">Deactive</span>
                                @endif
                            </td>
                            <td>{{ date($setting->date_format,strtotime($page1->created_at)) }}</td>
                            <td>{{ date($setting->date_format,strtotime($page1->updated_at)) }}</td>
                            <td data-th="Action" class="text-md-end">
                                <div class="d-flex float-end">
                                    <a href="{{ route('admin.edit_page',$page1->id) }}" class=""><i class="ri-edit-2-fill fs-20"></i></a>
                                    <a href="javascript:void(0);" data-id="{{ $page1->id }}" class="ms-2 delete-btn"><i class="ri-delete-bin-fill fs-20"></i></a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>
<!-- <div class='pagination-container'>
    <nav class="mt-4" aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
    </ul>
    </nav>
</div> -->
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
                        url : "{{route('delete.page', '')}}"+"/"+user_id,
                        type : 'GET',
                        dataType:'json',
                        success : function(data) {
                            Swal.fire({
                                title: 'Deleted!',
                                text: "Page has been deleted.",
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
    $('.example1').DataTable();
</script>
@endsection
