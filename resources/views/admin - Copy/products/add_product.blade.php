@extends('admin.layouts.app')

@section('content')
<div class="gc_row">
    <div class="card mt-md-3 mb-3">
        <div class="card-body d-flex align-items-center p-lg-3 p-2 staff_header">
            <div class="pe-4 fs-5">Add Product</div>
            <div class="ms-auto">
                <a href="{{route('admin.products')}}" class="btn gc_btn">Go Back</a>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <form action="{{route('admin.add.product.data')}}" method="post" enctype="multipart/form-data" class="row g-3">
                @csrf
                <div class="col-md-6 ">
                    <label for="Name" class="form-label">Product Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="name" id="Name" value="{{old('name')}}" placeholder="" autofocus />
                    @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                </div>
                <div class="col-md-6 ">
                    <label for="Sku" class="form-label">Product SKU <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="sku" id="Sku" value="{{old('sku')}}" placeholder="" />
                    @if ($errors->has('sku'))
                        <span class="text-danger">{{ $errors->first('sku') }}</span>
                    @endif
                </div>
                <div class="col-md-6 ">
                    <label for="Collection" class="form-label">Collection</label>
                    <select class="form-control" name="collection" id="Collection">
                        <option value="0">Select Collection</option>
                        @if (!blank($collections))
                            @foreach ($collections as $collection)
                                <option value="{{$collection->id}}">{{$collection->name}}</option>
                            @endforeach
                        @endif
                    </select>
                    @if ($errors->has('collection'))
                        <span class="text-danger">{{ $errors->first('collection') }}</span>
                    @endif
                </div>
                <div class="col-md-6 ">
                    <label for="Category" class="form-label">Category</label>
                    <select class="form-control" name="categories" id="Category">
                        <option value="0">Select Category</option>
                        @if (count($parent_categories)>0)
                        @foreach ($parent_categories as $item)
                            <?php
                                $childs = DB::table('categories')->where('parent',$item->id)->get();
                            ?>
                            @if (count($childs)>0)
                                <optgroup label="{{$item->name}}">
                                    @foreach ($childs as $child)
                                        <option value="{{$child->id}}">{{$child->name}}</option>
                                    @endforeach
                                </optgroup>
                            @else
                                <option value="{{$item->id}}">{{$item->name}}</option>
                            @endif
                        @endforeach
                    @endif
                    </select>
                    @if ($errors->has('collection'))
                        <span class="text-danger">{{ $errors->first('collection') }}</span>
                    @endif
                </div>
                <div class="col-md-12 ">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" name="long_description" rows="5" id="description" value="{{old('long_description')}}" placeholder="" >{{old('long_description')}}</textarea>
                    @if ($errors->has('long_description'))
                        <span class="text-danger">{{ $errors->first('long_description') }}</span>
                    @endif
                </div>
                <div class="col-md-12 ">
                    <label for="description" class="form-label">Description 2</label>
                    <textarea class="form-control" name="long_description2" rows="5" id="description" value="{{old('long_description')}}" placeholder="" >{{old('long_description2')}}</textarea>
                    @if ($errors->has('long_description2'))
                        <span class="text-danger">{{ $errors->first('long_description2') }}</span>
                    @endif
                </div>
                <div class="col-md-12 ">
                    <label for="description" class="form-label">Description 3</label>
                    <textarea class="form-control" name="long_description3" rows="5" id="description" value="{{old('long_description')}}" placeholder="" >{{old('long_description3')}}</textarea>
                    @if ($errors->has('long_description3'))
                        <span class="text-danger">{{ $errors->first('long_description3') }}</span>
                    @endif
                </div>
                <div class="col-md-12">
                    <label for="short_description" class="form-label">Short Description</label>
                    <textarea class="form-control" name="short_description" rows="5" id="description1" value="{{old('short_description')}}" placeholder="" >{{old('short_description')}}</textarea>
                    @if ($errors->has('short_description'))
                        <span class="text-danger">{{ $errors->first('short_description') }}</span>
                    @endif
                </div>
                <div class="col-md-12">
                    <label for="Price" class="form-label">Price <span class="text-danger">*</span></label>
                    <input type="number" class="form-control" name="price" id="Price" value="{{old('price')}}" placeholder="" />
                    @if ($errors->has('price'))
                        <span class="text-danger">{{ $errors->first('price') }}</span>
                    @endif
                </div>
                <div class="col-md-6">
                    <label for="specialPrice" class="form-label">Special Price</label>
                    <input type="number" class="form-control" name="special_price" id="specialPrice" value="{{old('special_price')}}" placeholder="" />
                    @if ($errors->has('special_price'))
                        <span class="text-danger">{{ $errors->first('special_price') }}</span>
                    @endif
                </div>
                <div class="col-md-6">
                    <label for="tagPrice" class="form-label">Tag Price</label>
                    <input type="number" class="form-control" name="tag_price" id="tagPrice" value="{{old('tag_price')}}" placeholder="" />
                    @if ($errors->has('tag_price'))
                        <span class="text-danger">{{ $errors->first('tag_price') }}</span>
                    @endif
                </div>
                <div class="col-md-6">
                    <label for="stockQuantity" class="form-label">Quantity In Stock</label>
                    <input type="number" class="form-control" name="quantity_stock" min="0" id="stockQuantity" value="{{old('quantity_stock')}}" placeholder="" />
                    @if ($errors->has('quantity_stock'))
                        <span class="text-danger">{{ $errors->first('quantity_stock') }}</span>
                    @endif
                </div>
                <div class="col-md-6">
                    <label for="memoQuantity" class="form-label">Quantity In Memo</label>
                    <input type="number" class="form-control" name="quantity_memo" min="0" id="memoQuantity" value="{{old('quantity_memo')}}" placeholder="" />
                    @if ($errors->has('quantity_memo'))
                        <span class="text-danger">{{ $errors->first('quantity_memo') }}</span>
                    @endif
                </div>
                <div class="col-md-12">
                    <label for="Image" class="form-label" >Image Type</label>
                    <select name="image_type" id="ImageType" class="form-control">
                        <option value="1" selected>Upload Image</option>
                        <option value="2">Image Link</option>
                    </select>
                    @if ($errors->has('parent'))
                        <span class="text-danger">{{ $errors->first('parent') }}</span>
                    @endif
                </div>
                <div class="row upload mt-3">
                    <div class="col-md-10">
                        <label for="Image" class="form-label" style="top:0px !important;">Image</label>
                        <input type="file" class="form-control" name="image" id="Image" />
                        @if ($errors->has('image'))
                            <span class="text-danger">{{ $errors->first('image') }}</span>
                        @endif
                    </div>
                    <div class="col-md-2">
                        <img src="{{url('/')}}/assets/Images/upload.png" class="product_preview upload w-50" id="product_image">
                    </div>
                </div>
                <div class="col-md-12 imagelink d-none">
                    <div class="col-md-12">
                        <label for="ImageLink" class="form-label">Image Link</label>
                        <input type="text" class="form-control" name="image_link" id="ImageLink" value="{{old('image_link')}}" placeholder="" />
                        @if ($errors->has('image'))
                            <span class="text-danger">{{ $errors->first('image') }}</span>
                        @endif
                    </div>
                </div>

                {{-- for thumbnail --}}

                <div class="col-md-12">
                    <label for="Image" class="form-label" >Thumbnail Image Type</label>
                    <select name="thumbnail_image_type" id="ThumbnailImageType" class="form-control">
                        <option value="1" selected>Upload Image</option>
                        <option value="2">Image Link</option>
                    </select>
                    @if ($errors->has('thumbnail_image_type'))
                        <span class="text-danger">{{ $errors->first('thumbnail_image_type') }}</span>
                    @endif
                </div>
                <div class="row Thumbnailupload mt-3">
                    <div class="col-md-10">
                        <label for="Image" class="form-label" style="top:0px !important;">Thumbnail Image</label>
                        <input type="file" class="form-control" name="thumbnail_image" id="TImage" />
                        @if ($errors->has('thumbnail_image'))
                            <span class="text-danger">{{ $errors->first('thumbnail_image') }}</span>
                        @endif
                    </div>
                    <div class="col-md-2">
                        <img src="{{url('/')}}/assets/Images/upload.png" class="thumbnail_product_preview upload w-50" id="thumbnail_product_image">
                    </div>
                </div>
                <div class="col-md-12 thumbnail_imagelink d-none">
                    <div class="col-md-12">
                        <label for="ImageLink" class="form-label">Thumbnail Image Link</label>
                        <input type="text" class="form-control" name="thumbnail_image_link" id="ImageLink" value="{{old('thumbnail_image_link')}}" placeholder="" />
                        @if ($errors->has('thumbnail_image_link'))
                            <span class="text-danger">{{ $errors->first('thumbnail_image_link') }}</span>
                        @endif
                    </div>
                </div>

                <div class="col-md-6 d-none">
                    <div class="form-check d-flex align-items-center">
                        <input type="checkbox" class="form-check-input" name="price_xml" id="priceXml" />
                        <label for="priceXml" class="form-label ms-2 mb-0">Do you want price updation with xml changes?</label>
                    </div>
                    @if ($errors->has('price_xml'))
                        <span class="text-danger">{{ $errors->first('price_xml') }}</span>
                    @endif
                </div>
                <div class="col-12">
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
         $('#Image').change(function(){
            let reader = new FileReader();
            reader.onload = (e) => {
                $('.product_preview').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        });
        $(document).on('change','#ImageType',function(){
            var type = $(this).val();
            if(type == 2){
                $('.imagelink').removeClass('d-none');
                $('.upload').addClass('d-none');
            }else{
                $('.upload').removeClass('d-none');
                $('.imagelink').addClass('d-none');
            }
        });

        $('#TImage').change(function(){
            let reader = new FileReader();
            reader.onload = (e) => {
                $('.thumbnail_product_preview').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        });
        $(document).on('change','#ThumbnailImageType',function(){
            var type = $(this).val();
            if(type == 2){
                $('.thumbnail_imagelink').removeClass('d-none');
                $('.Thumbnailupload').addClass('d-none');
            }else{
                $('.Thumbnailupload').removeClass('d-none');
                $('.thumbnail_imagelink').addClass('d-none');
            }
        });
    </script>
@endsection
