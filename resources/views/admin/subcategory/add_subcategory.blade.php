@extends('admin.layouts.app')

@section('content')
    <div class="card mt-md-3 mb-3">
        <div class="card-body d-flex align-items-center p-lg-3 p-2 staff_header">
            <div class="pe-4 fs-5">Add Sub-Category</div>
            <div class="ms-auto">
                <a href="{{ route('admin.subcategory') }}" class="btn gc_btn">Go Back</a>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.add.subcategorydata') }}" method="POST" enctype="multipart/form-data" class="row g-3">
                @csrf

                <div class="col-md-6">
                    <label for="Name" class="form-label">Sub_Category <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="name" id="Name" value="{{old('name')}}" placeholder="" autofocus />
                    @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                </div>
                <div class="col-md-6">
                    <label for="Slug" class="form-label">Slug</label>
                    <input type="text" class="form-control" name="slug" id="Slug" value="{{old('slug')}}" placeholder=""/>
                    @if ($errors->has('slug'))
                        <span class="text-danger">{{ $errors->first('slug') }}</span>
                    @endif
                </div>

                <div class="col-md-12">

                    <label for="Parent" class="form-label">Parent <span class="text-danger">*</span></label>
                    <select name="category_id" id="Parent" class="form-control">
                        <option value="0" {{ old('category_id') == 0 ? 'selected' : '' }} hidden>Select Parent</option>
                        @foreach ($categories as $item)
                            <option value="{{$item->id}}" {{ old('category_id') == $item->id ? 'selected' : '' }}>
                                {{$item->name}}
                            </option>
                        @endforeach
                    </select>
                    @if ($errors->has('category_id'))
                        <span class="text-danger">{{ $errors->first('category_id') }}</span>
                    @endif
                </div>

                <div class="col-md-6">
                    <label for="Meta_Text" class="form-label">Meta_Text</label>
                    <input type="text" class="form-control" name="meta_text" id="MetaText" value="{{old('meta_text')}}" placeholder="" />
                    @if ($errors->has('meta_text'))
                        <span class="text-danger">{{ $errors->first('meta_text') }}</span>
                    @endif
                </div>
                <div class="col-md-6">
                    <label for="Meta_Description" class="form-label">Meta_Description</label>
                    <input type="text" class="form-control" name="meta_description" id="MetaDescription" value="{{old('meta_description')}}" placeholder="" />
                    @if ($errors->has('meta_description'))
                        <span class="text-danger">{{ $errors->first('meta_description') }}</span>
                    @endif
                </div>
                <div class="col-md-12">
                    <label for="Keywords" class="form-label">Keywords</label>
                    <input type="text" class="form-control" name="keywords" id="Keywords" value="{{old('keywords')}}" placeholder="" />
                    @if ($errors->has('keywords'))
                        <span class="text-danger">{{ $errors->first('keywords') }}</span>
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
                    <button type="submit" class="btn gc_btn mt-3">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('script')
<script>

</script>
@endsection
