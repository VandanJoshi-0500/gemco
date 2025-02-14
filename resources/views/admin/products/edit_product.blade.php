@extends('admin.layouts.app')

@section('content')
<div class="gc_row">
    <div class="card mt-md-3 mb-3">
        <div class="card-body d-flex align-items-center p-lg-3 p-2 staff_header">
            <div class="pe-4 fs-5">Edit Product</div>
            <div class="ms-auto">
                <a href="{{route('admin.products')}}" class="btn gc_btn">Go Back</a>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <form action="{{route('admin.update.product')}}" method="post" enctype="multipart/form-data" class="row g-3">
                @csrf
                <div class="col-md-6">
                    <label for="Name" class="form-label">Product Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="name" id="Name" value="{{$product->name}}" placeholder="" />
                    @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                </div>
                <div class="col-md-6">
                    <label for="Sku" class="form-label">Product SKU <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="sku" id="Sku" value="{{$product->sku}}" placeholder="" />
                    @if ($errors->has('sku'))
                        <span class="text-danger">{{ $errors->first('sku') }}</span>
                    @endif
                </div>
                <div class="col-md-6">
                    <label for="Collection" class="form-label">Collection</label>
                    <select class="form-control" name="collection" id="Collection">
                        <option value="0">Select Collection</option>
                        @if (!blank($collections))
                            @foreach ($collections as $collection)
                                <option value="{{$collection->id}}" @if($product->collection == $collection->id) selected @endif>{{$collection->name}}</option>
                            @endforeach
                        @endif
                    </select>
                    @if ($errors->has('collection'))
                        <span class="text-danger">{{ $errors->first('collection') }}</span>
                    @endif
                </div>
                <div class="col-md-6">
                    <label for="Category" class="form-label">Category</label>
                    <select class="form-control" name="categories" id="Collection">
                        <option value="0">Select Category</option>
                        @if (count($parent_categories)>0)
                        @foreach ($parent_categories as $item)
                            <?php
                                $childs = DB::table('categories')->where('parent',$item->id)->get();
                            ?>
                            @if (count($childs)>0)
                                <optgroup label="{{$item->name}}">
                                    @foreach ($childs as $child)
                                        <option value="{{$child->id}}" @if($child->id == $product->category) selected @endif>{{$child->name}}</option>
                                    @endforeach
                                </optgroup>
                            @else
                                <option value="{{$item->id}}" @if($item->id == $product->category) selected @endif>{{$item->name}}</option>
                            @endif
                        @endforeach
                    @endif
                    </select>
                    @if ($errors->has('collection'))
                        <span class="text-danger">{{ $errors->first('collection') }}</span>
                    @endif
                </div>
                <div class="col-md-12">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" name="long_description" rows="5" id="description" placeholder="" >{{$product->long_description}}</textarea>
                    @if ($errors->has('long_description'))
                        <span class="text-danger">{{ $errors->first('long_description') }}</span>
                    @endif
                </div>
                <div class="col-md-12 ">
                    <label for="description" class="form-label">Description 2</label>
                    <textarea class="form-control" name="long_description2" rows="5" id="description" placeholder="" >{{$product->long_description2}}</textarea>
                    @if ($errors->has('long_description2'))
                        <span class="text-danger">{{ $errors->first('long_description2') }}</span>
                    @endif
                </div>
                <div class="col-md-12 ">
                    <label for="description" class="form-label">Description 3</label>
                    <textarea class="form-control" name="long_description3" rows="5" id="description" placeholder="" >{{$product->long_description3}}</textarea>
                    @if ($errors->has('long_description3'))
                        <span class="text-danger">{{ $errors->first('long_description3') }}</span>
                    @endif
                </div>
                <div class="col-md-12">
                    <label for="description1" class="form-label">Short Description</label>
                    <textarea class="form-control" name="short_description" rows="5" id="description1" placeholder="" >{{$product->short_description}}</textarea>
                    @if ($errors->has('short_description'))
                        <span class="text-danger">{{ $errors->first('short_description') }}</span>
                    @endif
                </div>
                <div class="col-md-12">
                    <label for="Price" class="form-label">Price <span class="text-danger">*</span></label>
                    <input type="number" class="form-control" name="price" id="Price" value="{{$product->price}}" placeholder="" />
                    @if ($errors->has('price'))
                        <span class="text-danger">{{ $errors->first('price') }}</span>
                    @endif
                </div>
                <div class="col-md-6">
                    <label for="specialPrice" class="form-label">Special Price</label>
                    <input type="number" class="form-control" name="special_price" id="specialPrice" value="{{$product->special_price}}" placeholder="" />
                    @if ($errors->has('special_price'))
                        <span class="text-danger">{{ $errors->first('special_price') }}</span>
                    @endif
                </div>
                <div class="col-md-6">
                    <label for="tagPrice" class="form-label">Tag Price</label>
                    <input type="number" class="form-control" name="tag_price" id="tagPrice" value="{{$product->tag_price}}" placeholder="" />
                    @if ($errors->has('tag_price'))
                        <span class="text-danger">{{ $errors->first('tag_price') }}</span>
                    @endif
                </div>
                <div class="col-md-6">
                    <label for="stockQuantity" class="form-label">Quantity In Stock</label>
                    <input type="number" class="form-control" name="quantity_stock" min="0" id="stockQuantity" value="{{$product->quantity_stock}}" placeholder="" />
                    @if ($errors->has('quantity_stock'))
                        <span class="text-danger">{{ $errors->first('quantity_stock') }}</span>
                    @endif
                </div>
                <div class="col-md-6">
                    <label for="memoQuantity" class="form-label">Quantity In Memo</label>
                    <input type="number" class="form-control" name="quantity_memo" min="0" id="memoQuantity" value="{{$product->quantity_memo}}" placeholder="" />
                    @if ($errors->has('quantity_memo'))
                        <span class="text-danger">{{ $errors->first('quantity_memo') }}</span>
                    @endif
                </div>
                <div class="col-md-12">
                    <label for="Image" class="form-label" >Image Type</label>
                    <select name="image_type" id="ImageType" class="form-control">
                        <option value="1" @if($product->image_type == 1) selected @endif>Upload Image</option>
                        <option value="2" @if($product->image_type == 2) selected @endif>Image Link</option>
                    </select>
                    @if ($errors->has('parent'))
                        <span class="text-danger">{{ $errors->first('parent') }}</span>
                    @endif
                </div>
                <div class="row upload mt-3 @if($product->image_type != 1) d-none @endif">
                    <div class="col-md-10">
                        <label for="Image" class="form-label" style="top:0px !important;">Image</label>
                        <input type="file" class="form-control" name="image" id="Image" />
                        @if ($errors->has('image'))
                            <span class="text-danger">{{ $errors->first('image') }}</span>
                        @endif
                    </div>
                    <div class="col-md-2">
                        @if (!blank($product->image))
                            <img src="{{url('/')}}/products/{{$product->image}}" class="product_preview upload w-50" id="product_image">
                            <input type="hidden" name="uploaded_image" value="{{$product->image}}">
                        @else
                            <img src="{{url('/')}}/assets/Images/upload.png" class="product_preview upload w-50" id="product_image">
                            <input type="hidden" name="uploaded_image" value="">
                        @endif
                    </div>
                </div>
                <div class="col-md-12 imagelink @if($product->image_type != 2) d-none @endif">
                    <div class="col-md-12">
                        <label for="ImageLink" class="form-label">Image Link</label>
                        <input type="text" class="form-control" name="image_link" id="ImageLink" @if($product->image_type == 2) value="{{$product->image}}" @endif value="" placeholder="" />
                        @if ($errors->has('image'))
                            <span class="text-danger">{{ $errors->first('image') }}</span>
                        @endif
                    </div>
                </div>

                {{-- for thumbnail --}}

                <div class="col-md-12">
                    <label for="Image" class="form-label" >Thumbnail Image Type</label>
                    <select name="thumbnail_image_type" id="ThumbnailImageType" class="form-control">
                        <option value="1" @if($product->thumbnail_image_type == 1) selected @endif>Upload Image</option>
                        <option value="2" @if($product->thumbnail_image_type == 2) selected @endif>Image Link</option>
                    </select>
                    @if ($errors->has('thumbnail_image_type'))
                        <span class="text-danger">{{ $errors->first('thumbnail_image_type') }}</span>
                    @endif
                </div>
                <div class="row Thumbnailupload mt-3 @if($product->thumbnail_image_type != 1) d-none @endif">
                    <div class="col-md-10">
                        <label for="Image" class="form-label" style="top:0px !important;">Thumbnail Image</label>
                        <input type="file" class="form-control" name="thumbnail_image" id="TImage" />
                        @if ($errors->has('thumbnail_image'))
                            <span class="text-danger">{{ $errors->first('thumbnail_image') }}</span>
                        @endif
                    </div>
                    <div class="col-md-2">
                        @if (!blank($product->thumbnail_image))
                            <img src="{{url('/')}}/products/{{$product->thumbnail_image}}" class="thumbnail_product_preview upload w-50" id="thumbnail_product_image">
                            <input type="hidden" name="thumbnail_image" value="{{$product->thumbnail_image}}">
                        @else
                            <img src="{{url('/')}}/assets/Images/upload.png" class="thumbnail_product_preview upload w-50" id="thumbnail_product_image">
                            <input type="hidden" name="thumbnail_image" value="">
                        @endif
                    </div>
                </div>
                <div class="col-md-12 thumbnail_imagelink @if($product->thumbnail_image != 2) d-none @endif">
                    <div class="col-md-12">
                        <label for="ImageLink" class="form-label">Thumbnail Image Link</label>
                        <input type="text" class="form-control" name="thumbnail_image_link" id="ImageLink" @if($product->thumbnail_image_type == 2) value="{{$product->thumbnail_image}}" @endif value="" placeholder="" />
                        @if ($errors->has('thumbnail_image_link'))
                            <span class="text-danger">{{ $errors->first('thumbnail_image_link') }}</span>
                        @endif
                    </div>
                </div>

                <div class="col-md-6 d-none">
                    <div class="form-check d-flex align-items-center">
                        <input type="checkbox" class="form-check-input chk" name="price_xml" id="priceXml" @if($product->price_xml == 1) checked @endif>
                        <label for="priceXml" class="form-label ms-2 mb-0">Do you want price updation with xml changes?</label>
                    </div>
                    @if ($errors->has('price_xml'))
                        <span class="text-danger">{{ $errors->first('price_xml') }}</span>
                    @endif
                </div>
                <div class="col-md-6">
                    <label for="Status" class="">Status <span class="text-danger">*</span></label>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" name="status" id="flexSwitchCheckChecked" @if($product->status == 1) checked @endif />
                        <label class="form-check-label" for="flexSwitchCheckChecked"></label>
                    </div>
                </div>
                <div class="col-12">
                    <input type="hidden" name="id" value="{{$product->id}}">
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
            // Check the value of Thumbnail Image Type on page load
            var thumbnailImageType = $('#ThumbnailImageType').val();
            toggleThumbnailImageFields(thumbnailImageType);

            // Event listener for when Thumbnail Image Type changes
            $('#ThumbnailImageType').change(function(){
                var type = $(this).val();
                toggleThumbnailImageFields(type);
            });

            // Function to toggle visibility of thumbnail image fields
            function toggleThumbnailImageFields(type) {
                if(type == 2){
                    $('.thumbnail_imagelink').removeClass('d-none');
                    $('.Thumbnailupload').addClass('d-none');
                } else {
                    $('.Thumbnailupload').removeClass('d-none');
                    $('.thumbnail_imagelink').addClass('d-none');
                }
            }

            // Check the value of Image Type on page load
            var imageType = $('#ImageType').val();
            toggleImageFields(imageType);

            // Event listener for when Image Type changes
            $('#ImageType').change(function(){
                var type = $(this).val();
                toggleImageFields(type);
            });

            // Function to toggle visibility of image fields
            function toggleImageFields(type) {
                if(type == 2){
                    $('.imagelink').removeClass('d-none');
                    $('.upload').addClass('d-none');
                } else {
                    $('.upload').removeClass('d-none');
                    $('.imagelink').addClass('d-none');
                }
            }

            // Image preview functionality
            $('#Image').change(function(){
                let reader = new FileReader();
                reader.onload = (e) => {
                    $('.product_preview').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            });

            $('#TImage').change(function(){
                let reader = new FileReader();
                reader.onload = (e) => {
                    $('.thumbnail_product_preview').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            });
        });

    </script>
@endsection
