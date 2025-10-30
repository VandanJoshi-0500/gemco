@extends('frontend.layouts.main')

@section('content')
    @include('frontend.components.dynamic-breadcrumb')

    <main>
        <div class="container-fluid d-flex align-items-center justify-content-center">
            <div class="container row py-5 d-flex align-items-start justify-content-between">
                <!-- Wishlist Feedback Modal -->
                <div class="modal fade" id="wishlistModal" tabindex="-1" aria-labelledby="wishlistModalLabel"
                    aria-hidden="true">
                    <div
                        class="modal-dialog modal-dialog-centered bg-transparent d-flex justify-content-center align-items-center">
                        <div class="modal-content text-center">
                            <div class="modal-header border-0 bg-transparent">
                                {{-- <h5 class="modal-title bg-transparent" id="wishlistModalLabel">Wishlist</h5> --}}
                                {{-- <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button> --}}
                            </div>
                            <div class="modal-body bg-transparent">
                                <!-- Add your GIF here -->
                                <img src="{{ asset('frontend/Assets/wishlist-popup/popup.gif') }}" alt="Added to Wishlist"
                                    class="img-fluid mb-3 bg-transparent" width="100" height="100"
                                    onerror="this.onerror=null;this.src='{{ asset('frontend/Assets/loading/loading.gif') }}';">
                                <p id="wishlistModalMessage" class="mb-0 text-center"></p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- SIDEBAR MOBILE -->
                <div class="offcanvas offcanvas-start sidebar-mobile-main-container" tabindex="-1" id="offcanvasExample"
                    aria-labelledby="offcanvasExampleLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasExampleLabel">Filter</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body filter-mobile-sidebar-scrolling">

                        <!-- Sort By -->
                        <div class="product-category bg-transparent">
                            <div class="form-check form-check-label d-flex flex-column gap-2 mt-3 bg-transparent">
                                <h4>Sort By</h4>
                                <label for="new-mob" class="bg-transparent sort-label">
                                    <input type="radio" id="new-mob" name="sort" value="newest"
                                        class="sort-option me-2" checked>
                                    New Arrival
                                </label>
                                <label for="high-mob" class="bg-transparent sort-label">
                                    <input type="radio" id="high-mob" name="sort" value="high"
                                        class="sort-option me-2">
                                    Price (High To Low)
                                </label>
                                <label for="low-mob" class="bg-transparent sort-label">
                                    <input type="radio" id="low-mob" name="sort" value="low"
                                        class="sort-option me-2">
                                    Price (Low To High)
                                </label>
                            </div>
                        </div>

                        <!-- Conditional Filter -->
                        @if (isset($type) && $type === 'collection')
                            <!-- Show category filters on collection pages -->
                            <div class="product-category bg-transparent">
                                <h4>Sort by Categories</h4>
                                <div class="form-check d-flex flex-column gap-2 mt-3 bg-transparent">
                                    @foreach ($pro_categories as $pro_cat)
                                        <label for="chk-mob-{{ $pro_cat->id }}" class="form-check-label bg-transparent">
                                            <input id="chk-mob-{{ $pro_cat->id }}" class="chk form-check-input me-2"
                                                name="chk[]" value="{{ $pro_cat->id }}" type="checkbox">
                                            {{ $pro_cat->name }}
                                        </label>
                                    @endforeach
                                </div>
                            </div>
                        @elseif (isset($type) && $type === 'category')
                            <!-- Show collection filters on category pages -->
                            <div class="product-category bg-transparent">
                                <h4>Sort by Collections</h4>
                                <div class="form-check d-flex flex-column gap-2 mt-3 bg-transparent">
                                    @foreach ($pro_collections as $pro_coll)
                                        <label for="coll-mob-{{ $pro_coll->id }}" class="form-check-label bg-transparent">
                                            <input id="coll-mob-{{ $pro_coll->id }}" class="chk form-check-input me-2"
                                                name="coll[]" value="{{ $pro_coll->id }}" type="checkbox">
                                            {{ $pro_coll->name }}
                                        </label>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        <!-- Clear Filters Button -->
                        <div class="fiter-clear-btn bg-transparent d-flex justify-content-start align-items-center">
                            <button type="reset" class="btn btn-outline-dark my-2" id="clear-filters">Clear
                                Filters</button>
                        </div>

                    </div>
                </div>

                {{-- <div class="offcanvas offcanvas-start sidebar-mobile-main-container" tabindex="-1" id="offcanvasExample"
                    aria-labelledby="offcanvasExampleLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasExampleLabel">Filter</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body filter-mobile-sidebar-scrolling">
                        <!-- Sort By -->
                        <!-- <div class="product-category bg-transparent">
                            <div class="form-check form-check-label d-flex flex-column gap-2 mt-3 bg-transparent">
                                <h4>Sort By</h4>
                                <label for="new" class="bg-transparent">
                                    <input type="radio" id="new" name="sort" value="newest" class="sort-option me-2"
                                        checked>
                                    New Arrival
                                </label>
                                <label for="high" class="bg-transparent">
                                    <input type="radio" id="high" name="sort" value="high" class="sort-option me-2">
                                    Price (High To Low)
                                </label>
                                <label for="low" class="bg-transparent">
                                    <input type="radio" id="low" name="sort" value="low" class="sort-option me-2">
                                    Price (Low To High)
                                </label>
                            </div>
                        </div> -->
                        <div class="product-category bg-transparent">
                            <div class="form-check form-check-label d-flex flex-column gap-2 mt-3 bg-transparent">
                                <h4>Sort By</h4>
                                <label for="new" class="bg-transparent sort-label">
                                    <input type="radio" id="new" name="sort" value="newest"
                                        class="sort-option me-2" checked>
                                    New Arrival
                                </label>
                                <label for="high" class="bg-transparent sort-label">
                                    <input type="radio" id="high" name="sort" value="high"
                                        class="sort-option me-2">
                                    Price (High To Low)
                                </label>
                                <label for="low" class="bg-transparent sort-label">
                                    <input type="radio" id="low" name="sort" value="low"
                                        class="sort-option me-2">
                                    Price (Low To High)
                                </label>
                            </div>
                        </div>


                        <!-- Collections -->
                        <!-- <div class="product-category bg-transparent">
                        <h4>Sort By Collections</h4>
                        <div class="form-check d-flex flex-column gap-2 mt-3 bg-transparent">
                            @foreach ($pro_collections as $pro_coll)
                                <label for="coll-{{ $pro_coll->id }}" class="form-check-label bg-transparent">
                                    <input id="coll-{{ $pro_coll->id }}" class="chk form-check-input me-2" name="coll[]"
                                        value="{{ $pro_coll->id }}" type="checkbox"> {{ $pro_coll->name }}
                                </label>
                            @endforeach
                        </div>
                    </div> -->

                        <!-- Clear Button -->
                        <div class="fiter-clear-btn bg-transparent d-flex justify-content-start align-items-center">
                            <button type="reset" class="btn btn-outline-dark my-2" id="clear-filters">Clear
                                Filters</button>
                        </div>
                    </div>
                </div> --}}


                <!-- Sidebar Filter Form for Desktop -->
                <form class="col-md-3 product-sidebar d-flex flex-column gap-4 p-4 ">
                    <!-- Sort By -->
                    <div class="product-category bg-transparent" id="SortbyFil">
                        <div class="form-check form-check-label d-flex flex-column gap-2 mt-3 bg-transparent">
                            <h4>Sort By</h4>
                            <label for="new" class="bg-transparent">
                                <input type="radio" id="new" name="sort" value="newest" class="sort-option me-2"
                                    checked>
                                New Arrival
                            </label>
                            <label for="high" class="bg-transparent">
                                <input type="radio" id="high" name="sort" value="high" class="sort-option me-2">
                                Price (High To Low)
                            </label>
                            <label for="low" class="bg-transparent">
                                <input type="radio" id="low" name="sort" value="low"
                                    class="sort-option me-2">
                                Price (Low To High)
                            </label>
                        </div>
                    </div>

                    <!-- Conditional Filters -->
                    @if (isset($type) && $type === 'collection')
                        <!-- Show category filter on collection page -->
                        <div class="product-category bg-transparent" id="SortbyCat">
                            <h4>Sort by Categories</h4>
                            {{-- @php
                                $visibleIndex = 0;
                            @endphp --}}
                            <div class="form-check d-flex flex-column gap-2 mt-3 bg-transparent">
                                {{-- @foreach ($pro_categories as $pro_cat)
                                    @if (!in_array($pro_cat->id, $excludedCategoryIds))
                                        <label for="coll-{{ $pro_cat->id }}"
                                            class="form-check-label bg-transparent {{ $visibleIndex >= 5 ? 'd-none more-category' : '' }}">
                                            <input class="chk form-check-input me-2" id="coll-{{ $pro_cat->id }}"
                                                name="coll[]" value="{{ $pro_cat->id }}" type="checkbox">
                                            {{ $pro_cat->name }}
                                        </label>
                                        @php $visibleIndex++; @endphp
                                    @endif
                                @endforeach

                                @if (count($pro_categories->whereNotIn('id', $excludedCategoryIds)) > 5)
                                    <button type="button" class="btn btn-link p-0 show-more-btn"
                                        data-target=".more-category" id='ShowMoreBtn'>Show More</button>
                                @endif --}}
                                @foreach ($pro_categories as $index => $pro_cat)
                                    <label for="chk-{{ $pro_cat->id }}"
                                        class="form-check-label bg-transparent {{ $index >= 5 ? 'd-none more-category' : '' }}">
                                        <input class="form-check-input me-2" id="chk-{{ $pro_cat->id }}" name="chk[]"
                                            value="{{ $pro_cat->id }}" type="checkbox">
                                        {{ $pro_cat->name }}
                                    </label>
                                @endforeach
                                @if (count($pro_categories) > 5)
                                    <button type="button" class="btn btn-link p-0 show-more-btn"
                                        data-target=".more-category" id='ShowMoreBtn'>Show More...</button>
                                @endif
                            </div>
                        </div>
                    @elseif (isset($type) && $type === 'category')
                        <!-- Show collection filter on category page -->
                        <div class="product-category bg-transparent" id="SortbyCol">
                            <h4>Sort by Collections</h4>
                            <div class="form-check d-flex flex-column gap-2 mt-3 bg-transparent">
                                @foreach ($pro_collections as $index => $pro_coll)
                                    <label for="coll-{{ $pro_coll->id }}"
                                        class="form-check-label bg-transparent {{ $index >= 5 ? 'd-none more-collection' : '' }}">
                                        <input class="chk form-check-input me-2" id="coll-{{ $pro_coll->id }}"
                                            name="coll[]" value="{{ $pro_coll->id }}" type="checkbox">
                                        {{ $pro_coll->name }}
                                    </label>
                                @endforeach

                                @if (count($pro_collections) > 5)
                                    <button type="button" class="btn btn-link p-0 show-more-btn"
                                        data-target=".more-collection" id='ShowMoreBtn'>Show More...</button>
                                @endif
                            </div>
                        </div>
                    @endif

                    <!-- Clear Filters -->
                    <div class="fiter-clear-btn bg-transparent d-flex justify-content-start align-items-center">
                        <button type="reset" class="btn btn-outline-dark my-2" id="clear-filters">Clear
                            Filters</button>
                    </div>
                </form>

                <!-- Product List -->
                <div class="col-md-9 d-flex flex-column gap-3" id="product-list-wrapper">
                    @include('frontend.components.slug')
                </div>

            </div>
        </div>
    </main>
@endsection

@section('script')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        let currentPerPage = "{{ request()->get('per_page', 12) }}";
        let currentSort = $("input[name='sort']:checked").val() || "newest";

        function getSelectedCategories() {
            let selected = [];
            $("input[id^='chk-']:checked").each(function() {
                selected.push($(this).val());
            });
            return selected;
        }

        function getSelectedCollections() {
            let selected = [];
            $("input[id^='coll-']:checked").each(function() {
                selected.push($(this).val());
            });
            return selected;
        }

        function fetchProducts(page = 1) {
            let selectedCategories = getSelectedCategories();
            let selectedCollections = getSelectedCollections();
            currentSort = $("input[name='sort']:checked").val() || "newest";

            $.ajax({
                url: "{{ route('view.by.slug', $slug) }}",
                type: "GET",
                data: {
                    page: page,
                    per_page: currentPerPage,
                    chk: selectedCategories,
                    coll: selectedCollections,
                    sort: currentSort,
                },
                success: function(data) {
                    $("#product-list-wrapper").html(data);
                },
                error: function(xhr) {
                    console.error("AJAX error:", xhr.responseText);
                }
            });
        }

        $(document).ready(function() {
            console.log("🔄 Product filter ready");

            // Filters (categories + collections)
            $(document).on("change", "input[type='checkbox']", function() {
                fetchProducts(1);
            });

            // Sort radio
            $(document).on("change", "input[name='sort']", function() {
                currentSort = $(this).val();
                fetchProducts(1);
            });

            // Pagination
            $(document).on("click", ".pagination-div a", function(e) {
                e.preventDefault();
                let url = new URL($(this).attr("href"), window.location.origin);
                let page = url.searchParams.get("page") || 1;
                fetchProducts(page);
            });

            // Clear Filters
            $(document).on("submit", ".product-sidebar", function(e) {
                e.preventDefault();
                $("input[type=checkbox]").prop("checked", false);
                $("input[name='sort'][value='newest']").prop("checked", true);
                fetchProducts(1);
            });
        });
    </script>
    <script>
        $(document).on("click", ".show-more-btn", function() {
            let targetClass = $(this).data("target");
            let hiddenItems = $(targetClass);

            if (hiddenItems.hasClass("d-none")) {
                hiddenItems.removeClass("d-none");
                $(this).text("Show Less");
            } else {
                hiddenItems.addClass("d-none");
                $(this).text("Show More");
            }
        });
    </script>
    <script>
        $(document).on('click', '.ajax-wishlist-btn', function(e) {
            e.preventDefault();

            let productId = $(this).data('id');
            let $icon = $(this).find('i');

            $.ajax({
                url: "{{ route('wishlist.add.ajax') }}",
                method: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    product_id: productId
                },
                success: function(response) {
                    if (response.status === 'success') {
                        // Update icon style
                        $icon.removeClass('fa-regular').addClass('fa-solid');

                        // Set modal message
                        $('#wishlistModalMessage').text(response.message);

                        // Show modal
                        let modal = new bootstrap.Modal(document.getElementById('wishlistModal'));
                        modal.show();
                        setTimeout(() => {
                            modal.hide();
                        }, 2500); // 2.5 seconds
                    }
                },
                error: function(xhr) {
                    let message = xhr.responseJSON?.message || "Something went wrong";
                    $('#wishlistModalMessage').text(message);

                    let modal = new bootstrap.Modal(document.getElementById('wishlistModal'));
                    modal.show();
                    setTimeout(() => {
                        modal.hide();
                    }, 2500);
                }
            });
        });
    </script>
@endsection
