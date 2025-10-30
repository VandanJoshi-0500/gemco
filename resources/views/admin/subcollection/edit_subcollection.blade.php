@extends('admin.layouts.app')

@section('content')
<div class="gc_row">
    <div class="card mt-md-3 mb-3">
        <div class="card-body d-flex align-items-center p-lg-3 p-2 staff_header">
            <div class="pe-4 fs-5">Edit Collection</div>
            <div class="ms-auto">
                <a href="{{route('admin.subcollection')}}" class="btn gc_btn">Go Back</a>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <form action="{{route('admin.update.subcollection', $subcollection->id)}}" method="post" enctype="multipart/form-data" class="row g-3">
                @csrf
                <div class="col-md-6">
                    <label for="secoundary_collection_1" class="form-label">Secoundary_Collection_1 <span class="text-danger">*</span></label>
                        <input type="text" name="secoundary_collection_1" id="secoundary_collection_1" class="form-control" value="{{ $subcollection->secoundary_collection_1 }}">
                        @error('secoundary_collection_1')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                </div>
                <div class="col-md-6">
                    <label for="secoundary_collection_2" class="form-label">Secoundary_Collection_2</label>
                        <input type="text" name="secoundary_collection_2" id="secoundary_collection_2" class="form-control" value="{{ $subcollection->secoundary_collection_2 }}">
                        @error('secoundary_collection_2')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                </div>
                <div class="col-md-12">
                    <label for="collection_id" class="form-label">Parent Collection</label>
                        <select name="collection_id" id="collection_id" class="form-select">
                            <option value="">Select Collection</option>
                            @foreach ($collections as $collection)
                                <option value="{{ $collection->id }}" {{ $collection->id == $subcollection->collection_id ? 'selected' : '' }}>
                                    {{ $collection->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('collection_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                </div>
                <div class="col-md-6">
                    <label for="Slug" class="form-label">Slug <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="slug" id="Slug" value="{{$subcollection->slug}}" placeholder="">
                    @if ($errors->has('slug'))
                        <span class="text-danger">{{ $errors->first('slug') }}</span>
                    @endif
                </div>
                <div class="col-md-6">
                    <label for="meta_text" class="form-label">Meta Text</label>
                    <input type="text" name="meta_text" id="meta_text" class="form-control" value="{{ $subcollection->meta_text }}">
                </div>
                <div class="col-md-6">
                    <label for="meta_description" class="form-label">Meta Description</label>
                    <input type="text" name="meta_description" id="meta_description" class="form-control" value="{{ $subcollection->meta_description }}">
                </div>
                <div class="col-md-6">
                    <label for="keywords" class="form-label">Keywords</label>
                    <input type="text" name="keywords" id="keywords" class="form-control" value="{{ $subcollection->keywords }}">
                </div>

                <div class="col-md-6">
                    <label for="Status" class="">Status <span class="text-danger">*</span></label>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" name="status" id="flexSwitchCheckChecked" @if($subcollection->status == 1) checked @endif />
                        <label class="form-check-label" for="flexSwitchCheckChecked"></label>
                    </div>
                </div>

                <div class="col-12">
                    <input type="hidden" name="id" value="{{$subcollection->id}}">
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
