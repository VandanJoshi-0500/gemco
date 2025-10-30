@extends('frontend.layouts.app')



@section('style')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" type="text/css" media="all" />

@endsection



@section('content')

<section class="product_listing product_listing_outer_div">

    <div class="container-fluid p-0 product_listing_innerbanner test" style="background-image: url('{{ (substr($collection->image, 0, 7) == 'http://' || substr($collection->image, 0, 7) == 'https://' ? $collection->image : URL::asset('collection/' . $collection->image)) }}'); background-size: cover; background-position: center;">



    </div>

    <div class="container">

        <div class="product_listing_outer">

            <div class="product_listing_left">

                <form id="filterForm">

                    <div class="">

                        <h5 class="mt-3"> Sort By</h5>

                            <div class="my-3">

                                <input type="radio" id="new" name="selection" value="new" class="selection" checked>

                                <label for="new">New Arrival</label><br>

                                <input type="radio" id="high" name="selection" value="high" class="selection">

                                <label for="high">Price (High To Low)</label><br>

                                <input type="radio" id="low" name="selection" value="low" class="selection">

                                <label for="low">Price (Low To High)</label>

                            </div>



                        {{-- <h5 class=""> Sort By Metal Type</h5>

                        <div class="my-3">

                            <input type="checkbox" id="collection11" name="Gold" class="collection">

                            <label for="collection11">Gold Jewelry</label><br>

                            <input type="checkbox" id="collection12" name="Silver" class="collection">

                            <label for="collection12">Gold & Silver Jewelry</label><br>

                        </div> --}}

                        @if(isset($category))

                            <input type="hidden" name="page_type" class="page_type" value="category">

                            <input type="hidden" name="id" class="id" value="{{$category->id}}">

                            <input type="hidden" name="slug" class="slug" value="{{$category->slug}}">

                        @else

                            <input type="hidden" name="page_type" class="page_type" value="collection">

                            <input type="hidden" name="id" class="id" value="{{$collection->id}}">

                            <input type="hidden" name="slug" class="slug" value="{{$collection->slug}}">

                        @endif

                    </div>

                </form>

            </div>

            <div class="product_listing_right">

                <div class="banner d-none">

                    @if(isset($category))

                        <?php

                            if (substr($category->image, 0, 7) == "http://" || substr($category->image, 0, 8) == "https://") {

                                $category_image = $category->image;

                            }else{

                                $category_image = URL::asset('categories/'.$category->image);

                            }

                        ?>

                        <img src="{{$category_image}}" alt="" class="img-fluid">

                    @else

                        <?php

                            if (substr($collection->image, 0, 7) == "http://" || substr($collection->image, 0, 8) == "https://") {

                                $collection_image = $collection->image;

                            }else{

                                $collection_image = URL::asset('categories/'.$collection->image);

                            }

                        ?>

                        <img src="{{$collection_image}}" alt="" class="img-fluid">

                        {{-- <img src="{{url('/')}}/front/images/product_listing_banner.jpg" alt="" class="img-fluid"> --}}

                    @endif

                </div>

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

                                                <h6>€ {{$product->price}}</h6>

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

                <div class="product_listing_pagination">

                    <div class="pagination_left">

                        <p>Show Per Page</p>

                        <select name="per_page" id="per_page" class="mx-3">

                            <option value="24">24</option>

                            <option value="48">48</option>

                            <option value="96">96</option>

                            <option value="1000">1000</option>

                          </select>

                        <p>Total Products <span class="count"> {{$count}}</span></p>

                    </div>

                    <div class="pagination_right">

                        {!! $products->links() !!}

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

            // $("#slider-range").val(0);

            // $("#slider-range").slider('value',0);

            // $("#slider-range").trigger('change');

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

            url: "{{route('show_page','artha','empid')}}".replace('empid', slug),

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

    $(document).on('change','#per_page',function(){

        var selection = $('input[name="selection"]:checked').val();

        var page_type = $('.page_type').val();

        var slug = $('.slug').val();

        var id = $('.id').val();

        var per_page = $(this).val();

        var min_price = $('#min_price').val();

        var max_price = $('#max_price').val();

        var above_price = 0;

        if($('#price_above').prop('checked')){

            var above_price = 1;

            // $("#slider-range").val(0);

            // $("#slider-range").slider('value',0);

            // $("#slider-range").trigger('change');

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

            url: "{{route('show_page','artha','empid')}}".replace('empid', slug),

            data: { "_token": "{{ csrf_token() }}",'sort_by': selection,'page_type': page_type,'id':id,'checkbox':chk,'per_page':per_page,'min_price':min_price,'max_price':max_price,'aboce_price':above_price},

            success: function (data) {

                $('.row_product_listing').html(data.products);

                $('.pagination_right').html(data.links);

                $('.count').html(data.count);

            },

            error: function (data) {

            }

        });

    });

    $(document).on('change','.chk',function(){

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

            // $("#slider-range").val(0);

            // $("#slider-range").slider('value',0);

            // $("#slider-range").trigger('change');

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

            url: "{{route('show_page','artha','empid')}}".replace('empid', slug),

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

    $(document).on('change','#price_above',function(){

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

            url: "{{route('show_page','artha','empid')}}".replace('empid', slug),

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

            // $("#slider-range").val(0);

            // $("#slider-range").slider('value',0);

            // $("#slider-range").trigger('change');

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

            url: "{{route('show_page','artha','empid')}}".replace('empid', slug),

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

