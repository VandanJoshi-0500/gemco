@extends('admin.layouts.app')

@section('content')
<div class="gc_row">
    <div class="card mt-md-3 mb-3">
        <div class="card-body d-flex align-items-center p-lg-3 p-2 staff_header">
            <div class="pe-4 fs-5">Add Page</div>
            <div class="ms-auto">
                <a href="{{route('admin.pages')}}" class="btn gc_btn">Go Back</a>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <form action="{{route('admin.add.page.data')}}" method="post" enctype="multipart/form-data" class="row g-3">
                @csrf
                <div class="col-md-12">
                    <label for="Title" class="form-label">Page Title <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="title" id="Title" value="{{old('title')}}" placeholder="" autofocus />
                    @if ($errors->has('title'))
                        <span class="text-danger">{{ $errors->first('title') }}</span>
                    @endif
                </div>
                <div class="col-md-12">
                    <label for="Slug" class="form-label">Identifier / Slug <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="slug" id="Slug" value="{{old('slug')}}" placeholder="" />
                    @if ($errors->has('slug'))
                        <span class="text-danger">{{ $errors->first('slug') }}</span>
                    @endif
                </div>
                <div class="col-md-12 ">
                    <label for="description" class="form-label">Description</label>
                    <textarea id="ckplot" name="description"></textarea>
                    @if ($errors->has('description'))
                        <span class="text-danger">{{ $errors->first('description') }}</span>
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
    CKEDITOR.replace("ckplot");
</script>
@endsection
