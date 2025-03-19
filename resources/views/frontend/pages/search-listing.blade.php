@extends('frontend.layouts.app')



@section('style')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" type="text/css" media="all" />

@endsection



@section('content')

<section class="product_listing product_listing_outer_div">

    <div class="container-fluid p-0 product_listing_innerbanner" style="background-image: url('{{ URL::asset('assets/images/shop/shop-banner03.jpg') }}'); background-size: cover; background-position: center;">

     

    </div>

    <div class="container">

        <div class="product_listing_outer">

            

            <div class="search_product_listing_right">

                <div class="row row_product_listing my-4">

                    @if (!blank($products))

                        @foreach ($products as $product)

                            @if($product->price != '' || $product->price != 0 || $product->image != '')

                                <div class="col-lg-3 col-md-4 col-sm-6 col_product_listing product_listing_outer">

                                    <div class="product_listing_inner">

                                    <a href="{{route('product.details',$product->sku)}}" class=" text-center">

                                            <div class="product_listing_box">

                                                <?php

                                                    if($product->image_type == 1){

                                                        $product_image = URL::asset('products/'.$product->image);

                                                    }else{

                                                        if (substr($product->image, 0, 7) == "http://" || substr($product->image, 0, 8) == "https://") {

                                                            $product_image = $product->image;

                                                        }

                                                    }

                                                ?>

                                                <img src="{{$product_image}}" alt="" class="img-fluid">

                                                <p>{{$product->name}}</p>

                                                <h6>€ @if(isset($product->price)){{$product->price}} @else {{$product->special_price}} @endif</h6>

                                                <div class="artha-product-list-btn-outer">

                                                    <a href="{{route('product.details',$product->sku)}}" class="artha-product-list-btn">Discover</a>

                                                </div>

                                            </div>

                                        </a>

                                    </div>

                                        



                                </div>

                            @endif

                        @endforeach

                    @endif

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

                    <div class="pagination_right">

                        {!! $products->appends(request()->input())->links() !!}

                    </div>

                </div>

                

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

    $(document).on('click','.filter-btn',function(){

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

            url: "{{ route('products.search') }}",

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
		var sq = $('#inputSearch').val();


        var selectedCategories = [];

        $("input[name='chk[]']:checked").each(function() {

            selectedCategories.push($(this).val());

        });



        var selectedCollections = [];

        $("input[name='coll[]']:checked").each(function() {

            selectedCollections.push($(this).val());

        });



        $.ajax({

            type: 'GET',

            url: "{{ route('products.search') }}",

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

                'page': page, // Pass the current page number
				'query': sq
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



        $.ajax({

            type: 'GET',

            url: "{{ route('products.search') }}",

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

        $.ajax({

            type: 'GET',

            url: "{{ route('products.search') }}",

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

