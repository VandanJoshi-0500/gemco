@extends('admin.layouts.app')

@section('content')
<div class="gc_row">
    <div class="card mt-md-3 mb-3">
        <div class="card-body d-flex align-items-center p-lg-3 p-2 staff_header">
            <div class="pe-4 fs-5">Edit Collection</div>
            <div class="ms-auto">
                <a href="{{route('admin.collections')}}" class="btn gc_btn">Go Back</a>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <form action="{{route('admin.update.collection')}}" method="post" enctype="multipart/form-data" class="row g-3">
                @csrf
                <div class="col-md-6">
                    <label for="Name" class="form-label">Collection Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="name" id="Name" value="{{$collection->name}}" placeholder="" autofocus />
                    @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                </div>
                <div class="col-md-6">
                    <label for="Slug" class="form-label">Slug <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="slug" id="Slug" value="{{$collection->slug}}" placeholder="">
                    @if ($errors->has('slug'))
                        <span class="text-danger">{{ $errors->first('slug') }}</span>
                    @endif
                </div>
                {{-- <div class="col-md-12">
                    <label for="Parent" class="form-label">Parent Collection</label>
                    <select class="form-control" name="parent" id="Parent">
                        <option value="0">Select Parent Collection</option>
                        <option value="3" @if($collection->parent == 3) selected @endif>Fine Jewelery</option>
                        <option value="4" @if($collection->parent == 4) selected @endif>Victorian Jewelery</option>
                    </select>
                    @if ($errors->has('parent'))
                        <span class="text-danger">{{ $errors->first('parent') }}</span>
                    @endif
                </div> --}}
                <div class="col-md-12">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" name="description" rows="5" id="ckplot1" placeholder="" >{{$collection->description}}</textarea>
                    @if ($errors->has('description'))
                        <span class="text-danger">{{ $errors->first('description') }}</span>
                    @endif
                </div>
                <div class="col-md-12">
                    <label for="orderNo" class="form-label">Order No</label>
                    <input type="text" class="form-control" name="order_no" id="orderNo" value="{{$collection->order_no}}" placeholder="" />
                    @if ($errors->has('order_no'))
                        <span class="text-danger">{{ $errors->first('order_no') }}</span>
                    @endif
                </div>
                <div class="col-md-12">
                    <label for="Image" class="form-label" >Image Type</label>
                    <select name="image_type" id="ImageType" class="form-control">
                        <option value="1" @if($collection->image_type == 1) selected @endif>Upload Image</option>
                        <option value="2" @if($collection->image_type == 2) selected @endif>Image Link</option>
                    </select>
                    @if ($errors->has('parent'))
                        <span class="text-danger">{{ $errors->first('parent') }}</span>
                    @endif
                </div>
                <div class="row upload mt-3 @if($collection->image_type != 1) d-none @endif">
                    <div class="col-md-10">
                        <label for="Image" class="form-label" style="top:0px !important;">Image</label>
                        <input type="file" class="form-control" name="image" id="Image" />
                        @if ($errors->has('image'))
                            <span class="text-danger">{{ $errors->first('image') }}</span>
                        @endif
                    </div>
                    <div class="col-md-2">
                        @if (!blank($collection->image))
                            <img src="{{url('/')}}/collection/{{$collection->image}}" class="product_preview upload w-50" id="product_image">
                            <input type="hidden" name="uploaded_image" value="{{$collection->image}}">
                        @else
                            <img src="{{url('/')}}/assets/Images/upload.png" class="product_preview upload w-50" id="product_image">
                            <input type="hidden" name="uploaded_image" value="">
                        @endif
                    </div>
                </div>
                <div class="col-md-12 imagelink @if($collection->image_type != 2) d-none @endif">
                    <div class="col-md-12">
                        <label for="ImageLink" class="form-label">Image Link</label>
                        <input type="text" class="form-control" name="image_link" id="ImageLink" value="{{$collection->image}}" placeholder="" />
                        @if ($errors->has('image'))
                            <span class="text-danger">{{ $errors->first('image') }}</span>
                        @endif
                    </div>
                </div>
                <div class="col-md-8">
                    <label for="MenuImage" class="form-label">Menu Image</label>
                    <input type="file" name="menu_image" id="MenuImage" class="form-control">
                    @if ($errors->has('menu_image'))
                        <span class="text-danger">{{ $errors->first('menu_image') }}</span>
                    @endif
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-3">
                            <img id="uploaded-menu-image-preview" src="{{url('/')}}/categories/{{$collection->menu_image}}" width="80px" alt="">
                            <input type="hidden" name="hidden_menu_image" class="hidden_menu_image" value="{{$collection->menu_image}}">
                        </div>
                        <div class="col-md-9">
                            @if (!blank($collection->menu_image))
                                <a href="javascript:void(0);" class="text-danger delete-menu-img">Delete</a>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="Status" class="">Status <span class="text-danger">*</span></label>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" name="status" id="flexSwitchCheckChecked" @if($collection->status == 1) checked @endif />
                        <label class="form-check-label" for="flexSwitchCheckChecked"></label>
                    </div>
                </div>
                <div class="col-md-8">
                    <label for="Ring" class="">Ring Image</label>
                    <input type="file" name="ring_image" id="ring_image" class="form-control">
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-3">
                            <img id="uploaded-ring-image-preview" src="{{url('/')}}/ring_image/{{$collection->ring_image}}" width="80px" alt="">
                            <input type="hidden" name="hidden_ring_image" class="hidden_ring_image" value="{{$collection->ring_image}}">
                        </div>
                        <div class="col-md-9">
                            @if (!blank($collection->ring_image))
                                <a href="javascript:void(0);" class="text-danger delete-ring-img">Delete</a>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <label for="Necklace" class="">Necklace Image</label>
                    <input type="file" name="necklace_image" id="necklace_image" class="form-control">
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-3">
                            <img id="uploaded-necklace-image-preview" src="{{url('/')}}/necklace_image/{{$collection->necklace_image}}" width="80px" alt="">
                            <input type="hidden" name="hidden_necklace_image" class="hidden_necklace_image" value="{{$collection->necklace_image}}">
                        </div>
                        <div class="col-md-9">
                            @if (!blank($collection->necklace_image))
                                <a href="javascript:void(0);" class="text-danger delete-necklace-img">Delete</a>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <label for="Ear Jewelry" class="">Ear jewellery Image</label>
                    <input type="file" name="ear_jewelry_mage" id="ear_jewelry_mage" class="form-control">
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-3">
                            <img id="uploaded-ear_jewelry-image-preview" src="{{url('/')}}/ear_jewelry_mage/{{$collection->ear_jewelry_mage}}" width="80px" alt="">
                            <input type="hidden" name="hidden_ear_jewelry_image" class="hidden_ear_jewelry_image" value="{{$collection->ear_jewelry_mage}}">
                        </div>
                        <div class="col-md-9">
                            @if (!blank($collection->ear_jewelry_mage))
                                <a href="javascript:void(0);" class="text-danger delete-ear_jewelry-img">Delete</a>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <label for="Ring" class="">Brecelets Image</label>
                    <input type="file" name="bracelets_image" id="bracelets_image" class="form-control">
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-3">
                            <img id="uploaded-bracelets-image-preview" src="{{url('/')}}/bracelets_image/{{$collection->bracelets_image}}" width="80px" alt="">
                            <input type="hidden" name="hidden_bracelets_image" class="hidden_bracelets_image" value="{{$collection->bracelets_image}}">
                        </div>
                        <div class="col-md-9">
                            @if (!blank($collection->bracelets_image))
                                <a href="javascript:void(0);" class="text-danger delete-bracelets-img">Delete</a>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <input type="hidden" name="id" value="{{$collection->id}}">
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
    CKEDITOR.replace("ckplot1");
    $('#Image').change(function(){
        let reader = new FileReader();
        reader.onload = (e) => {
            $('#product_image').attr('src', e.target.result);
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
    $('#MenuImage').change(function(){
        let reader = new FileReader();
        reader.onload = (e) => {
            $('#uploaded-menu-image-preview').attr('src', e.target.result);
        }
        reader.readAsDataURL(this.files[0]);
        $('.delete-menu-img').show();
    });
    $(document).on('click','.delete-menu-img',function(){
        $('#uploaded-menu-image-preview').attr('src','');
        $('.hidden_menu_image').val('');
        $('#Menuimage').val('');
        $('.delete-menu-img').hide();
    })
    $('#ring_image').change(function(){
        let reader = new FileReader();
        reader.onload = (e) => {
            $('#uploaded-ring-image-preview').attr('src', e.target.result);
        }
        reader.readAsDataURL(this.files[0]);
        $('.delete-ring-img').show();
    });
    $(document).on('click','.delete-ring-img',function(){
        $('#uploaded-ring-image-preview').attr('src','');
        $('.hidden_ring_image').val('');
        $('#ring_image').val('');
        $('.delete-ring-img').hide();
    })
    $('#necklace_image').change(function(){
        let reader = new FileReader();
        reader.onload = (e) => {
            $('#uploaded-necklace-image-preview').attr('src', e.target.result);
        }
        reader.readAsDataURL(this.files[0]);
        $('.delete-necklace-img').show();
    });
    $(document).on('click','.delete-necklace-img',function(){
        $('#uploaded-necklace-image-preview').attr('src','');
        $('.hidden_necklace_image').val('');
        $('#necklace_image').val('');
        $('.delete-necklace-img').hide();
    })
    $('#ear_jewelry_mage').change(function(){
        let reader = new FileReader();
        reader.onload = (e) => {
            $('#uploaded-ear_jewelry-image-preview').attr('src', e.target.result);
        }
        reader.readAsDataURL(this.files[0]);
        $('.delete-ear_jewelry-img').show();
    });
    $(document).on('click','.delete-ear_jewelry-img',function(){
        $('#uploaded-ear_jewelry-image-preview').attr('src','');
        $('.hidden_ear_jewelry_mage').val('');
        $('#ear_jewelry_mage').val('');
        $('.delete-ear_jewelry-img').hide();
    })
    $('#bracelets_image').change(function(){
        let reader = new FileReader();
        reader.onload = (e) => {
            $('#uploaded-bracelets-image-preview').attr('src', e.target.result);
        }
        reader.readAsDataURL(this.files[0]);
        $('.delete-bracelets-img').show();
    });
    $(document).on('click','.delete-bracelets-img',function(){
        $('#uploaded-bracelets-image-preview').attr('src','');
        $('.hidden_bracelets_image').val('');
        $('#bracelets_image').val('');
        $('.delete-bracelets-img').hide();
    })
</script>
@endsection
