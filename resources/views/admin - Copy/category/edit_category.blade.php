@extends('admin.layouts.app')

@section('content')
<div class="card mb-2">
    <div class="card-body">
        <div class="d-md-flex gap-4 align-items-center">
            <h4 class="mb-0">Edit Category</h4>
            <div class="ms-auto">
                <a href="{{ route('admin.categories') }}" class="btn gc_btn justify-content-end float-right">
                    Go Back
                </a>
            </div>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-body">
        @if(Session::has('alert'))
            <p class="alert
            {{ Session::get('alert-class', 'alert-danger') }}">{{Session::get('alert') }}</p>
        @endif
        <form action="{{ route('admin.edit.category') }}" method="POST" class="row g-3" enctype="multipart/form-data">
            @csrf
            <div class="col-md-6">
                <label for="Name" class="form-label">Name <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="name" id="Name" placeholder="Category Name" value="{{$category->name}}">
                @if ($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
            </div>
            <div class="col-md-6">
                <label for="Slug" class="form-label">Slug <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="slug" id="Slug" value="{{$category->slug}}">
                @if ($errors->has('slug'))
                    <span class="text-danger">{{ $errors->first('slug') }}</span>
                @endif
            </div>
            <div class="col-md-12">
                <label for="parent" class="form-label">Parent Category</label>
                <select name="parent" id="Parent" class="form-control">
                    <option value="0" selected hidden>Select Parent Category</option>
                    @foreach ($categories as $item)
                        <option value="{{$item->id}}" @if ($category->parent == $item->id) selected @endif>{{$item->name}}</option>
                    @endforeach
                </select>
                @if ($errors->has('parent'))
                    <span class="text-danger">{{ $errors->first('parent') }}</span>
                @endif
            </div>
            <div class="col-md-12">
                <label for="Description" class="form-label">Description</label>
                <textarea name="description" id="ckplot1" class="form-control">{{$category->description}}</textarea>
                @if ($errors->has('description'))
                    <span class="text-danger">{{ $errors->first('description') }}</span>
                @endif
            </div>
            <div class="col-md-12">
                <label for="OrderNo" class="form-label">Order No</label>
                <input type="text" class="form-control" name="order_no" id="OrderNo" placeholder="Order No" value="{{$category->order_id}}">
                @if ($errors->has('order_no'))
                    <span class="text-danger">{{ $errors->first('order_no') }}</span>
                @endif
            </div>
            <div class="col-md-12">
                <label for="Image" class="form-label" >Image Type</label>
                <select name="image_type" id="ImageType" class="form-control">
                    <option value="1" @if($category->image_type == 1) selected @endif>Upload Image</option>
                    <option value="2" @if($category->image_type == 2) selected @endif>Image Link</option>
                </select>
                @if ($errors->has('parent'))
                    <span class="text-danger">{{ $errors->first('parent') }}</span>
                @endif
            </div>
            <div class="row upload @if($category->image_type != 1) d-none @endif mt-3">
                <div class="col-md-8">
                    <label for="Image" class="form-label" style="top:3px !important;">Category Image</label>
                    <input type="file" name="image" id="Image" class="form-control">
                    @if ($errors->has('image'))
                        <span class="text-danger">{{ $errors->first('image') }}</span>
                    @endif
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-3">
                            <img id="uploaded-image-preview" src="{{url('/')}}/public/categories/{{$category->image}}" width="80px" alt="">
                            <input type="hidden" name="hidden_image" class="hidden_image" value="{{$category->image}}">
                        </div>
                        <div class="col-md-9">
                            @if (!blank($category->image))
                                <a href="javascript:void(0);" class="text-danger delete-img">Delete</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 imagelink @if($category->image_type != 2) d-none @endif">
                <div class="col-md-12">
                    <label for="ImageLink" class="form-label">Image Link</label>
                    <input type="text" class="form-control" name="image_link" id="ImageLink" value="{{$category->image}}" placeholder="" />
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
                        <img id="uploaded-menu-image-preview" src="{{url('/')}}/public/categories/{{$category->menu_image}}" width="80px" alt="">
                        <input type="hidden" name="hidden_menu_image" class="hidden_menu_image" value="{{$category->menu_image}}">
                    </div>
                    <div class="col-md-9">
                        @if (!blank($category->menu_image))
                            <a href="javascript:void(0);" class="text-danger delete-menu-img">Delete</a>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <label for="MetaText" class="form-label">Meta Text</label>
                <input type="text" class="form-control" name="meta_text" id="MetaText" value="{{$category->meta_text}}" placeholder="" />
                @if ($errors->has('meta_text'))
                    <span class="text-danger">{{ $errors->first('meta_text') }}</span>
                @endif
            </div>
            <div class="col-md-12">
                <label for="MetaDescription" class="form-label">Meta Description</label>
                <input type="text" class="form-control" name="meta_description" id="MetaDescription" value="{{$category->meta_description}}" placeholder="" />
                @if ($errors->has('meta_description'))
                    <span class="text-danger">{{ $errors->first('meta_description') }}</span>
                @endif
            </div>
            <div class="col-md-12">
                <label for="Keyword" class="form-label">Keyword</label>
                <input type="text" class="form-control" name="keyword" id="Keyword" value="{{$category->keyword}}" placeholder="" />
                @if ($errors->has('keyword'))
                    <span class="text-danger">{{ $errors->first('keyword') }}</span>
                @endif
            </div>
            <div class="col-md-6">
                <label for="Status" class="form-label">Status <span class="text-danger">*</span></label>
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" name="status" id="flexSwitchCheckChecked" @if($category->status==1)
                    checked
                    @endif >
                    <label class="form-check-label" for="flexSwitchCheckChecked"></label>
                </div>
            </div>
            <div class="col-12">
                <input type="hidden" name="category_id" value="{{$category->id}}">
                <button type="submit" class="btn gc_btn">Submit</button>
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
    $('#Image').change(function(){
        let reader = new FileReader();
        reader.onload = (e) => {
            $('#uploaded-image-preview').attr('src', e.target.result);
        }
        reader.readAsDataURL(this.files[0]);
        $('.delete-img').show();
    });
    $(document).on('click','.delete-img',function(){
        $('#uploaded-image-preview').attr('src','');
        $('.hidden_image').val('');
        $('#image').val('');
        $('.delete-img').hide();
    })
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
</script>
@endsection
