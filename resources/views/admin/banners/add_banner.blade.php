@extends('admin.layouts.app')

@section('content')
<div class="card mt-md-3 mb-3">
    <div class="card-body d-flex align-items-center p-lg-3 p-2 staff_header">
        <div class="pe-4 fs-5">Add Banner</div>
        <div class="ms-auto">
            <a href="{{route('admin.banners')}}" class="btn gc_btn">Go Back</a>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <form action="{{route('admin.add.banner.data')}}" method="post" enctype="multipart/form-data" class="row g-3">
            @csrf
            <div class="col-md-12">
                <label for="Name" class="form-label">Banner Name <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="name" id="Name" value="{{old('name')}}" placeholder="" autofocus />
                @if ($errors->has('name'))
                <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
            </div>
            <div class="col-md-12">
                <label for="BannerLink" class="form-label">Banner Link</label>
                <input type="text" class="form-control" name="banner_link" id="BannerLink" value="{{old('banner_link')}}" placeholder="" autofocus />
                @if ($errors->has('banner_link'))
                <span class="text-danger">{{ $errors->first('banner_link') }}</span>
                @endif
            </div>
            <div class="col-md-12">
                <label for="Image" class="form-label">Image Type</label>
                <select name="image_type" id="ImageType" class="form-control">
                    <option value="1" selected>Upload Image</option>
                    <option value="2">Image Link</option>
                </select>
                @if ($errors->has('parent'))
                <span class="text-danger">{{ $errors->first('parent') }}</span>
                @endif
            </div>
            <div class="row upload mt-3">
                <div class="col-md-8">
                    <label for="Image" class="form-label" style="top:0px !important;">Image</label>
                    <input type="file" class="form-control" name="image" id="Image" />
                    @if ($errors->has('image'))
                    <span class="text-danger">{{ $errors->first('image') }}</span>
                    @endif
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-3">
                            <img src="{{url('/')}}/assets/Images/upload.png" class="product_preview upload" id="product_image" width="80px" alt="">
                        </div>
                        <div class="col-md-9">
                            <a href="javascript:void(0);" class="text-danger delete-img d-none">Delete</a>
                        </div>
                    </div>
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
            <div class="col-md-12">
                <label for="orderNo" class="form-label">Order No</label>
                <input type="text" class="form-control" name="order_no" id="orderNo" value="{{old('order_no')}}" placeholder="" />
                @if ($errors->has('order_no'))
                <span class="text-danger">{{ $errors->first('order_no') }}</span>
                @endif
            </div>

            <div class="col-md-12">
                <label for="Heading" class="form-label">Heading</label>
                <input type="text" class="form-control" name="heading" id="Heading" value="{{ old('heading') }}" placeholder="Enter banner heading" />
                @if ($errors->has('heading'))
                <span class="text-danger">{{ $errors->first('heading') }}</span>
                @endif
            </div>

            <div class="col-md-12">
                <label for="Description" class="form-label">Description</label>
                <textarea class="form-control" name="description" id="Description" placeholder="Enter banner description">{{ old('description') }}</textarea>
                @if ($errors->has('description'))
                <span class="text-danger">{{ $errors->first('description') }}</span>
                @endif
            </div>
            
            <div class="col-md-6">
                <label for="Status" class="">Status <span class="text-danger">*</span></label>
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" name="status" id="flexSwitchCheckChecked" checked />
                    <label class="form-check-label" for="flexSwitchCheckChecked"></label>
                </div>
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
    $(document).ready(function() {
        // Toggle between upload and link input
        $('#ImageType').on('change', function() {
            let type = $(this).val();
            if (type == '2') {
                $('.imagelink').removeClass('d-none');
                $('.upload').addClass('d-none');
            } else {
                $('.imagelink').addClass('d-none');
                $('.upload').removeClass('d-none');
            }
        });

        // Preview selected image
        $('#Image').on('change', function() {
            let reader = new FileReader();
            reader.onload = function(e) {
                $('#product_image').attr('src', e.target.result);
                $('.delete-img').removeClass('d-none');
            };
            if (this.files && this.files[0]) {
                reader.readAsDataURL(this.files[0]);
            }
        });

        // Delete preview image
        $('.delete-img').on('click', function() {
            $('#product_image').attr('src', "{{url('/')}}/assets/Images/upload.png");
            $('#Image').val('');
            $(this).addClass('d-none');
        });
    });
</script>
@endsection