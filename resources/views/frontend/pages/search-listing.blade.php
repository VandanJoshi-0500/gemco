@extends('frontend.layouts.main')

@section('content')
    {{-- @include('frontend.components.dynamic-breadcrumb') --}}
    <div class="container-fluid AboutTitleBreadCrumps">
        <div class="row container bg-transparent">
            <div class="col-12 text-center bg-transparent">
                <h1 class=" bg-transparent">{{ ucfirst($query) ?? 'Search' }}</h1>
            </div>
            <!-- {{-- <div class="col-12 text-center mt-2 bg-transparent">
                <nav aria-label="breadcrumb" class="bg-transparent">
                    <ul class="breadcrumb justify-content-center bg-transparent">
                        <li class="breadcrumb-item bg-transparent"><a href="jewellery"
                                class="bg-transparent text-dark">Home</a>
                        </li>
                        <li class="breadcrumb-item bg-transparent" aria-current="page">Cart</li>
                    </ul>
                </nav>
            </div> --}} -->
        </div>
    </div>

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

                <!-- Sidebar Filter Form -->
                <form class="col-md-3 product-sidebar d-flex flex-column gap-4 p-4 ">
                    <!-- Sort By -->
                    <div class="product-category bg-transparent">
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
                    </div>

                    <!-- Collections -->
                    {{-- <div class="product-category bg-transparent">
                        <h4>Sort By Collections</h4>
                        <div class="form-check d-flex flex-column gap-2 mt-3 bg-transparent">
                            @foreach ($pro_collections as $pro_coll)
                                <label for="coll-{{ $pro_coll->id }}" class="form-check-label bg-transparent">
                                    <input id="coll-{{ $pro_coll->id }}" class="chk form-check-input me-2" name="coll[]"
                                        value="{{ $pro_coll->id }}" type="checkbox"> {{ $pro_coll->name }}
                                </label>
                            @endforeach
                        </div>
                    </div> --}}

                    <!-- Clear Button -->
                    {{-- <div class="fiter-clear-btn bg-transparent d-flex justify-content-start align-items-center">
                        <button type="reset" class="btn btn-outline-dark my-2" id="clear-filters">Clear Filters</button>
                    </div> --}}
                </form>

                <!-- Product List -->
                <div class="col-md-9 d-flex flex-column gap-3" id="product-list-wrapper">
                    @include('frontend.components.search-list')
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

        // function fetchProducts(page = 1) {
        //     let selectedCategories = getSelectedCategories();
        //     let selectedCollections = getSelectedCollections();
        //     currentSort = $("input[name='sort']:checked").val() || "newest";
        //     let query = "{{ request()->input('query', '') }}"; // Get query from initial request

        //     $.ajax({
        //         url: "{{ route('product.search') }}",
        //         type: "GET",
        //         data: {
        //             page: page,
        //             per_page: currentPerPage,
        //             chk: selectedCategories,
        //             coll: selectedCollections,
        //             sort: currentSort,
        //         },
        //         success: function(data) {
        //             $("#product-list-wrapper").html(data);
        //         },
        //         error: function(xhr) {
        //             console.error("AJAX error:", xhr.responseText);
        //         }
        //     });
        // }

        function fetchProducts(page = 1) {
        let selectedCategories = getSelectedCategories();
        let selectedCollections = getSelectedCollections();
        currentSort = $("input[name='sort']:checked").val() || "newest";
        let query = "{{ request()->input('query', '') }}"; // Get query from initial request

        $.ajax({
            url: "{{ route('product.search') }}",
            type: "GET",
            data: {
                page: page,
                per_page: currentPerPage,
                chk: selectedCategories,
                coll: selectedCollections,
                sort: currentSort,
                query: query // 👈 Include this
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
