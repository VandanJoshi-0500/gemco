@extends('frontend.layouts.account')

@section('css')
    <link rel="stylesheet" href="{{ url('frontend/css/style.css') }}">
@endsection

@section('content')
    <div class="col-md-9 p-4 my-dashboard-right-container">
        <h4 class="page-main-title">Wishlist</h4>
        <hr>
        @if (blank($wishlists))
            <h4 class="page-main-title text-center p-3">You have no items in your wishlist.</h4>

            {{-- <h5>You have no items in your wishlist.</h5> --}}
        @else
            <div class="row bg-transparent mt-4">
                <div class="list-group mb-4 bg-transparent gap-5 d-flex flex-column">
                    @foreach ($wishlists as $index => $wishlist)
                        {{-- @php
                        $product = DB::table('products')->where('id', $wishlist->product_id)->first();
                        @endphp --}}
                        <?php
                        // $product = DB::table('products')->where('id', $wishlist->product_id)->first();
                        $product = DB::table('products')->leftJoin('categories', 'products.category', '=', 'categories.id')->where('products.id', $wishlist->product_id)->select('products.*', 'categories.name as category_name')->first();
                        $wishlistId = isset($wishlist->id) ? $wishlist->id : $wishlist->product_id;
                        $isGuest = isset($wishlist->is_guest) && $wishlist->is_guest;
                        // $wishlistId = $wishlist->id ?? $index;
                        // $isGuest = isset($wishlist->is_guest) && $wishlist->is_guest;
                        ?>

                        @if ($product)
                            <?php
                            if (substr($product->image, 0, 7) == 'http://' || substr($product->image, 0, 8) == 'https://') {
                                $product_image = $product->image;
                            } else {
                                $product_image = URL::asset('products/' . $product->image);
                            }
                            ?>
                            <div class="list-group-item d-flex align-items-center" id="wishlist-item-{{ $wishlistId }}">
                                <img src="{{ $product_image }}" alt="" class="img-fluid me-3" width="100">
                                <div class="flex-grow-1 bg-transparent">
                                    <p class="bg-transparent">{{ $product->name }}</p>
                                    <h5 class="bg-transparent">{{ $product->category_name ?? 'N/A' }}</h5>
                                    <p class="bg-transparent">
                                        <span class="bg-transparent">Size: {{ $product->size }}</span> |
                                        <span class="bg-transparent">Color: {{ $product->color }}</span>
                                    </p>
                                </div>
                                <div class="view-product-from-wishlist-btn bg-transparent">
                                    <h5 class="ms-3 bg-transparent">${{ $product->price }}</h5>
                                    <a href="{{ route('product.details', $product->sku) }}"  class=" bg-transparent">
                                        <i class="fa-solid fa-eye bg-transparent"></i>
                                    </a>
                                    <a href="javascript:void(0);"
                                        class="remove-btn-wishlist wishlist bg-transparent delete-item"
                                        data-id="{{ $wishlistId }}"
                                        data-url="{{ route('delete.wishlist_item', $wishlistId) }}"
                                        data-guest="{{ $isGuest ? '1' : '0' }}">
                                        <i class="fa-solid fa-trash bg-transparent"></i>
                                    </a>
                                    {{-- <a href="javascript:void(0);"
                                        class="remove-btn-wishlist wishlist bg-transparent delete-item"
                                        data-id="{{ $wishlist->id }}"
                                        data-url="{{ route('delete.wishlist_item', $wishlist->id) }}">
                                        <i class="fa-solid fa-trash bg-transparent"></i>
                                    </a> --}}
                                </div>
                            </div>
                        @else
                            <div class="list-group-item d-flex align-items-center" id="wishlist-item-{{ $wishlist->id }}">
                                <div class="flex-grow-1 bg-transparent">
                                    <p class="text-danger">Product no longer exists.</p>
                                </div>
                                <div class="remove-product-from-wishlist-btn bg-transparent">
                                    <a href="javascript:void(0);" class="remove-btn-wishlist wishlist delete-item" 
                                        data-id="{{ $wishlistId }}"
                                        data-url="{{ route('delete.wishlist_item', $wishlistId) }}"
                                        data-guest="{{ $isGuest ? '1' : '0' }}">
                                        <i class="fa-solid fa-trash"></i>
                                    </a>
                                    {{-- <a href="javascript:void(0);"
                                        class="remove-btn-wishlist wishlist bg-transparent delete-item"
                                        data-id="{{ $wishlist->id }}"
                                        data-url="{{ route('delete.wishlist_item', $wishlist->id) }}">
                                        <i class="fa-solid fa-trash bg-transparent"></i>
                                    </a> --}}
                                </div>
                            </div>
                        @endif
                    @endforeach


                    {{-- <div class="list-group-item d-flex align-items-center">
                    <img src="{{ url('frontend/Assets/ProductListIMGs/GoldRing.png') }}" alt=""
                        class="img-fluid me-3" width="100">
                    <div class="flex-grow-1 bg-transparent">
                        <p class="bg-transparent">Romantic Florals</p>
                        <h5 class="bg-transparent">Aquamarine Earrings</h5>
                        <p class="bg-transparent"><span class="bg-transparent">Size: XL</span> | <span
                                class="bg-transparent">Color: Gray</span></p>
                    </div>
                    <div class="remove-product-from-wishlist-btn bg-transparent">
                        <h5 class="ms-3 bg-transparent">$39.99</h5>
                        <a href="" class="remove-btn-wishlist bg-transparent"><i
                                class="fa-solid fa-trash bg-transparent"></i></a>
                    </div>
                </div> --}}

                </div>
            </div>
        @endif
    </div>
@endsection
@section('script')
    @section('script')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).on('click', '.delete-item', function () {
            var id = $(this).data('id');
            var url = $(this).data('url');
            var isGuest = $(this).data('guest') === 1 || $(this).data('guest') === '1';

            Swal.fire({
                title: 'Are you sure?',
                text: "This item will be removed from your wishlist.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#b09842',
                cancelButtonColor: '#ccc',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Show custom loader
                    Swal.fire({
                        title: 'Deleting...',
                        html: '<img src="https://i.gifer.com/ZZ5H.gif" width="100" alt="Loading...">',
                        showConfirmButton: false,
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                        backdrop: true
                    });

                    $.ajax({
                        url: url,
                        type: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            _method: 'DELETE',
                            guest: isGuest ? 1 : 0
                        },
                        success: function (response) {
                            $('#wishlist-item-' + id).remove();

                            // If no items left, show empty message
                            if ($('.list-group-item').length === 0) {
                                $('.list-group').html(
                                    '<h4 class="page-main-title text-center p-3">You have no items in your wishlist.</h4>'
                                );
                            }

                            // Close the loading popup silently
                            Swal.close();
                        },
                        error: function () {
                            Swal.fire('Error!', 'Something went wrong.', 'error');
                        }
                    });
                }
            });
        });
    </script>
@endsection
@endsection
