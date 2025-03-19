@extends('admin.layouts.app')

@section('content')
<div class="card">
    <div class="card-body card-head">
        <div class="d-md-flex gap-4 align-items-center">
            <div class="d-none d-md-flex">All Products</div>
            <div class="ms-auto d-flex arcon-user-inner-search-outer">
                <a href="#" class="btn btn-sm btn-primary align-items-center btn btn-primary btn-sm d-flex" data-bs-toggle="modal" data-bs-target="#kt_modal_bulk_import"
                                data-bs-toggle="modal"><i class="bi bi-plus-lg me-2"></i>
                                Bulk Import</a>
                <a href="{{ route('admin.add_product') }}" class="ms-2 btn gc_btn">
                    <i class="bi bi-plus"></i>
                    Add Product
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
                    <th>Name</th>
                    <th>SKU</th>
                    <th>Collection Name</th>
                    <th>Category Name</th>
                    <th>Price</th>
                    <th>Special Price</th>
                    <th>Tag Price</th>
                    <th>Quantity</th>
                    <th>Status</th>
                    <th class="text-end">Action</th>
                </tr>
            </thead>
            <tbody>
                @if (count($products) > 0)
                    @foreach ($products as $product)
                        <tr>
                            <td data-header="ID">{{$loop->index+1}}</td>
                            <td data-header="Name"><a href="{{ route('admin.edit_product',$product->id) }}" class="text-primary">{{$product->name}}</a></td>
                            <td data-header="Sku">{{$product->sku}}</td>
                            <td data-header="Collection Name">{{isset($product->collections) ? $product->collections->name :"-"}}</td>
                            <td data-header="Category Name">{{isset($product->categories) ? $product->categories->name :"-"}}</td>
                            <td data-header="Price">{{$product->price}}</td>
                            <td data-header="Special Price">{{$product->special_price}}</td>
                            <td data-header="Tag Price">{{$product->tag_price}}</td>
                            <td data-header="Quantity">{{$product->quantity_stock}}</td>
                            <td data-th="Status">
                                @if($product->status == 1)
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-danger">Deactive</span>
                                @endif
                            </td>
                            <!-- <td>{{ date($setting->date_format,strtotime($product->created_at)) }}</td> -->
                            <td data-th="Action" class="text-md-end">
                                <div class="d-flex float-end">
                                    <a href="{{ route('admin.edit_product',$product->id) }}" class=""><i class="ri-edit-2-fill fs-20"></i></a>
                                    <a href="javascript:void(0);" data-id="{{ $product->id }}" class="ms-2 delete-btn"><i class="ri-delete-bin-fill fs-20"></i></a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>
<div class="modal fade" id="kt_modal_bulk_import" tabindex="-1" aria-labelledby="depositLiquidityModalLabel"
            style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content overflow-hidden">
                    <div class="modal-header pb-0 border-0">
                        <h1 class="modal-title h4" id="depositLiquidityModalLabel">Import Products</h1>
                        <button type="reset" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form class="form" action="{{route('bulk-product-import')}}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="modal-body undefined">
                            <div class="vstack gap-1">
                                <div class="row align-items-center g-3 mt-6">
                                    <div class="col-md-2"><label class="form-label mb-0">Import Excel:</label></div>
                                    <div class="col-md-10 col-xl-10">
                                        <input type="file" name="import_file" class="form-control" id="import_file" required>
                                    </div>
                                </div>
                                <div class="row align-items-center g-3 mt-6">
                                    <a href="{{asset('assets/excel/Holiday Dummy Excel.xlsx')}}" download>Dummy File</a>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="reset" class="btn btn-neutral" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" id="submitBtn">Submit</button>
                        </div>
                    </form>
                </div>
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
                        url : "{{route('delete.product', '')}}"+"/"+user_id,
                        type : 'GET',
                        dataType:'json',
                        success : function(data) {
                            Swal.fire({
                                title: 'Deleted!',
                                text: "Product has been deleted.",
                                icon: 'success',
                                showCancelButton: false,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'Ok'
                                }).then((result) => {
                                if (result.isConfirmed) {
                                    top.location.href="{{ route('admin.products') }}";
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
