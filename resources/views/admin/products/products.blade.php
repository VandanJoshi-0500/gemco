@extends('admin.layouts.app')

@section('content')
    <div class="card">
        <div class="card-body card-head">
            <div class="d-md-flex gap-4 align-items-center">
                <div class="d-none d-md-flex">All Products</div>

                <div class="ms-auto d-flex arcon-user-inner-search-outer">
                    {{-- Search (handled by DataTables now, optional UI only) --}}
                    {{-- <input type="text" id="product-search" class="form-control form-control-sm me-2"
                        placeholder="Search by name or SKU"> --}}

                    {{-- Bulk Import --}}
                    <a href="{{ route('admin.products.import.form') }}" class="ms-2 btn btn-primary">
                        <i class="bi bi-plus"></i> Bulk Import
                    </a>

                    {{-- Add Product --}}
                    <a href="{{ route('admin.add_product') }}" class="ms-2 btn gc_btn">
                        <i class="bi bi-plus"></i> Add Product
                    </a>
                </div>
            </div>
        </div>
    </div>

    {{-- Products Table --}}
    <div class="card mt-3">
        <div class="card-body table-responsive">
            <table id="product-table" class="table table-custom rwd-table example1" style="width:100%">
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
            </table>
        </div>
    </div>

    {{-- Import Modal --}}
    {{-- <div class="modal fade" id="kt_modal_bulk_import" tabindex="-1" aria-labelledby="depositLiquidityModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content overflow-hidden">
                <div class="modal-header pb-0 border-0">
                    <h1 class="modal-title h4" id="depositLiquidityModalLabel">Import Products</h1>
                    <button type="reset" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="form" action="{{ route('bulk-product-import') }}" enctype="multipart/form-data"
                    method="POST">
                    @csrf
                    <div class="modal-body undefined">
                        <div class="vstack gap-1">
                            <div class="row align-items-center g-3 mt-6">
                                <div class="col-md-2"><label class="form-label mb-0">Import Excel:</label></div>
                                <div class="col-md-10 col-xl-10">
                                    <input type="file" name="import_file" class="form-control" required>
                                </div>
                            </div>
                            <div class="row align-items-center g-3 mt-6">
                                <a href="{{ asset('assets/excel/Holiday Dummy Excel.xlsx') }}" download>Download Dummy
                                    File</a>
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
    </div> --}}
@endsection

@section('script')
    {{-- DataTables --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

    {{-- SweetAlert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function() {
        let table = $('#product-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('admin.products.data') }}",
                data: function(d) {
                    d.custom_search = $('#product-search').val(); // custom search box (optional)
                }
            },
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'name', name: 'name' },
                { data: 'sku', name: 'sku' },
                { data: 'collection_name', name: 'collection_name' }, // This is your virtual column
                { data: 'category_name', name: 'category_name' },     // This is your virtual column
                { data: 'price', name: 'price' },
                { data: 'special_price', name: 'special_price' },
                { data: 'tag_price', name: 'tag_price' },
                { data: 'quantity_stock', name: 'quantity_stock' },
                { data: 'status', name: 'status', orderable: false, searchable: false },
                { data: 'action', name: 'action', orderable: false, searchable: false }
            ]
        });

        // Custom search trigger (optional)
        $('#product-search').on('keyup', function() {
            table.draw();
        });
    });

        $(document).on('click', '.delete-btn', function() {
            let id = $(this).data('id');
            let url = "{{ url('/admin/products/delete') }}/" + id;

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
                        url: url,
                        type: 'GET', // Ideally should be DELETE with CSRF, but this matches your route for now
                        success: function(response) {
                            Swal.fire(
                                'Deleted!',
                                'The product has been deleted.',
                                'success'
                            );
                            $('#product-table').DataTable().ajax.reload(); // reload DataTables
                        },
                        error: function(xhr) {
                            Swal.fire(
                                'Error!',
                                'Something went wrong while deleting.',
                                'error'
                            );
                        }
                    });
                }
            });
        });
    </script>
@endsection
