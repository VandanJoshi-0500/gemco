@extends('frontend.layouts.main')
@section('content')
    <!-- Breadcrumps STARTS -->

    @include('frontend.components.dynamic-breadcrumb')

    <!-- Breadcrumps ENDS -->

    <!-- MAIN STARTS -->
    <main>

        <!-- PRODUCTS LISTING STARTS -->
        <div class="container-fluid d-flex align-items-center justify-content-center shop-page-main-container p-0">
            <div class="container row gap-5 py-5 shop-product-main-section">

                <!-- DESCKTOP SCREEN SIDEBAR STARTS-->
                <div class="shop-filter-section col-md-3 px-3 pt-3 pb-5 ">

                    {{-- Search Bar --}}
                    {{-- <div class="shop-search-section d-flex align-items-start justify-content-between">
                        <input type="search" id="category-search-box" placeholder="Search Categories"
                            class="form-control fs-6 fw-400">
                        <i class="fa-solid fa-magnifying-glass pt-3"></i>
                    </div> --}}


                    <!-- Sort By Genders -->
                    <div class="shop-filter-title">
                        <h3>Sort By Categories</h3>
                    </div>
                    <form id="filterFormDesktop" action="" class="shop-filter-form d-flex flex-column gap-3">
                        <div class="category-checkbox-list mb-3">
                            @foreach ($pro_categories as $pro_cat)
                                <div class="collection-checkbox form-check shop-filter-check-box-div gap-3">
                                    <input type="checkbox" id="chk-{{ $pro_cat->id }}" name="chk[]"
                                        class="chk form-check-input" value="{{ $pro_cat->id }}">
                                    <label class="form-check-label shop-filter-check-box-label"
                                        for="chk-{{ $pro_cat->id }}">{{ $pro_cat->name }}</label>
                                </div>
                            @endforeach
                        </div>


                        <!-- Sort By Genders -->
                        <div class="shop-filter-title">
                            <h3>Sort By Genders</h3>
                        </div>
                        <div class="category-checkbox-list mb-3">
                            @foreach ($genders as $gender)
                                <div class="collection-checkbox form-check shop-filter-check-box-div gap-3">
                                    <input type="checkbox" id="gender-chk-{{ $gender->id }}" name="gender_chk[]"
                                        class="gender-chk form-check-input" value="{{ $gender->id }}">
                                    <label class="form-check-label shop-filter-check-box-label"
                                        for="gender-chk-{{ $gender->id }}">{{ $gender->name }}</label>
                                </div>
                            @endforeach
                        </div>
                    </form>

                    {{-- Clear Filter --}}
                    <div class="shop-clear-filter-btn">
                        {{-- <a href="">Clear Filters</a> --}}
                        <a href="{{ route('all_product.details') }}">Clear Filters</a>
                    </div>
                </div>
                <!-- DESCKTOP SCREEN SIDEBAR ENDS-->


                <!-- SIDEBAR FOR MOBILE -->
                <div class="offcanvas offcanvas-start" data-bs-scroll="false" tabindex="-1" id="offcanvasWithBothOptions"
                    aria-labelledby="offcanvasWithBothOptionsLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">Filter</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body filter-mobile-sidebar-container">

                        {{-- SEARCHBAR --}}
                        {{-- <div class="filter-mobile-search">
                            <input type="search" placeholder="Search" id="category-search-box-mobile"
                                class="form-control mb-3">
                        </div> --}}

                        {{-- SORT BY CATEGORIES --}}
                        <div class="filter-mobile-title">
                            <h3>Sort by Categories</h3>
                        </div>
                        <div class="filter-mobile-sidebar-check-boxes">
                            <form id="filterFormMobile" action="">
                                <div class="mb-3 category-checkbox-list-mobile">
                                    @foreach ($pro_categories as $pro_cat)
                                        <div class="form-check">
                                            <input type="checkbox" id="chk-{{ $pro_cat->id }}" name="chk[]"
                                                class="chk form-check-input" value="{{ $pro_cat->id }}">
                                            <label class="form-check-label"
                                                for="chk-{{ $pro_cat->id }}">{{ $pro_cat->name }}</label>
                                        </div>
                                    @endforeach
                                </div>

                                <!-- Genders -->
                                <div class="filter-mobile-title">
                                    <h3>Gender</h3>
                                </div>
                                <div class="mb-3 category-checkbox-list-mobile">
                                    @foreach ($genders as $gender)
                                        <div class="form-check">
                                            <input type="checkbox" id="gender-chk-mobile-{{ $gender->id }}"
                                                name="gender_chk[]" class="gender-chk form-check-input"
                                                value="{{ $gender->id }}">
                                            <label class="form-check-label"
                                                for="gender-chk-mobile-{{ $gender->id }}">{{ $gender->name }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </form>
                        </div>
                        <div class="">
                            {{-- <a href="" class="filter-mobile-btn">Clear Filters</a> --}}
                            <a href="{{ route('all_product.details') }}">Clear Filters</a>
                        </div>
                    </div>
                </div>
                <!-- MOBILE SCREEN SIDEBAR ENDS -->

                <!-- toggle btn for filter -->
                <button class="btn filter-sidebar-menu-btn-mobile" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">
                    <i class="fa-solid fa-filter"></i>
                    Filter
                </button>


                <div class="shop-products-section col-md-8">
                    <div class="shop-products-result-section ">
                        <div class=" shop-available-products gap-2">
                            {{-- <p class="pt-3">Showing {{ $count }} results</p> --}}
                            <p class="pt-3" id="product-count-text">Showing {{ $count }} results</p>

                            <div class="d-flex align-items-center justify-content-center gap-2">
                                <div class="dropdown shop-shoing-product-dropdown">

                                    {{-- show per page dropdown --}}
                                    @php
                                        $perPageSelected = request()->get('per_page', 8);
                                    @endphp
                                    <button class="btn dropdown-toggle" type="button" id="showing-products-dropdown"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        {{ $perPageSelected }} Products
                                    </button>

                                    <ul class="dropdown-menu" aria-labelledby="showing-products-dropdown"
                                        id="productsPerPage">
                                        <li><a class="dropdown-item per-page-option" href="#" data-value="8">8
                                                Products</a></li>
                                        <li><a class="dropdown-item per-page-option" href="#" data-value="16">16
                                                Products</a></li>
                                        <li><a class="dropdown-item per-page-option" href="#" data-value="32">32
                                                Products</a></li>
                                        <li><a class="dropdown-item per-page-option" href="#" data-value="64">64
                                                Products</a></li>
                                    </ul>
                                </div>

                                {{-- sort by dropdown --}}
                                <div class="dropdown shop-shoing-product-dropdown">
                                    <button class="btn dropdown-toggle" type="button" id="short-by-products-dropdown1"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        Newest First
                                    </button>

                                    <ul class="dropdown-menu" aria-labelledby="short-by-products-dropdown1">
                                        <li><a class="dropdown-item1" href="#">Newest First</a></li>
                                        <li><a class="dropdown-item1" href="#">Oldest First</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        {{-- products fetching --}}
                        <div class="row my-5" id="product-list">
                            @if (!blank($products))
                                @foreach ($products as $product)
                                    @if ($product->image1 != '')
                                        <div
                                            class="col-lg-3 col-md-6 col-sm-6 shop-products-item d-flex align-items-center justify-content-center gap-3 flex-column shop-items">
                                            <?php

                                            if ($product->image_type == 1) {
                                                $product_image = URL::asset('products/' . $product->image1);
                                            } else {
                                                if (substr($product->image1, 0, 7) == 'http://' || substr($product->image1, 0, 8) == 'https://') {
                                                    $product_image = $product->image1;
                                                }
                                            }

                                            ?>
                                            <div class="shop-products-item-img">
                                                <a href="{{ route('product.details', $product->sku) }}">
                                                    <img src="{{ $product_image }}" alt="Product" class="img-fluid">
                                                </a>
                                            </div>

                                            <div
                                                class="shop-products-item-content d-flex align-items-center justify-content-center flex-column ">
                                                <p>{{ $product->name }}</p>
                                                <h5>{{ $product->sku }}</h5>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            @endif
                        </div>
                    </div>

                    {{-- Pagination --}}
                    <div class="shop-product-pagination-container my-5 d-flex align-items-center justify-content-center">
                        <div class="pagination-div">
                            {{ $products->links() }}
                            {{-- {{ $prod = collect()}} --}}

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- PRODUCTS LISTING ENDS -->
    </main>
    <!-- MAIN ENDS -->
@endsection

@section('script')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        // Initialize variables for items per page and sorting option from request parameters or default values
        let currentPerPage = "{{ request()->get('per_page', 8) }}";
        let currentSort = "{{ request()->get('sort', 'newest') }}";

        // Function to get all selected categories from checkbox inputs
        function getSelectedCategories() {
            let selected = [];
            $('input[type=checkbox].chk:checked').each(function() {
                selected.push($(this).val()); // Collect checked category values
            });
            return selected;
        }


        function getSelectedGenders() {
            let selectedGenders = [];
            $('input[type=checkbox].gender-chk:checked').each(function() {
                selectedGenders.push($(this).val());
            });
            return selectedGenders;
        }

        function fetchProducts(page = 1) {
            let selectedCategories = getSelectedCategories();
            let selectedGenders = getSelectedGenders();

            $.ajax({
                url: "{{ route('viewcollection','baguette%20jewelry') }}",
                type: "GET",
                data: {
                    page: page,
                    per_page: currentPerPage,
                    chk: selectedCategories,
                    gender_chk: selectedGenders,
                    sort: currentSort
                },
                success: function(data) {
                    $('#product-list').html($(data).find('#product-list').html());
                    $('.pagination-div').html($(data).find('.pagination-div').html());
                    $('#product-count-text').text($(data).find('#product-count-text').text());
                    $('#showing-products-dropdown').text(currentPerPage + ' Products');

                    // Update URL
                    // let params = new URLSearchParams();
                    // params.append('page', page);
                    // params.append('per_page', currentPerPage);
                    // params.append('sort', currentSort);
                    // selectedCategories.forEach(cat => params.append('chk[]', cat));
                    // selectedGenders.forEach(g => params.append('gender_chk[]', g));
                    // window.history.pushState({}, '', '?' + params.toString());
                },
                error: function(xhr) {
                    console.error('AJAX error:', xhr.responseText);
                }
            });
        }

        // Initialize all event listeners once the DOM is ready
        $(document).ready(function() {
            console.log('🔄 Product filter script ready');

            // Trigger AJAX fetch when a category checkbox is changed
            $(document).on('change', 'input.chk, input.gender-chk', function() {
                fetchProducts(1);
            });

            // Handle products per page dropdown click
            $(document).on('click', '.per-page-option', function(e) {
                e.preventDefault();
                currentPerPage = $(this).data('value'); // Update value from data attribute
                fetchProducts(1); // Refresh product list
            });

            // Handle pagination click
            $(document).on('click', '.pagination-div a', function(e) {

                e.preventDefault();
                let url = new URL($(this).attr('href'), window.location.origin);
                let page = url.searchParams.get('page') || 1;
                fetchProducts(page); // Fetch the selected page
            });

            // Clear all selected filters when "Clear Filters" button is clicked
            $('.shop-clear-filter-btn a').on('click', function(e) {
                e.preventDefault();
                $('input[type=checkbox].chk, input[type=checkbox].gender-chk').prop('checked', false);
                fetchProducts(1);
            });

            // Handle sorting dropdown (e.g. Newest First or Oldest First)
            $(document).on('click', '.dropdown-item1', function(e) {
                e.preventDefault();
                let selectedText = $(this).text().trim(); // Get selected sort option text

                // Update sorting label in UI
                $('#short-by-products-dropdown1').text(selectedText);

                // Update sort order based on user selection
                if (selectedText === 'Newest First') {
                    currentSort = 'newest';
                } else if (selectedText === 'Oldest First') {
                    currentSort = 'oldest';
                }

                // Delay fetch slightly to ensure updated sort value is used
                setTimeout(() => {
                    fetchProducts(1); // Refresh product list
                }, 50);
            });
        });

        // live search box filter for desktop
        // $('#category-search-box').on('keyup', function() {
        //     let keyword = $(this).val().toLowerCase();

        //     $('.category-checkbox-list .collection-checkbox').each(function() {
        //         let labelText = $(this).find('label').text().toLowerCase();

        //         if (labelText.includes(keyword)) {
        //             $(this).show(); // Show matching category
        //         } else {
        //             $(this).hide(); // Hide non-matching category
        //         }
        //     });
        // });

        // // live search box filter for mobile
        // $('#category-search-box-mobile').on('keyup', function() {
        //     let keyword = $(this).val().toLowerCase();

        //     $('.category-checkbox-list-mobile .form-check').each(function() {
        //         let labelText = $(this).find('label').text().toLowerCase();

        //         if (labelText.includes(keyword)) {
        //             $(this).show();
        //         } else {
        //             $(this).hide();
        //         }
        //     });
        // });
    </script>
@endsection
