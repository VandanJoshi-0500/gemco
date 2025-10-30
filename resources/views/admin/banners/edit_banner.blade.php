@extends('admin.layouts.app')

@section('content')
<div class="card mt-md-3 mb-3">
    <div class="card-body d-flex align-items-center p-lg-3 p-2 staff_header">
        <div class="pe-4 fs-5">Edit Banner</div>
        <div class="ms-auto">
            <a href="{{route('admin.banners')}}" class="btn gc_btn">Go Back</a>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <form action="{{route('admin.update.banner')}}" method="post" enctype="multipart/form-data" class="row g-3">
            @csrf
            <div class="col-md-12">
                <label for="Name" class="form-label">Banner Name <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="name" id="Name" value="{{$banner->name}}" placeholder="" autofocus />
                @if ($errors->has('name'))
                <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
            </div>
            <div class="col-md-12">
                <label for="BannerLink" class="form-label">Banner Link</label>
                <input type="text" class="form-control" name="banner_link" id="BannerLink" value="{{$banner->banner_link}}" placeholder="" autofocus />
                @if ($errors->has('banner_link'))
                <span class="text-danger">{{ $errors->first('banner_link') }}</span>
                @endif
            </div>
            <div class="col-md-12">
                <label for="Image" class="form-label">Image Type</label>
                <select name="image_type" id="ImageType" class="form-control">
                    <option value="1" @if($banner->image_type == 1) selected @endif>Upload Image</option>
                    <option value="2" @if($banner->image_type == 2) selected @endif>Image Link</option>
                </select>
                @if ($errors->has('parent'))
                <span class="text-danger">{{ $errors->first('parent') }}</span>
                @endif
            </div>
            <div class="row upload @if($banner->image_type != 1) d-none @endif mt-3">
                <div class="col-md-8">
                    <label for="Image" class="form-label" style="top:3px !important;">Banner Image</label>
                    <input type="file" name="image" id="Image" class="form-control">
                    @if ($errors->has('image'))
                    <span class="text-danger">{{ $errors->first('image') }}</span>
                    @endif
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-3">
                            <img id="uploaded-image-preview" src="{{url('/')}}/banners/{{$banner->image}}" width="80px" alt="">
                            <input type="hidden" name="hidden_image" class="hidden_image" value="{{$banner->image}}">
                        </div>
                        <div class="col-md-9">
                            @if (!blank($banner->image))
                            <a href="javascript:void(0);" class="text-danger delete-img">Delete</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 imagelink @if($banner->image_type != 2) d-none @endif">
                <div class="col-md-12">
                    <label for="ImageLink" class="form-label">Image Link</label>
                    <input type="text" class="form-control" name="image_link" id="ImageLink" value="{{$banner->image}}" placeholder="" />
                    @if ($errors->has('image'))
                    <span class="text-danger">{{ $errors->first('image') }}</span>
                    @endif
                </div>
            </div>
            <div class="col-md-12">
                <label for="orderNo" class="form-label">Order No</label>
                <input type="text" class="form-control" name="order_no" id="orderNo" value="{{$banner->order_no}}" placeholder="" />
                @if ($errors->has('order_no'))
                <span class="text-danger">{{ $errors->first('order_no') }}</span>
                @endif
            </div>
            <div class="col-md-12">
                <label for="Heading" class="form-label">Heading</label>
                <input type="text" class="form-control" name="heading" id="Heading" value="{{ $banner->heading }}" placeholder="Enter banner heading" />
                @if ($errors->has('heading'))
                <span class="text-danger">{{ $errors->first('heading') }}</span>
                @endif
            </div>

            <div class="col-md-12">
                <label for="Description" class="form-label">Description</label>
                <textarea class="form-control" name="description" id="Description" placeholder="Enter banner description">{{ $banner->description }}</textarea>
                @if ($errors->has('description'))
                <span class="text-danger">{{ $errors->first('description') }}</span>
                @endif
            </div>
            <div class="col-md-6">
                <label for="Status" class="">Status <span class="text-danger">*</span></label>
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" name="status" id="flexSwitchCheckChecked" @if($banner->status == 1) checked @endif />
                    <label class="form-check-label" for="flexSwitchCheckChecked"></label>
                </div>
            </div>
            <div class="col-12">
                <input type="hidden" name="id" value="{{$banner->id}}">
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
    $('#Image').change(function() {
        let reader = new FileReader();
        reader.onload = (e) => {
            $('#uploaded-image-preview').attr('src', e.target.result);
        }
        reader.readAsDataURL(this.files[0]);
        $('.delete-img').show();
    });
    $(document).on('click', '.delete-img', function() {
        $('#uploaded-image-preview').attr('src', '');
        $('.hidden_image').val('');
        $('#image').val('');
        $('.delete-img').hide();
    })
</script>
@endsection