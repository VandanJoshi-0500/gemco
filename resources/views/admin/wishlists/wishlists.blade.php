@extends('admin.layouts.app')

@section('content')
<div class="card">
    <div class="card-body card-head">
        <div class="d-md-flex gap-4 align-items-center">
            <div class="d-none d-md-flex">All Records</div>
        </div>
    </div>
</div>
<div class="card mt-3">
    <div class="card-body table-responsive">
        <table id="" class="table table-custom rwd-table example1" style="width:100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Wishlist Name</th>
                    <th>Customer Name</th>
                    <th>Status</th>
                    <th>Created At</th>
                    <th class="text-end">Action</th>
                </tr>
            </thead>
            {{-- <tbody>
                @if (count($wishlists) > 0)
                    @foreach ($wishlists as $wishlist)
                        <tr>
                            <td data-header="ID">{{$loop->index+1}}</td>
                            <td data-header="Wishlist Name"><a href="{{ route('admin.view_wishlist',$wishlist->id) }}" class="text-primary">{{$wishlist->name}}</a></td>
                            <td data-header="Customer Name">
                                @if(!blank($wishlist->user_id))
                                    <?php $customer = DB::table('users')->where('id',$wishlist->user_id)->first(); ?>
                                    {{$customer->name}}
                                @endif
                            </td>
                            <td data-th="Status">
                                @if($wishlist->status == 1)
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-danger">Deactive</span>
                                @endif
                            </td>
                            <td>{{ date($setting->date_format,strtotime($wishlist->created_at)) }}</td>
                            <td data-th="Action" class="text-md-end">
                                <div class="d-flex float-end">
                                    <a href="{{ route('admin.view_wishlist',$wishlist->id) }}" class="btn btn-primary">View</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr class="text-center">
                        <td colspan="6">Records Not Found.</td>
                    </tr>
                @endif
            </tbody> --}}
        </table>
    </div>
</div>
@endsection
