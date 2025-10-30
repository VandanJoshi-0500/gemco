@extends('admin.layouts.app')

@section('content')
    <div class="card mt-md-3 mb-3">
        <div class="card-body d-flex align-items-center p-lg-3 p-2 staff_header">
            <div class="pe-4 fs-5">Add Sub-Collection</div>
            <div class="ms-auto">
                <a href="{{ route('admin.subcollection') }}" class="btn gc_btn">Go Back</a>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.add.subcollectiondata') }}" method="POST" enctype="multipart/form-data" class="row g-3">
                @csrf

                <div class="col-md-6">
                    <label for="secoundary_collection_1" class="form-label">Secoundary_Collection_1 <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="secoundary_collection_1" id="secoundary_collection_1" value="{{old('secoundary_collection_1')}}" placeholder="" autofocus />
                    @if ($errors->has('secoundary_collection_1'))
                        <span class="text-danger">{{ $errors->first('secoundary_collection_1') }}</span>
                    @endif
                </div>
                <div class="col-md-6">
                    <label for="secoundary_collection_2" class="form-label">Secoundary_Collection_2</label>
                    <input type="text" class="form-control" name="secoundary_collection_2" id="secoundary_collection_2" value="{{old('secoundary_collection_2')}}" placeholder="" autofocus />
                    @if ($errors->has('secoundary_collection_2'))
                        <span class="text-danger">{{ $errors->first('secoundary_collection_2') }}</span>
                    @endif
                </div>



                <div class="col-md-12">

                    <label for="Parent" class="form-label">Parent <span class="text-danger">*</span></label>
                    <select name="collection_id" id="Parent" class="form-control">
                        <option value="0" {{ old('collection_id') == 0 ? 'selected' : '' }} hidden>Select Parent</option>
                        @foreach ($collections as $item)
                            <option value="{{$item->id}}" {{ old('collection_id') == $item->id ? 'selected' : '' }}>
                                {{$item->name}}
                            </option>
                        @endforeach
                    </select>
                    @if ($errors->has('collection_id'))
                        <span class="text-danger">{{ $errors->first('collection_id') }}</span>
                    @endif
                </div>

                <div class="col-md-6">
                    <label for="Slug" class="form-label">Slug</label>
                    <input type="text" class="form-control" name="slug" id="Slug" value="{{old('slug')}}" placeholder=""/>
                    @if ($errors->has('slug'))
                        <span class="text-danger">{{ $errors->first('slug') }}</span>
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
                <div class="col-md-6">
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
