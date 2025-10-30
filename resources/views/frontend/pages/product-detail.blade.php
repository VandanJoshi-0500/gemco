@extends('frontend.layouts.app')

@section('content')
    <!-- ..........ABOUT TITLE AND BREADCRUMPS.......... -->
    <div class="container-fluid AboutTitleBreadCrumps">
        <div class="row container-fluid bg-transparent">
            {{-- <div class="col-12 text-center bg-transparent d-flex align-items-center justify-content-center z-2">
                <h1 class="bg-transparent BreadCrumpText ">Collection</h1>
            </div> --}}
            {{-- <div class="col-12 text-center mt-2 bg-transparent">
                <nav aria-label="breadcrumb" class="bg-transparent">
                    <ul class="breadcrumb justify-content-center bg-transparent">
                        <li class="breadcrumb-item bg-transparent">
                            <a href="{{ url('/home') }}" class="bg-transparent text-dark">Home</a>
                        </li>
                        <li class="breadcrumb-item bg-transparent" aria-current="page">Collection</li>
                    </ul>
                </nav>
            </div> --}}
        </div>
    </div>
    <div class="AboutTitleBreadCrumps position-relative">
        @php
            $imageUrl =
                isset($image) && $image ? asset($image) : asset('frontend/Assets/ProductListIMGs/ProductList.png');
        @endphp

        <div class="breadcrumb-image mb-3 d-flex align-items-center justify-content-center">
            <img src="{{ $imageUrl }}" alt="Breadcrumb Image" class="img-fluid">
            <div class="col-12 text-center bg-transparent d-flex align-items-center justify-content-center z-2 position-absolute">
                <h1 class="bg-transparent BreadCrumpText ">Collection</h1>
            </div>
        </div>
    </div>
    <!-- ..........ABOUT TITLE AND BREADCRUMPS END.......... -->

    <section class="product_detailing">
        <div class="container">
            <div class="product_detailing_outer">

                <!-- PRODUCT PAGE LEFT SIDE -->
                <div class="product-detail-left-side col-md-6">
                    <div class="container d-flex justify-content-start product-detail-left-side-mobile">

                        @php
                            $imageFields = ['image', 'image2', 'image3', 'image4'];
                        @endphp

                        <div class="col-md-3 d-flex flex-column gap-1 product-sub-imgs">
                            @foreach ($imageFields as $index => $field)
                                @if (!blank($product->$field))
                                    <div class="tech-wood-items">
                                        <a href="#"
                                            class="d-flex align-items-center justify-content-center left-side-img {{ $index == 0 ? 'active' : '' }}">
                                            <img src="{{ $product->$field }}" alt="Image {{ $index + 1 }}"
                                                class="img-fluid" data-src="{{ $product->$field }}">
                                        </a>
                                    </div>
                                @endif
                            @endforeach
                        </div>

                        <div class="col-md-9">
                            <div class="main-image-container">
                                <img id="main-image" src="{{ $product->image }}" alt="Product Image">
                            </div>
                        </div>

                    </div>
                </div>

                <!-- PRODUCT PAGE RIGHT SIDE -->
                <div class="col-12 col-md-6" id="product-info-section">
                    <h2 id="product-title">{{ $product->name }}</h2>
                    <h3 id="product-price" class="">$ {{ number_format($product->price ?? 0, 2) }}
                    </h3>

                    <h3 id="additional-info-heading" class="mt-4">Additional Information</h3>
                    <div class="table-responsive">
                        <table id="product-info-table" class="table table-bordered">
                            <tr>
                                <td class="">SKU :</td>
                                <td>{{ $product->sku ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <td class="">Color :</td>
                                {{-- <td>{{ $product->color ?? 'N/A' }}</td> --}}
                                <td>
                                    @if (is_null($product->color))
                                        -
                                    @elseif ($product->color === '')
                                        -
                                    @else
                                        {{ $product->color }}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="">HSN Code :</td>
                                {{-- <td>{{ $product->hsn_code ?? 'N/A' }}</td> --}}
                                <td>
                                    @if (is_null($product->hsn_code))
                                        -
                                    @elseif ($product->hsn_code === '')
                                        -
                                    @else
                                        {{ $product->hsn_code }}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="">Category :</td>
                                {{-- <td>{{ $product->category ?? 'N/A' }}</td> --}}
                                {{-- <td>{{ $product->categories->name ?? 'N/A' }}</td> --}}
                                <td>
                                    @if (is_null($product->categories->name))
                                        -
                                    @elseif ($product->categories->name === '')
                                        -
                                    @else
                                        {{ $product->categories->name }}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="">Collection :</td>
                                {{-- <td>{{ $product->collection ?? 'N/A' }}</td> --}}
                                {{-- <td>{{ $product->collections->name ?? 'N/A' }}</td> --}}
                                <td>
                                    @if (is_null($product->collections->name))
                                        -
                                    @elseif ($product->collections->name === '')
                                        -
                                    @else
                                        {{ $product->collections->name }}
                                    @endif
                                </td>
                            </tr>
                        </table>
                    </div>

                    @if (auth()->user())
                        @php $wishlist_link = route('add_to_wishlist', $product->id); @endphp
                    @else
                        @php $wishlist_link = route('user.login'); @endphp
                    @endif
                    {{-- <div class="artha-product-list-btn-outer bg-transparent">
                        <a href="{{ $wishlist_link }}" class="artha-product-list-btn"><i
                                class="fa-regular fa-heart bg-transparent me-3"></i>Add to wishlist</a>
                    </div> --}}
                    <button id="wishlist-button" class="btn btn-outline-danger mt-3">
                        <a href="{{ route('add_to_wishlist', $product->id) }}"><i
                                class="fa-regular fa-heart bg-transparent me-3"></i>Add to wishlist</a>

                        {{-- <i class="fa-regular fa-heart bg-transparent me-3"></i> Add To Wishlist --}}
                    </button>
                </div>
                {{-- <div class="product_detail_right col-md-6">
                     <div class="product_detail_right_inr">
                        <!-- <h3>₹ {{ $product->price }}.00</h3> -->
                        <div class="container">
                            <div class="card p-4 border-0 rounded">
                                <h2 class="mb-3 fw-bold bg-transparent text-uppercase text-dark">{{ $product->name }}</h2>
                                <h3 class=" bg-transparent">₹ {{ $product->price }}.00</h3>
                                <hr />

                                <div class="row bg-transparent">
                                    <div class="col-md-6 bg-transparent mt-3">
                                        @if (!blank($product->sku))
                                            <p><strong class="bg-transparent">SKU : </strong>{{ $product->sku }}</p>
                                        @endif
                                        @if (!blank($product->color))
                                            <p><strong class="bg-transparent">Color :</strong> {{ $product->color }}</p>
                                        @endif
                                        @if (!blank($product->size))
                                            <p><strong class="bg-transparent">Size :</strong> {{ $product->size }}</p>
                                        @endif
                                        @if (!blank($product->gold_weight))
                                            <p class=""><strong class="bg-transparent">Gold Weight :</strong>
                                                {{ $product->gold_weight }} GM</p>
                                        @endif
                                        @if (!blank($product->silver_weight))
                                            <p class="text-muted"><strong class="bg-transparent">Silver Weight :</strong>
                                                {{ $product->silver_weight }} GM</p>
                                        @endif
                                    </div>
                                    <div class="col-md-6 bg-transparent mt-3">
                                        @if (!blank($product->diamond_weight))
                                            <p class=""><strong class="bg-transparent">Diamond Weight :</strong>
                                                {{ $product->diamond_weight }} Ct.</p>
                                        @endif
                                        @if (!blank($product->diamond_grade))
                                            <p><strong class="bg-transparent">Diamond Grade :</strong>
                                                {{ $product->diamond_grade }}</p>
                                        @endif
                                        @if (!blank($product->hsn_code))
                                            <p><strong class="bg-transparent">HSN Code :</strong> {{ $product->hsn_code }}
                                            </p>
                                        @endif
                                        @if ($product->category)
                                            <p><strong class="bg-transparent">Category :</strong>
                                                {{ $product->categories->name }}</p>
                                        @endif
                                        @if ($product->collections)
                                            <p><strong class="bg-transparent">Collection :</strong>
                                                {{ $product->collections->name }}</p>
                                        @endif
                                    </div>
                                </div>
                                @if (auth()->user())
                                    @php $wishlist_link = route('add_to_wishlist', $product->id); @endphp
                                @else
                                    @php $wishlist_link = route('user.login'); @endphp
                                @endif
                                <hr />
                                <div class="artha-product-list-btn-outer bg-transparent">
                                    <a href="{{ $wishlist_link }}" class="artha-product-list-btn"><i class="fa-regular fa-heart bg-transparent me-3"></i>Add to wishlist</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </section>
@endsection



@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const thumbnails = document.querySelectorAll('.left-side-img img');
            const mainImage = document.getElementById('main-image');

            thumbnails.forEach(thumb => {
                thumb.addEventListener('click', function(e) {
                    e.preventDefault();
                    mainImage.src = this.dataset.src;
                    document.querySelectorAll('.left-side-img').forEach(el => el.classList.remove(
                        'active'));
                    this.closest('.left-side-img').classList.add('active');
                });
            });
        });
    </script>
@endsection
