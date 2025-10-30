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
                    @foreach ($wishlists as $wishlist)
                        <?php
                        $product = DB::table('products')->where('id', $wishlist->product_id)->first();
                        ?>
                        <div class="list-group-item d-flex align-items-center">
                            <?php
                            if (substr($product->image, 0, 7) == 'http://' || substr($product->image, 0, 8) == 'https://') {
                                $product_image = $product->image;
                            } else {
                                $product_image = URL::asset('products/' . $product->image);
                            }
                            ?>
                            <img src="{{ $product_image }}" alt="" class="img-fluid me-3" width="100">
                            <div class="flex-grow-1 bg-transparent">
                                <p class="bg-transparent">{{ $product->name }}</p>
                                <h5 class="bg-transparent">{{ $product->category }}</h5>
                                <p class="bg-transparent"><span class="bg-transparent">Size: {{ $product->size }}</span> |
                                    <span class="bg-transparent">Color: {{ $product->color }}</span>
                                </p>
                            </div>
                            <div class="remove-product-from-wishlist-btn bg-transparent">
                                <h5 class="ms-3 bg-transparent">${{ $product->price }}</h5>
                                <a href="javascript:void(0);"
                                    class="remove-btn-wishlist wishlist bg-transparent delete-item"
                                    data-id="{{ $wishlist->id }}"
                                    data-url="{{ route('delete.wishlist_item', $wishlist->id) }}"><i
                                    class="fa-solid fa-trash bg-transparent"></i>
                                </a>
                                {{-- <a href="javascript:void(0);" class="remove-btn-wishlist wishlist bg-transparent delete-item" data-id="{{$wishlist->id}}"><i
                                        class="fa-solid fa-trash bg-transparent"></i></a> --}}
                                {{-- <a href="javascript:void(0);" class="artha-product-list-btn wishlist delete-item" data-id="{{$wishlist->id}}"><i class="fa-solid fa-trash-can"></i>Remove</a> --}}
                            </div>
                        </div>
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $(document).on('click', '.submit_wishlist', function() {
                var name = $('#Name').val();
                if (name == '') {
                    $('.nameError').html('Please enter wishlist name.')
                }
                $.ajax({
                    url: "{{ route('wishlist.submit') }}",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        'name': name
                    },
                    type: 'POST',
                    dataType: 'json',
                    success: function(data) {
                        Swal.fire({
                            title: 'Submitted!',
                            text: "Wishlist items has been submitted successfully.",
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
            });

            // $(document).on('click','.delete-item',function(){
            //     var id = $(this).attr('data-id');
            //     Swal.fire({
            //         title: 'Are you sure?',
            //         text: "You won't be able to revert this!",
            //         icon: 'warning',
            //         showCancelButton: true,
            //         confirmButtonColor: '#3085d6',
            //         cancelButtonColor: '#d33',
            //         confirmButtonText: 'Yes, delete it!'
            //         }).then((result) => {
            //         if (result.isConfirmed) {
            //             $.ajax({
            //                 url : "{{ route('delete.wishlist_item', '') }}"+"/"+id,
            //                 type : 'GET',
            //                 dataType:'json',
            //                 success : function(data) {
            //                     Swal.fire({
            //                         title: 'Deleted!',
            //                         text: "Wishlist item has been deleted.",
            //                         icon: 'success',
            //                         showCancelButton: false,
            //                         confirmButtonColor: '#3085d6',
            //                         cancelButtonColor: '#d33',
            //                         confirmButtonText: 'Ok'
            //                         }).then((result) => {
            //                         if (result.isConfirmed) {
            //                             location.reload();
            //                         }
            //                     });
            //                 }
            //             });
            //         }
            //     });
            // });

        });
    </script>



    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
      $(document).ready(function() {
          $(document).on('click', '.delete-item', function() {
              var id = $(this).data('id');
              var url = $(this).data('url');
  
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
                      $.ajax({
                          url: url,
                          type: 'DELETE',
                          data: {
                              _token: '{{ csrf_token() }}'
                          },
                          success: function(response) {
                              Swal.fire('Deleted!', response.message, 'success').then(() => {
                                  location.reload();
                              });
                          },
                          error: function(xhr) {
                              Swal.fire('Error!', 'Something went wrong.', 'error');
                          }
                      });
                  }
              });
          });
      });
  </script>
@endsection
