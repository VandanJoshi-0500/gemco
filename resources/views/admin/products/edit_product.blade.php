@extends('admin.layouts.app')

@section('content')
    <div class="gc_row">
        <div class="card mt-md-3 mb-3">
            <div class="card-body d-flex align-items-center p-lg-3 p-2 staff_header">
                <div class="pe-4 fs-5">Edit Product</div>
                <div class="ms-auto">
                    <a href="{{ route('admin.products') }}" class="btn gc_btn">Go Back</a>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.update.product') }}" method="post" enctype="multipart/form-data"
                    class="row g-3">
                    @csrf
                    <div class="col-md-6">
                        <label for="Name" class="form-label">Product Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="name" id="Name"
                            value="{{ $product->name }}" placeholder="" />
                        @if ($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <label for="Sku" class="form-label">Product SKU <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="sku" id="Sku" value="{{ $product->sku }}"
                            placeholder="" />
                        @if ($errors->has('sku'))
                            <span class="text-danger">{{ $errors->first('sku') }}</span>
                        @endif
                    </div>

                    {{-- ----------------------------------------------- --}}
                    <div class="col-md-6">
                        <label for="Color" class="form-label">Color</label>
                        <input type="text" class="form-control" name="color" id="Color"
                            value="{{ $product->color }}" placeholder="" />
                        @if ($errors->has('color'))
                            <span class="text-danger">{{ $errors->first('color') }}</span>
                        @endif
                    </div>

                    <div class="col-md-6 ">
                        <label for="Size" class="form-label">Size</label>
                        <input type="text" class="form-control" name="size" id="Size"
                            value="{{ $product->size }}" placeholder="" />
                        @if ($errors->has('size'))
                            <span class="text-danger">{{ $errors->first('size') }}</span>
                        @endif
                    </div>

                    <div class="col-md-6 ">
                        <label for="Hsncode" class="form-label">Hsn_Code</label>
                        <input type="text" class="form-control" name="hsn_code" id="Hsncode"
                            value="{{ $product->hsn_code }}" placeholder="" />
                        @if ($errors->has('hsn_code'))
                            <span class="text-danger">{{ $errors->first('hsn_code') }}</span>
                        @endif
                    </div>

                    <div class="col-md-6 ">
                        <label for="Category" class="form-label">Category <span class="text-danger">*</span></label>
                        <select class="form-control" name="category" id="Category">
                            <option value="0">Select Category</option>
                            @if (count($parent_categories) > 0)
                                @foreach ($parent_categories as $item)
                                    <?php
                                    $childs = DB::table('categories')->where('parent', $item->id)->get();
                                    ?>
                                    @if (count($childs) > 0)
                                        <optgroup label="{{ $item->name }}">
                                            @foreach ($childs as $child)
                                                <option value="{{ $child->id }}"
                                                    {{ $product->category == $child->id ? 'selected' : '' }}>
                                                    {{ $child->name }}</option>
                                            @endforeach
                                        </optgroup>
                                    @else
                                        <option value="{{ $item->id }}"
                                            {{ $product->category == $item->id ? 'selected' : '' }}>{{ $item->name }}
                                        </option>
                                    @endif
                                @endforeach
                            @endif
                        </select>
                        @if ($errors->has('category'))
                            <span class="text-danger">{{ $errors->first('category') }}</span>
                        @endif
                    </div>

                    {{-- subcat section remaining --}}
                    <div class="col-md-6">
                        <label for="Collection" class="form-label">Subcategory</label>
                        <select class="form-control" name="subcategory" id="Subcategory">
                            <option value="0">Select Subcategory</option>
                            @if (count($subcategories) > 0)
                                @foreach ($subcategories as $subcategory)
                                    <option value="{{ $subcategory->id }}" {{$product->subcategory == $subcategory->id ? 'selected' : ''}}>{{ $subcategory->name }}</option>
                                @endforeach
                            @endif
                        </select>
                        @if ($errors->has('subcategory'))
                            <span class="text-danger">{{ $errors->first('subcategory') }}</span>
                        @endif
                    </div>

                    <div class="col-md-6 ">
                        <label for="Collection" class="form-label">Collection</label>
                        <select class="form-control" name="collection" id="Collection">
                            <option value="0">Select Collection</option>
                            @if (!blank($collections))
                                @foreach ($collections as $collection)
                                    <option value="{{ $collection->id }}"
                                        {{ $product->collection == $collection->id ? 'selected' : '' }}>
                                        {{ $collection->name }}</option>
                                @endforeach
                            @endif
                        </select>
                        @if ($errors->has('collection'))
                            <span class="text-danger">{{ $errors->first('collection') }}</span>
                        @endif
                    </div>

                    {{-- sub Collection1 reminaing --}}
                    {{-- sub Collection2 reminaing --}}
                    <div class="col-md-6">
                        <label for="SecoundaryCollection1" class="form-label">Secondary Collection 1</label>
                        <select class="form-control" name="secoundary_collection_1" id="SecoundaryCollection1">
                            <option value="0">Select Secondary Collection 1</option>
                            @if (count($secoundary_collections_1) > 0)
                                @foreach ($secoundary_collections_1 as $secoundary_collection_1)
                                    <option value="{{ $secoundary_collection_1->id }}" {{$product->secoundary_collection_1 == $secoundary_collection_1->id ? 'selected' : ''}}>{{ $secoundary_collection_1->secoundary_collection_1 }}</option>
                                @endforeach
                            @endif
                        </select>
                        @if ($errors->has('secoundary_collection_1'))
                            <span class="text-danger">{{ $errors->first('secoundary_collection_1') }}</span>
                        @endif
                    </div>

                    <div class="col-md-6">
                        <label for="SecoundaryCollection2" class="form-label">Secondary Collection 2</label>
                        <select class="form-control" name="secoundary_collection_2" id="SecoundaryCollection2">
                            <option value="0">Select Secondary Collection 2</option>
                            @if (count($secoundary_collections_2) > 0)
                                @foreach ($secoundary_collections_2 as $secoundary_collection_2)
                                    <option value="{{ $secoundary_collection_2->id }}" {{$product->secoundary_collection_2 == $secoundary_collection_2->id ? 'selected' : ''}}>{{ $secoundary_collection_2->secoundary_collection_2 }}</option>
                                @endforeach
                            @endif
                        </select>
                        @if ($errors->has('secoundary_collection_2'))
                            <span class="text-danger">{{ $errors->first('secoundary_collection_2') }}</span>
                        @endif
                    </div>

                    <div class="col-md-6">
                        <label for="Price" class="form-label">Price <span class="text-danger">*</span></label>
                        <input type="number" class="form-control" name="price" id="Price"
                            value="{{ $product->price }}" placeholder="" />
                        @if ($errors->has('price'))
                            <span class="text-danger">{{ $errors->first('price') }}</span>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <label for="specialPrice" class="form-label">Special Price</label>
                        <input type="number" class="form-control" name="special_price" id="specialPrice"
                            value="{{ $product->special_price }}" placeholder="" />
                        @if ($errors->has('special_price'))
                            <span class="text-danger">{{ $errors->first('special_price') }}</span>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <label for="tagPrice" class="form-label">Tag Price</label>
                        <input type="number" class="form-control" name="tag_price" id="tagPrice"
                            value="{{ $product->tag_price }}" placeholder="" />
                        @if ($errors->has('tag_price'))
                            <span class="text-danger">{{ $errors->first('tag_price') }}</span>
                        @endif
                    </div>

                    <div class="col-md-6">
                        <label for="stockQuantity" class="form-label">Quantity In Stock</label>
                        <input type="number" class="form-control" name="quantity_stock" min="0"
                            id="stockQuantity" value="{{ $product->quantity_stock }}" placeholder="" />
                        @if ($errors->has('quantity_stock'))
                            <span class="text-danger">{{ $errors->first('quantity_stock') }}</span>
                        @endif
                    </div>

                    <div class="col-md-6">
                        <label for="Goldweight" class="form-label">Gold Weight</label>
                        <input type="text" class="form-control" name="gold_weight" id="Goldweight"
                            value="{{ $product->gold_weight }}" placeholder="" />
                        @if ($errors->has('gold_weight'))
                            <span class="text-danger">{{ $errors->first('gold_weight') }}</span>
                        @endif
                    </div>

                    <div class="col-md-6">
                        <label for="Silverweight" class="form-label">Silver Weight</label>
                        <input type="text" class="form-control" name="silver_weight" id="Silverweight"
                            value="{{ $product->silver_weight }}" placeholder="" />
                        @if ($errors->has('silver_weight'))
                            <span class="text-danger">{{ $errors->first('silver_weight') }}</span>
                        @endif
                    </div>

                    <div class="col-md-6">
                        <label for="Diamondweight" class="form-label">Diamond Weight</label>
                        <input type="text" class="form-control" name="diamond_weight" id="Diamondweight"
                            value="{{ $product->diamond_weight }}" placeholder="" />
                        @if ($errors->has('diamond_weight'))
                            <span class="text-danger">{{ $errors->first('diamond_weight') }}</span>
                        @endif
                    </div>

                    <div class="col-md-6">
                        <label for="Diamondgrade" class="form-label">Diamond Grade</label>
                        <input type="text" class="form-control" name="diamond_grade" id="Diamondgrade"
                            value="{{ $product->diamond_grade }}" placeholder="" />
                        @if ($errors->has('diamond_grade'))
                            <span class="text-danger">{{ $errors->first('diamond_grade') }}</span>
                        @endif
                    </div>

                    <div class="col-md-6">
                        <label for="Gemstone1" class="form-label">Gemstone Name 1</label>
                        <input type="text" class="form-control" name="gemstone_name_1" id="Gemstone1"
                            value="{{ $product->gemstone_name_1 }}" placeholder="" />
                        @if ($errors->has('gemstone_name_1'))
                            <span class="text-danger">{{ $errors->first('gemstone_name_1') }}</span>
                        @endif
                    </div>

                    <div class="col-md-6">
                        <label for="Gemstoneweight1" class="form-label">Gemstone Weight 1</label>
                        <input type="text" class="form-control" name="gemstone_weight_1" id="Gemstoneweight1"
                            value="{{ $product->gemstone_weight_1 }}" placeholder="" />
                        @if ($errors->has('gemstone_weight_1'))
                            <span class="text-danger">{{ $errors->first('gemstone_weight_1') }}</span>
                        @endif
                    </div>

                    <div class="col-md-6">
                        <label for="Gemstone2" class="form-label">Gemstone Name 2</label>
                        <input type="text" class="form-control" name="gemstone_name_2" id="Gemstone2"
                            value="{{ $product->gemstone_name_2 }}" placeholder="" />
                        @if ($errors->has('gemstone_name_2'))
                            <span class="text-danger">{{ $errors->first('gemstone_name_2') }}</span>
                        @endif
                    </div>

                    <div class="col-md-6">
                        <label for="Gemstoneweight2" class="form-label">Gemstone Weight 2</label>
                        <input type="text" class="form-control" name="gemstone_weight_2" id="Gemstoneweight2"
                            value="{{ $product->gemstone_weight_2 }}" placeholder="" />
                        @if ($errors->has('gemstone_weight_2'))
                            <span class="text-danger">{{ $errors->first('gemstone_weight_2') }}</span>
                        @endif
                    </div>

                    <div class="col-md-6">
                        <label for="Gemstone3" class="form-label">Gemstone Name 3</label>
                        <input type="text" class="form-control" name="gemstone_name_3" id="Gemstone3"
                            value="{{ $product->gemstone_name_3 }}" placeholder="" />
                        @if ($errors->has('gemstone_name_3'))
                            <span class="text-danger">{{ $errors->first('gemstone_name_3') }}</span>
                        @endif
                    </div>

                    <div class="col-md-6">
                        <label for="Gemstoneweight3" class="form-label">Gemstone Weight 3</label>
                        <input type="text" class="form-control" name="gemstone_weight_3" id="Gemstoneweight3"
                            value="{{ $product->gemstone_weight_3 }}" placeholder="" />
                        @if ($errors->has('gemstone_weight_3'))
                            <span class="text-danger">{{ $errors->first('gemstone_weight_3') }}</span>
                        @endif
                    </div>

                    <div class="col-md-6">
                        <label for="Othergemstones" class="form-label">Other Gemstones</label>
                        <input type="text" class="form-control" name="other_gemstones" id="Othergemstones"
                            value="{{ $product->other_gemstones }}" placeholder="" />
                        @if ($errors->has('other_gemstones'))
                            <span class="text-danger">{{ $errors->first('other_gemstones') }}</span>
                        @endif
                    </div>

                    <div class="col-md-6">
                        <label for="OthergemstonesWeight" class="form-label">Other Gemstone Weight</label>
                        <input type="text" class="form-control" name="other_gemstone_weight"
                            id="OthergemstonesWeight" value="{{ $product->other_gemstone_weight }}" placeholder="" />
                        @if ($errors->has('other_gemstone_weight'))
                            <span class="text-danger">{{ $errors->first('other_gemstone_weight') }}</span>
                        @endif
                    </div>

                    <div class="col-md-6">
                        <label for="Fossilname" class="form-label">Fossil Name</label>
                        <input type="text" class="form-control" name="fossil_name" id="Fossilname"
                            value="{{ $product->fossil_name }}" placeholder="" />
                        @if ($errors->has('fossil_name'))
                            <span class="text-danger">{{ $errors->first('fossil_name') }}</span>
                        @endif
                    </div>

                    <div class="col-md-6">
                        <label for="Fossilweight" class="form-label">Fossil Weight</label>
                        <input type="text" class="form-control" name="fossil_weight" id="Fossilweight"
                            value="{{ $product->fossil_weight }}" placeholder="" />
                        @if ($errors->has('fossil_weight'))
                            <span class="text-danger">{{ $errors->first('fossil_weight') }}</span>
                        @endif
                    </div>

                    <div class="col-md-6">
                        <label for="Grossweight" class="form-label">Gross Weight</label>
                        <input type="text" class="form-control" name="gross_weight" id="Grossweight"
                            value="{{ $product->gross_weight }}" placeholder="" />
                        @if ($errors->has('gross_weight'))
                            <span class="text-danger">{{ $errors->first('gross_weight') }}</span>
                        @endif
                    </div>

                    <div class="col-md-6">
                        <label for="Totalgemstoneweight" class="form-label">Total Gemstone Weight</label>
                        <input type="text" class="form-control" name="total_gemstone_weight" id="Totalgemstoneweight"
                            value="{{ $product->total_gemstone_weight }}" placeholder="" />
                        @if ($errors->has('total_gemstone_weight'))
                            <span class="text-danger">{{ $errors->first('total_gemstone_weight') }}</span>
                        @endif
                    </div>

                    <div class="col-md-6">
                        <label for="Gemstonetype" class="form-label">Gemstone Type</label>
                        <input type="text" class="form-control" name="gemstone_type" id="Gemstonetype"
                            value="{{ $product->gemstone_type }}" placeholder="" />
                        @if ($errors->has('gemstone_type'))
                            <span class="text-danger">{{ $errors->first('gemstone_type') }}</span>
                        @endif
                    </div>

                    <div class="col-md-6">
                        <label for="Diamondcut" class="form-label">Diamond Cut</label>
                        <input type="text" class="form-control" name="diamond_cut" id="Diamondcut"
                            value="{{ $product->diamond_cut }}" placeholder="" />
                        @if ($errors->has('diamond_cut'))
                            <span class="text-danger">{{ $errors->first('diamond_cut') }}</span>
                        @endif
                    </div>

                    <div class="col-md-12">
                        <label for="Diamondshape" class="form-label">Diamond Shape</label>
                        <input type="text" class="form-control" name="diamond_shape" id="Diamondshape"
                            value="{{ $product->diamond_shape }}" placeholder="" />
                        @if ($errors->has('diamond_shape'))
                            <span class="text-danger">{{ $errors->first('diamond_shape') }}</span>
                        @endif
                    </div>

                    <div class="col-md-12 ">
                        <label for="description" class="form-label">Description <span
                                class="text-danger">*</span></label>
                        <textarea class="form-control" name="long_description" rows="5" id="description" placeholder="">{{ $product->long_description }}</textarea>
                        @if ($errors->has('long_description'))
                            <span class="text-danger">{{ $errors->first('long_description') }}</span>
                        @endif
                    </div>
                    <div class="col-md-12 ">
                        <label for="description" class="form-label">Description 2</label>
                        <textarea class="form-control" name="long_description_2" rows="5" id="description" placeholder="">{{ $product->long_description_2 }}</textarea>
                        @if ($errors->has('long_description_2'))
                            <span class="text-danger">{{ $errors->first('long_description_2') }}</span>
                        @endif
                    </div>
                    <div class="col-md-12 ">
                        <label for="description" class="form-label">Description 3</label>
                        <textarea class="form-control" name="long_description_3" rows="5" id="description" placeholder="">{{ $product->long_description_3 }}</textarea>
                        @if ($errors->has('long_description3'))
                            <span class="text-danger">{{ $errors->first('long_description_3') }}</span>
                        @endif
                    </div>
                    <div class="col-md-12">
                        <label for="short_description" class="form-label">Short Description</label>
                        <textarea class="form-control" name="short_description" rows="5" id="description1" placeholder="">{{ $product->short_description }}</textarea>
                        @if ($errors->has('short_description'))
                            <span class="text-danger">{{ $errors->first('short_description') }}</span>
                        @endif
                    </div>

                    <div class="col-md-6">
                        <label for="MetaTitle" class="form-label">Meta_Text</label>
                        <input type="text" class="form-control" name="meta_title" id="MetaTitle"
                            value="{{ $product->meta_title }}" placeholder="" />
                        @if ($errors->has('meta_title'))
                            <span class="text-danger">{{ $errors->first('meta_title') }}</span>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <label for="MetaDescription" class="form-label">Meta_Description</label>
                        <input type="text" class="form-control" name="meta_description" id="MetaDescription"
                            value="{{ $product->meta_description }}" placeholder="" />
                        @if ($errors->has('meta_description'))
                            <span class="text-danger">{{ $errors->first('meta_description') }}</span>
                        @endif
                    </div>
                    <div class="col-md-12">
                        <label for="Keyword" class="form-label">Keywords</label>
                        <input type="text" class="form-control" name="keyword" id="Keyword"
                            value="{{ $product->keyword }}" placeholder="" />
                        @if ($errors->has('keyword'))
                            <span class="text-danger">{{ $errors->first('keyword') }}</span>
                        @endif
                    </div>


                    <div class="col-md-12">
                        <label for="Image" class="form-label">Image Type</label>
                        <select name="image_type" id="ImageType" class="form-control">
                            <option value="1" {{ $product->image_type == 1 ? 'selected' : '' }}>Upload Image</option>
                            <option value="2" {{ $product->image_type == 2 ? 'selected' : '' }}>Image Link</option>
                        </select>
                        @if ($errors->has('parent'))
                            <span class="text-danger">{{ $errors->first('parent') }}</span>
                        @endif
                    </div>

                    @for ($i = 1; $i <= 5; $i++)
                        <div class="row upload mt-3 {{ $product->image_type == 2 ? 'd-none' : '' }}">
                            <div class="col-md-10">
                                <label for="Image{{ $i }}" class="form-label"
                                    style="top:0px !important;">Image {{ $i }}</label>
                                <input type="file" class="form-control" name="image{{ $i }}"
                                    id="Image{{ $i }}" />
                                @if ($errors->has('image' . $i))
                                    <span class="text-danger">{{ $errors->first('image' . $i) }}</span>
                                @endif
                            </div>
                            <div class="col-md-2">
                                @if ($product->{'image'.$i})
                                    <img src="{{ $product->image_type == 1 ? asset('products/' . $product->{'image'.$i}) : $product->{'image'.$i} }}"
                                        class="product_preview upload w-50" id="product_image{{ $i }}">
                                @else
                                    <img src="{{ url('/') }}/assets/Images/upload.png"
                                        class="product_preview upload w-50" id="product_image{{ $i }}">
                                @endif
                            </div>
                        </div>
                        <div class="col-md-12 imagelink mt-3 {{ $product->image_type == 1 ? 'd-none' : '' }}">
                            <div class="col-md-12">
                                <label for="ImageLink{{ $i }}" class="form-label">Image Link
                                    {{ $i }}</label>
                                <input type="text" class="form-control" name="image_link{{ $i }}"
                                    id="ImageLink{{ $i }}" value="{{ $product->{'image'.$i} }}"
                                    placeholder="" />
                                @if ($errors->has('image' . $i))
                                    <span class="text-danger">{{ $errors->first('image' . $i) }}</span>
                                @endif
                            </div>
                        </div>
                    @endfor

                    <div class="col-md-6">
                        <label for="Status" class="">Status <span class="text-danger">*</span></label>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="status" id="flexSwitchCheckChecked"
                                @if ($product->status == 1) checked @endif />
                            <label class="form-check-label" for="flexSwitchCheckChecked"></label>
                        </div>
                    </div>
                    <div class="col-12">
                        <input type="hidden" name="id" value="{{ $product->id }}">
                        <button type="submit" class="btn gc_btn mt-3">
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>

$(document).ready(function() {
            // Image Preview Functionality
            for (let i = 1; i <= 5; i++) {
                $('#Image' + i).change(function() {
                    let reader = new FileReader();
                    reader.onload = (e) => {
                        $('#product_image' + i).attr('src', e.target.result);
                    }
                    reader.readAsDataURL(this.files[0]);
                });
            }

            // Image Type Toggle Functionality
            $(document).on('change', '#ImageType', function() {
                var type = $(this).val();
                if (type == 2) {
                    $('.imagelink').removeClass('d-none');
                    $('.upload').addClass('d-none');
                } else {
                    $('.upload').removeClass('d-none');
                    $('.imagelink').addClass('d-none');
                }
            });

            // Category and Subcategory Functionality
            $(document).on('change', '#Category', function() {
                var category_id = $(this).val();
                if (category_id) {
                    $.ajax({
                        url: '/get-subcategories/' + category_id,
                        method: 'GET',
                        success: function(response) {
                            var subcategoryDropdown = $('#Subcategory');
                            subcategoryDropdown.empty();
                            subcategoryDropdown.append('<option value="0">Select Subcategory</option>');
                            $.each(response.subcategories, function(index, subcategory) {
                                subcategoryDropdown.append('<option value="' + subcategory.id + '">' + subcategory.name + '</option>');
                            });
                        }
                    });
                }
            });
        });


        // $(document).ready(function() {
        //     // Image Preview Functionality
        //     for (let i = 1; i <= 5; i++) {
        //         $('#Image' + i).change(function() {
        //             let reader = new FileReader();
        //             reader.onload = (e) => {
        //                 $('#product_image' + i).attr('src', e.target.result);
        //             }
        //             reader.readAsDataURL(this.files[0]);
        //         });
        //     }

        //     // Image Type Toggle Functionality
        //     $(document).on('change', '#ImageType', function() {
        //         var type = $(this).val();
        //         if (type == 2) {
        //             $('.imagelink').removeClass('d-none');
        //             $('.upload').addClass('d-none');
        //         } else {
        //             $('.upload').removeClass('d-none');
        //             $('.imagelink').addClass('d-none');
        //         }
        //     });

        //     // Category and Subcategory Functionality
        //     $(document).on('change', '#Category', function() {
        //         var category_id = $(this).val();
        //         if (category_id) {
        //             $.ajax({
        //                 url: '/get-subcategories/' + category_id,
        //                 method: 'GET',
        //                 success: function(response) {
        //                     var subcategoryDropdown = $('#Subcategory');
        //                     subcategoryDropdown.empty();
        //                     subcategoryDropdown.append('<option value="0">Select Subcategory</option>');
        //                     $.each(response.subcategories, function(index, subcategory) {
        //                         subcategoryDropdown.append('<option value="' + subcategory.id + '">' + subcategory.name + '</option>');
        //                     });
        //                 }
        //             });
        //         }
        //     });
        // });
    </script>
@endsection
