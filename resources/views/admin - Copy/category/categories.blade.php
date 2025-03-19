@extends('admin.layouts.app')

@section('content')
<div class="row">
    <div class="col-md-5">
        <div class="card">
            <div class="card-body">
                @if(Session::has('alert'))
                    <p class="alert
                    {{ Session::get('alert-class', 'alert-danger') }}">{{Session::get('alert') }}</p>
                @endif
                <form action="{{route('admin.add_category_data')}}" method="POST" class="row g-3" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-12">
                        <label for="Name" class="form-label">Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="name" id="Name" placeholder="Category Name" value="{{old('name')}}">
                        @if ($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <div class="col-md-12">
                        <label for="Slug" class="form-label">Slug <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="slug" id="Slug" placeholder="Category Slug" value="{{old('slug')}}">
                        @if ($errors->has('slug'))
                            <span class="text-danger">{{ $errors->first('slug') }}</span>
                        @endif
                    </div>
                    <div class="col-md-12">
                        <label for="Parent" class="form-label">Parent</label>
                        <select name="parent" id="Parent" class="form-control">
                            <option value="0" selected hidden>Select Parent Category</option>
                            @foreach ($categories as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('parent'))
                            <span class="text-danger">{{ $errors->first('parent') }}</span>
                        @endif
                    </div>
                    <div class="col-md-12">
                        <label for="Description" class="form-label">Description</label>
                        <textarea name="description" id="ckplot1" class="form-control">{{old('description')}}</textarea>
                        @if ($errors->has('description'))
                            <span class="text-danger">{{ $errors->first('description') }}</span>
                        @endif
                    </div>
                    <div class="col-md-12">
                        <label for="OrderNo" class="form-label">Order No</label>
                        <input type="text" class="form-control" name="order_no" id="OrderNo" placeholder="Order No" value="{{old('order_no')}}">
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
                    <div class="col-md-12 upload">
                        <label for="Image" class="form-label">Category Image</label>
                        <input type="file" name="image" id="Image" class="form-control">
                        @if ($errors->has('image'))
                            <span class="text-danger">{{ $errors->first('image') }}</span>
                        @endif
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
                        <label for="MenuImage" class="form-label">Menu Image</label>
                        <input type="file" name="menu_image" id="MenuImage" class="form-control">
                        @if ($errors->has('menu_image'))
                            <span class="text-danger">{{ $errors->first('menu_image') }}</span>
                        @endif
                    </div>
                    <div class="col-md-12">
                        <label for="MetaText" class="form-label">Meta Text</label>
                        <input type="text" class="form-control" name="meta_text" id="MetaText" value="{{old('meta_text')}}" placeholder="" />
                        @if ($errors->has('meta_text'))
                            <span class="text-danger">{{ $errors->first('meta_text') }}</span>
                        @endif
                    </div>
                    <div class="col-md-12">
                        <label for="MetaDescription" class="form-label">Meta Description</label>
                        <input type="text" class="form-control" name="meta_description" id="MetaDescription" value="{{old('meta_description')}}" placeholder="" />
                        @if ($errors->has('meta_description'))
                            <span class="text-danger">{{ $errors->first('meta_description') }}</span>
                        @endif
                    </div>
                    <div class="col-md-12">
                        <label for="Keyword" class="form-label">Keyword</label>
                        <input type="text" class="form-control" name="keyword" id="Keyword" value="{{old('keyword')}}" placeholder="" />
                        @if ($errors->has('keyword'))
                            <span class="text-danger">{{ $errors->first('keyword') }}</span>
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
                        <button type="submit" class="btn gc_btn">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-7">
        <div class="card">
            <div class="d-md-flex gap-4 align-items-center p-3">
                <div class="h5 d-none d-md-flex mb-0">All Categories</div>
            </div>
        </div>
        <div class="card mt-3">
            <div class="card-body table-responsive">
                <table id="" class="table rwd-table example1" style="width:100%">
                    <thead>
                        <tr>
                            <th>Category Name</th>
                            {{-- <th>Image</th> --}}
                            <th>Order No</th>
                            <th>Status</th>
                            <th class="text-end">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($parent_categories) > 0)
                            @foreach ($parent_categories as $category)
                                <tr>
                                    <td class="align-middle"><a class="text-primary" href="{{route('admin.edit_category',$category->id)}}">{{$category->name }}</a></td>
                                    {{-- <td class="align-middle">
                                        @if (!blank($category->image))
                                          <img src="{{url('/')}}/public/categories/{{$category->image}}" width="50px" alt="">
                                        @endif
                                    </td> --}}
                                    <td class="align-middle">{{$category->order_id}}</td>
                                    <td class="align-middle">
                                        @if ($category->status == 1)
                                            <span class="badge bg-success">Active</span>
                                        @else
                                            <span class="badge bg-danger">Deactive</span>
                                        @endif
                                    </td>
                                    <td class="text-end align-middle">
                                        <div class="d-flex float-end">
                                            <a href="{{ route('admin.edit_category',$category->id) }}" class=""><i class="ri-edit-2-fill fs-20"></i></a>
                                            <a href="javascript:void(0);" data-id="{{ $category->id }}" class="ms-2 delete-btn"><i class="ri-delete-bin-fill fs-20"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                @foreach ($categories as $item)
                                    @if($category->id == $item->parent)
                                    <tr>
                                        <td class="align-middle"><a href="{{ route('admin.edit_category',$item->id) }}" class="text-primary"><span class="ps-3">- {{$item->name }}</span></a></td>
                                        {{-- <td class="align-middle">
                                            @if (!blank($item->image))
                                              <img src="{{url('/')}}/public/categories/{{$item->image}}" width="50px" alt="">
                                            @endif
                                        </td> --}}
                                        <td class="align-middle">{{$item->order_id}}</td>
                                        <td class="align-middle">
                                            @if ($item->status == 1)
                                                <span class="badge bg-success">Active</span>
                                            @else
                                                <span class="badge bg-danger">Deactive</span>
                                            @endif
                                        </td>
                                        <td class="text-end align-middle">
                                            <div class="d-flex float-end">
                                                <a href="{{ route('admin.edit_category',$item->id) }}" class=""><i class="ri-edit-2-fill fs-20"></i></a>
                                                <a href="javascript:void(0);" data-id="{{ $item->id }}" class="ms-2 delete-btn"><i class="ri-delete-bin-fill fs-20"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endif
                                @endforeach
                            @endforeach
                        @else
                            <tr class="text-center">
                                <td colspan="6">Categories not found.</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
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
<script>

    $(document).ready(function(){
        $(document).on('click','.delete-btn',function(){
            var category_id = $(this).attr('data-id');
            Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url : "{{route('delete.category', '')}}"+"/"+category_id,
                    type : 'GET',
                    dataType:'json',
                    success : function(data) {
                        Swal.fire({
                            title: 'Deleted!',
                            text: "Category has been deleted.",
                            icon: 'success',
                            showCancelButton: false,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Ok'
                            }).then((result) => {
                            if (result.isConfirmed) {
                                top.location.href="{{ route('admin.categories') }}";
                            }
                        });
                    }
                });
            }
            });
        });
    });
</script>
@endsection
