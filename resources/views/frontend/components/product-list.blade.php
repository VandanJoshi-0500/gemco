<div class="container">
    <!-- Total Products Count -->
    <div class="row mb-3">
        <div class="col-12">
            <h5 class="text-muted">
                Showing {{ $products->total() }} {{ Str::plural('product', $products->total()) }}
            </h5>
        </div>
    </div>
    <!-- Product List -->

    <div class="row product-list-section d-flex align-items-center justify-content-start">
        @if (!blank($products))
            @foreach ($products as $product)
                @if ($product->price != '' || $product->price != 0 || $product->image != '')
                    <div class="col-md-3 mb-4 d-flex justify-content-center">
                        <div class="card product-card mx-auto">

                            <!-- Wishlist Icon -->
                            @if (auth()->user())
                                <?php $wishlist_link = route('add_to_wishlist', $product->id); ?>
                            @else
                                <?php $wishlist_link = route('user.login'); ?>
                            @endif
                            {{-- <a href="{{ route('add_to_wishlist', $product->id) }}">
                                <div class="wishlist-icon">
                                    <i class="fa-regular fa-heart"></i>
                                </div>
                            </a> --}}
                            <a href="javascript:void(0);" class="wishlist-icon ajax-wishlist-btn"
                                data-id="{{ $product->id }}">
                                <i class="fa-regular fa-heart"></i>
                            </a>
                            {{-- <a href="{{ route('add_to_wishlist', $product->id) }}"
                                class="btn btn-sm btn-outline-secondary">
                                <i class="fa fa-heart"></i> Add to Wishlist
                            </a> --}}

                            <!-- Carousel -->
                            <div id="productCarousel{{ $loop->index }}" class="carousel slide" data-bs-ride="carousel"
                                data-bs-interval="3000">
                                <div class="carousel-inner">
                                    @php
                                        $imageFields = ['image', 'image2', 'image3', 'image4', 'image5'];
                                        $imageIndex = 0;
                                    @endphp

                                    @foreach ($imageFields as $key => $field)
                                        @php
                                            $img = $product->$field;
                                            $product_image = '';

                                            if ($img) {
                                                if ($product->image_type == 1) {
                                                    $product_image = asset('products/' . $img);
                                                } elseif (Str::startsWith($img, 'http')) {
                                                    $product_image = $img;
                                                }
                                            }
                                        @endphp

                                        @if (!empty($product_image))
                                            <div class="carousel-item {{ $imageIndex === 0 ? 'active' : '' }}">
                                                <a href="{{ route('product.details', $product->sku) }}">
                                                    {{-- <img src="{{ $product_image }}"
                                                        class="card-img-top product-list-product-img p-2 bg-white image-fluid carousel-img"
                                                        alt=""> --}}
                                                    <img src="{{ $product_image }}"
                                                        class="card-img-top product-list-product-img p-2 bg-white image-fluid carousel-img lazyload"
                                                        alt="{{ $product->name }}" loading="lazy"
                                                        onerror="this.onerror=null; this.src='{{ asset('frontend/Assets/loading/loading.gif') }}';">
                                                </a>
                                            </div>
                                            @php $imageIndex++; @endphp
                                        @endif
                                    @endforeach
                                </div>

                                @if ($imageIndex > 1)
                                    <div class="carousel-controls">
                                        <button class="carousel-control-prev" type="button"
                                            data-bs-target="#productCarousel{{ $loop->index }}" data-bs-slide="prev">
                                            <img src="{{ url('frontend/Assets/Arrow/left.png') }}" width="30"
                                                height="30" alt="">
                                            {{-- <i class="fa-solid fa-arrow-left"></i> --}}
                                        </button>

                                        <button class="carousel-control-next" type="button"
                                            data-bs-target="#productCarousel{{ $loop->index }}" data-bs-slide="next">
                                            <img src="{{ url('frontend/Assets/Arrow/next.png') }}" width="30"
                                                height="30" alt="">
                                            {{-- <i class="fa-solid fa-arrow-right"></i> --}}
                                        </button>
                                    </div>
                                @endif
                            </div>

                            <!-- Card Body -->
                            <div class="card-body text-center ">
                                <h6 class="card-title">{{ $product->name }}</h6>
                                <p class="text-center product-list-title ">$
                                    {{ $product->price ?? $product->special_price }}</p>
                            </div>

                            <!-- Add to Cart Button -->
                            <a href="{{ route('product.details', $product->sku) }}" class="">
                                <button class="btn add-to-cart-btn">View Details</button>
                            </a>

                        </div>
                    </div>
                @endif
            @endforeach
        @endif
    </div>


    <div class="pagination-div my-5 d-flex align-items-center justify-content-center">
        {{ $products->appends(request()->except('page'))->links() }}
    </div>
