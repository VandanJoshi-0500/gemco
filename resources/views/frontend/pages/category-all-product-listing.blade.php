@extends('frontend.layouts.app')


@section('style')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" type="text/css" media="all" />

@endsection



@section('content')

<section class="product_listing product_listing_outer_div">

    <!-- ..........ABOUT TITLE AND BREADCRUMPS.......... -->
    <div class="container-fluid AboutTitleBreadCrumps">
        <div class="row container bg-transparent">
            <div class="col-12 text-center bg-transparent">
                <h1 class=" bg-transparent">Category</h1>
            </div>
            <div class="col-12 text-center mt-2 bg-transparent">
                <nav aria-label="breadcrumb" class="bg-transparent">
                    <ul class="breadcrumb justify-content-center bg-transparent">
                        <li class="breadcrumb-item bg-transparent"><a href="{{url('/home')}}" class="bg-transparent text-dark">Home</a>
                        </li>
                        {{-- <li class="breadcrumb-item bg-transparent"><a href="#"
                                class="bg-transparent text-dark">Pages</a>
                        </li> --}}
                        <li class="breadcrumb-item bg-transparent" aria-current="page">Category</li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <!-- ..........ABOUT TITLE AND BREADCRUMPS END.......... -->



    </div>

    {{-- <div class="container">

        <div class="product_listing_outer"> --}}
    <div class="container-fluid d-flex align-items-center justify-content-center">
        <div class="container row py-5 d-flex align-items-start justify-content-between">

            <form class="col-md-3 product-sidebar d-flex flex-column gap-4 p-4 ">
                <!-- Search Bar -->
                <div class="product-search position-relative bg-transparent">
                    <input type="text" class="form-control ps-4 bg-transparent " placeholder="Search...">
                    <i class="fa fa-search position-absolute top-50 start-0 translate-middle-y mt-2 text-muted bg-transparent"></i>
                </div>

                {{-- sort by  --}}
                <div class="product-category bg-transparent">

                    <h4>Sort By</h4>
                    <div class="form-check form-check-label d-flex flex-column gap-2 mt-3 bg-transparent">

                        <label for="new" class=" bg-transparent">
                        <input type="radio" id="new" name="selection" value="new" class="selection me-2" checked>New Arrival
                        </label>

                        <label for="high" class=" bg-transparent">
                        <input type="radio" id="high" name="selection" value="high" class="selection me-2">Price (High To Low)
                        </label>

                        <label for="low" class=" bg-transparent">
                        <input type="radio" id="low" name="selection" value="low" class="selection me-2">Price (Low To High)
                        </label>

                    </div>

                </div>

                <!-- Collections -->
                <div class="product-category bg-transparent">
                    <h4>Sort By Collections</h4>
                    <div class="form-check d-flex flex-column gap-2 mt-3 bg-transparent">

                        @foreach($pro_collections as $pro_coll)

                                <label for="coll-{{ $pro_coll->id }}" class="form-check-label bg-transparent"><input id="coll-{{ $pro_coll->id }}" class="chk form-check-input me-2" name="coll[]" value="{{ $pro_coll->id }}" type="checkbox"> {{ $pro_coll->name }}</label>

                        @endforeach
                    </div>
                </div>

                  <!-- Clear Button -->
                  <div class="fiter-clear-btn bg-transparent d-flex justify-content-start align-items-center">
                    <button type="submit" class="btn btn-outline-dark my-2">Clear Filters</button>
                </div>
            </form>


            <div class="col-md-9 d-flex flex-column gap-3">

                <div class="container">
                    <div class="row product-list-section d-flex g-4 align-items-start justify-content-between">
                        @if (!blank($products))
                            @foreach ($products as $product)
                                @if($product->price != '' || $product->price != 0 || $product->image != '')
                                    <div class="col-md-4 mb-2 ">
                                        <div class="card border-0 shadow-sm position-relative bg-white">
                                            <?php
                                                if($product->image_type == 1){
                                                    $product_image = URL::asset('products/'.$product->image);
                                                }else{
                                                    if (substr($product->image, 0, 7) == "http://" || substr($product->image, 0, 8) == "https://") {
                                                        $product_image = $product->image;
                                                    }
                                                }
                                            ?>

                                            <img src="{{$product_image}}" class="card-img-top product-list-product-img p-2 bg-white image-fluid" alt="">
                                            <div class="card-body text-center">
                                                <p class="text-center product-list-title"> {{$product->name}}</p>
                                                <h5>$ @if(isset($product->price)){{$product->price}} @else {{$product->special_price}} @endif</h5>
                                                <div class="d-flex gap-2 mt-3 product-list-btns d-flex justify-content-around">
                                                    <a class="btn send-enquiry">Send Enquiry</a>
                                                    <a class="btn quick-view" href='{{route('product.details',$product->sku)}}'>Discover </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="product_listing_pagination shop_navigation_outer">

                    <div class="pagination_left">

                        <p>Show Per Page</p>

                        <select name="per_page" id="per_page" class="mx-3">

                            <option value="24">24</option>

                            <option value="48">48</option>

                            <option value="96">96</option>

                            <option value="1000">1000</option>

                        </select>

                        <p>Total Products <span class="count">{{ $count }}</span></p>

                    </div>

                    {{-- <div class="pagination_right">

                        {!! $products->appends(request()->input())->links() !!}

                    </div> --}}
                    <div class="pagination-container">
                        <ul class="pagination justify-content-center">
                            {!! $products->appends(request()->input())->links() !!}
                        </ul>
                    </div>


                </div>

                {{-- <div class="container">
                        <nav>

                            <ul class="pagination d-flex justify-content-center gap-3">
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Previous">
                                        <span aria-hidden="true" class="bg-transparent">&laquo;</span>
                                    </a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">4</a></li>
                                <li class="page-item"><a class="page-link" href="#">5</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Previous">
                                        <span aria-hidden="true" class="bg-transparent">&raquo;</span>
                                    </a>
                                </li>
                            </ul>

                        </nav>
                    </div> --}}


            </div>

        </div>

    </div>

</section>

@endsection

@section('script')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" type="text/javascript"></script>

<script>

    $(document).on('change','.range-slider__slider--from',function(){

        console.log($(this).val());

    })

    $(document).on('click','nav a', function(e){

      e.preventDefault();

      let page = $(this).attr('href').split('page=')[1]

      record(page)

    })

    function record(page){

        var selection = $('input[name="selection"]:checked').val();

        var page_type = $('.page_type').val();

        var slug = $('.slug').val();

        var id = $('.id').val();

        var per_page = $('#per_page').val();

        var min_price = $('#min_price').val();

        var max_price = $('#max_price').val();

        var above_price = 0;

        if($('#price_above').prop('checked')){

            var above_price = 1;

            $("#min_price").val(0);

		    $("#max_price").val(10000);

        }else{

            var above_price = 0;

            $("#min_price").val(0);

		    $("#max_price").val(10000);

        }

        var chk = [];

            $("input:checkbox[name=chk]:checked").each(function(){

                chk.push($(this).val());

            });

            $.ajax({

                type: 'GET',

                url: '/artha/'+slug+'?page='+page,

                data: { "_token": "{{ csrf_token() }}",'sort_by': selection,'page_type': page_type,'id':id,'checkbox':chk,'per_page':per_page,'min_price':min_price,'max_price':max_price,'above_price':above_price},

                success: function (data) {

                    $('.row_product_listing').html(data.products);

                    $('.pagination_right').html(data.links)

                    $('.count').html(data.count);

                },

                error: function (data) {

                }

            });

    }

    /*$(document).on('click','.filter-btn',function(){

        var selection = $('input[name="selection"]:checked').val();

        var page_type = $('.page_type').val();

        var slug = $('.slug').val();

        var id = $('.id').val();

        var per_page = $('#per_page').val();

        var min_price = $('#min_price').val();

        var max_price = $('#max_price').val();

        var above_price = 0;

        $('input[name=price_above]').prop('checked',false);

        var chk = [];

        $("input:checkbox[name=chk]:checked").each(function(){

            chk.push($(this).val());

        });

        $.ajax({

            type: 'GET',

            url: "{{ route('all_product.details') }}",

            data: { "_token": "{{ csrf_token() }}",'sort_by': selection,'page_type': page_type,'id':id,'checkbox':chk,'per_page':per_page,'min_price':min_price,'max_price':max_price,'above_price':above_price},

            success: function (data) {

                $('.row_product_listing').html(data.products);

                $('.pagination_right').html(data.links);

                $('.count').html(data.count);

            },

            error: function (data) {

            }

        });

    }); */

    $(document).on('change', '#per_page', function() {

        fetchProducts(1); // Fetch products for the first page when per_page changes

    });



    $(document).on('click', '.pagination_right a', function(e) {

        e.preventDefault();

        var page = $(this).attr('href').split('page=')[1];

        fetchProducts(page);

    });



    function fetchProducts(page) {

        var selection = $('input[name="selection"]:checked').val();

        var page_type = $('.page_type').val();

        var slug = $('.slug').val();

        var id = $('.id').val();

        var per_page = $('#per_page').val();

        var min_price = $('#min_price').val();

        var max_price = $('#max_price').val();

        var above_price = $('#price_above').prop('checked') ? 1 : 0;



        var selectedCategories = [];

        $("input[name='chk[]']:checked").each(function() {

            selectedCategories.push($(this).val());

        });



        var selectedCollections = [];

        $("input[name='coll[]']:checked").each(function() {

            selectedCollections.push($(this).val());

        });

        let currentUrl = window.location.href;

        // Extract the category ID from the URL using regex
        let slugMatch = currentUrl.match(/category\/([a-zA-Z0-9-_]+)/);
        let categorySlug = slugMatch[1];

        $.ajax({

            type: 'GET',

             url: "{{ url('category') }}/" + categorySlug,
            data: {

                "_token": "{{ csrf_token() }}",

                'sort_by': selection,

                'page_type': page_type,

                'id': id,

                'categories': selectedCategories,

                'collections': selectedCollections,

                'per_page': per_page,

                'min_price': min_price,

                'max_price': max_price,

                'above_price': above_price,

                'page': page // Pass the current page number

            },

            success: function(data) {

                $('.row_product_listing').html(data.products);

                $('.pagination_right').html(data.links);

                $('.count').html(data.count);

            },

            error: function(data) {

                console.error("Error:", data);

            }

        });

    }



    $(document).on('change', '.chk, #price_above', function() {

        var selection = $('input[name="selection"]:checked').val();

        var page_type = $('.page_type').val();

        var slug = $('.slug').val();

        var id = $('.id').val();

        var per_page = $('#per_page').val();

        var min_price = $('#min_price').val();

        var max_price = $('#max_price').val();

        var above_price = $('#price_above').prop('checked') ? 1 : 0;



        // Get selected categories

        var selectedCategories = [];

        $("input[name='chk[]']:checked").each(function() {

            selectedCategories.push($(this).val());

        });



        // Get selected collections (if you use a different name for collection checkboxes, update this selector accordingly)

        var selectedCollections = [];

        $("input[name='coll[]']:checked").each(function() {

            selectedCollections.push($(this).val());

        });

        let currentUrl = window.location.href;

        // Extract the category ID from the URL using regex
        let slugMatch = currentUrl.match(/category\/([a-zA-Z0-9-_]+)/);
        let categorySlug = slugMatch[1];

        $.ajax({

            type: 'GET',

             url: "{{ url('category') }}/" + categorySlug,

            data: {

                "_token": "{{ csrf_token() }}",

                'sort_by': selection,

                'page_type': page_type,

                'id': id,

                'categories': selectedCategories,

                'collections': selectedCollections,

                'per_page': per_page,

                'min_price': min_price,

                'max_price': max_price,

                'above_price': above_price

            },

            success: function(data) {

                $('.row_product_listing').html(data.products);

                $('.pagination_right').html(data.links);

                $('.count').html(data.count);

            },

            error: function(data) {

                console.error("Error:", data);

            }

        });

    });



    $(document).on('change','.selection',function(){

        var selection = $(this).val();

        var page_type = $('.page_type').val();

        var slug = $('.slug').val();

        var per_page = $('#per_page').val();

        var min_price = $('#min_price').val();

        var max_price = $('#max_price').val();

        var above_price = 0;

        if($('#price_above').prop('checked')){

            var above_price = 1;

            $("#min_price").val(0);

		    $("#max_price").val(10000);

        }else{

            var above_price = 0;

            $("#min_price").val(0);

		    $("#max_price").val(10000);

        }

       var chk = [];

       $("input:checkbox[name=chk]:checked").each(function(){

            chk.push($(this).val());

        });

       var id = $('.id').val();

       let currentUrl = window.location.href;

        // Extract the category ID from the URL using regex
        let slugMatch = currentUrl.match(/category\/([a-zA-Z0-9-_]+)/);
        let categorySlug = slugMatch[1];

        $.ajax({

            type: 'GET',

             url: "{{ url('category') }}/" + categorySlug,

            data: { "_token": "{{ csrf_token() }}",'sort_by': selection,'page_type': page_type,'id':id,'checkbox':chk,'per_page':per_page,'min_price':min_price,'max_price':max_price,'above_price':above_price},

            success: function (data) {

                $('.row_product_listing').html(data.products);

                $('.pagination_right').html(data.links);

                $('.count').html(data.count);

            },

            error: function (data) {

            }

        });

    });

    (function ($) {



    $('#price-range-submit').hide();



	$(function () {

	  $("#slider-range").slider({

		range: true,

		orientation: "horizontal",

		min: 0,

		max: 10000,

		values: [0, 10000],

		step: 100,



		slide: function (event, ui) {

            if (ui.values[0] == ui.values[1]) {

                return false;

            }



            $("#min_price").val(ui.values[0]);

            $("#max_price").val(ui.values[1]);



            $('.slider-from').text(ui.values[0]);

            $('.slider-to').text(ui.values[1]);

		}

	  });



        $("#min_price").val($("#slider-range").slider("values", 0));

        $("#max_price").val($("#slider-range").slider("values", 1));

        $('.slider-from').text($("#slider-range").slider("values", 0));

        $('.slider-to').text($("#slider-range").slider("values", 1));



	});





})(jQuery);

</script>

@endsection

