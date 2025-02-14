@extends('admin.layouts.app')

@section('content')
<div class="card">
    <div class="card-body card-head">
        <div class="d-md-flex gap-4 align-items-center">
            <div class="d-none d-md-flex">All Products</div>
        </div>
    </div>
</div>
<div class="card mt-3">
    <div class="card-body table-responsive">
        <table id="" class="table table-custom rwd-table example1" style="width:100%">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @if (count($wishlist_items) > 0)
                    @foreach ($wishlist_items as $wishlist)
                        <?php $product = DB::table('products')->where('id',$wishlist->product_id)->first(); ?>
                        <tr>
                            <td data-header="Image">
                                @if(!blank($product))
                                <?php
                                    if (substr($product->image, 0, 7) == "http://" || substr($product->image, 0, 8) == "https://") {
                                        $product_image = $product->image;
                                    }else{
                                        $product_image = URL::asset('products/'.$product->image);
                                    }
                                ?>
                                @endif
                                <img src="{{$product_image}}" alt="" width="100px">
                            </td>
                            <td data-header="Product Name">{{$product->name}}</td>
                            <td data-header="Price">
                                € {{$product->price}}
                            </td>
                            <td></td>
                        </tr>
                    @endforeach
                @else
                    <tr class="text-center">
                        <td colspan="4">Records Not Found.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection
