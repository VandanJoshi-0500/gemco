@extends('admin.layouts.app')

@section('content')
    <div class="card mt-md-3 mb-3">
        <div class="card-body d-flex align-items-center p-lg-3 p-2 staff_header">
            <div class="pe-4 fs-5">Add Collection</div>
            <div class="ms-auto">
                <a href="{{route('admin.collections')}}" class="btn gc_btn">Go Back</a>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <form action="" method="post" enctype="multipart/form-data" class="row g-3">
                @csrf
                <div class="col-md-6">
                    <label for="Name" class="form-label">Collection Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="name" id="Name" value="{{old('name')}}" placeholder="" autofocus />
                    @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                </div>
                <div class="col-md-6">
                    <label for="Slug" class="form-label">Slug</label>
                    <input type="text" class="form-control" name="slug" id="Slug" value="{{old('slug')}}" placeholder="">
                    @if ($errors->has('slug'))
                        <span class="text-danger">{{ $errors->first('slug') }}</span>
                    @endif
                </div>
                {{-- <div class="col-md-12">
                    <label for="Parent" class="form-label">Parent Collection</label>
                    <select class="form-control" name="parent" id="Parent">
                        <option value="0">Select Parent Collection</option>
                        <option value="3">Fine Jewelery</option>
                        <option value="4">Victorian Jewelery</option>
                    </select>
                    @if ($errors->has('parent'))
                        <span class="text-danger">{{ $errors->first('parent') }}</span>
                    @endif
                </div> --}}

                <div class="col-md-12">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" name="description" rows="5" id="ckplot1" value="{{old('description')}}" placeholder="" >{{old('description')}}</textarea>
                    @if ($errors->has('description'))
                        <span class="text-danger">{{ $errors->first('description') }}</span>
                    @endif
                </div>
                <div class="col-md-12">
                    <label for="orderNo" class="form-label">Order No</label>
                    <input type="text" class="form-control" name="order_no" id="orderNo" value="{{old('order_no')}}" placeholder="" />

                    @if ($errors->has('order_no'))
                        <span class="text-danger">{{ $errors->first('order_no') }}</span>
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
                <div class="col-md-10">
                    <label for="MenuImage" class="form-label">Menu Image</label>
                    <input type="file" name="menu_image" id="MenuImage" class="form-control">
                    @if ($errors->has('menu_image'))
                        <span class="text-danger">{{ $errors->first('menu_image') }}</span>
                    @endif
                </div>
                <div class="col-md-2">
                    <img src="{{url('/')}}/assets/Images/upload.png" class="menu_preview upload w-50" id="menu_image">
                </div>
                <div class="col-md-6">
                    <label for="Status" class="">Status <span class="text-danger">*</span></label>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" name="status" id="flexSwitchCheckChecked" checked />
                        <label class="form-check-label" for="flexSwitchCheckChecked"></label>
                    </div>
                </div>
                <div class="col-md-12">
                    <label for="Ring" class="">Ring Image</label>
                    <input type="file" name="ring_image" id="ring_image" class="form-control">
                </div>
                <div class="col-md-12">
                    <label for="Necklace" class="">Necklace Image</label>
                    <input type="file" name="necklace_image" id="necklace_image" class="form-control">
                </div>
                <div class="col-md-12">
                    <label for="Ear Jewelry" class="">Ear jewellery Image</label>
                    <input type="file" name="ear_jewelry_mage" id="ear_jewelry_mage" class="form-control">
                </div>
                <div class="col-md-12">
                    <label for="Ring" class="">Brecelets Image</label>
                    <input type="file" name="bracelets_image" id="bracelets_image" class="form-control">
                </div>
                <div class="col-12">
                    <button type="submit" class="btn gc_btn mt-3">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('script')
<script>
    CKEDITOR.replace("ckplot1");
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
</script>
@endsection
