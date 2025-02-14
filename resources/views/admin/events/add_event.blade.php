@extends('admin.layouts.app')

@section('content')
<div class="gc_row">
    <div class="card mt-md-3 mb-3">
        <div class="card-body d-flex align-items-center p-lg-3 p-2 staff_header">
            <div class="pe-4 fs-5">Add Event</div>
            <div class="ms-auto">
                <a href="{{route('admin.events')}}" class="btn gc_btn">Go Back</a>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <form action="{{route('admin.add.event.data')}}" method="post" enctype="multipart/form-data" class="row g-3">
                @csrf
                <div class="col-md-12">
                    <label for="Name" class="form-label">Show Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="name" id="Name" value="{{old('name')}}" placeholder="" autofocus />
                    @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                </div>
                <div class="col-md-6">
                    <label for="Dates" class="form-label">Dates</label>
                    <input type="text" class="form-control" name="dates" id="Dates" value="{{old('dates')}}" placeholder="" />
                    @if ($errors->has('dates'))
                        <span class="text-danger">{{ $errors->first('dates') }}</span>
                    @endif
                </div>
                <div class="col-md-6">
                    <label for="Booth" class="form-label">Booth</label>
                    <input type="text" class="form-control" name="booth" id="Booth" value="{{old('booth')}}" placeholder="" />
                    @if ($errors->has('booth'))
                        <span class="text-danger">{{ $errors->first('booth') }}</span>
                    @endif
                </div>
                <div class="col-md-6">
                    <label for="StartDate" class="form-label">Start Date</label>
                    <input type="text" class="form-control" name="start_date" id="StartDate" value="{{old('start_date')}}" placeholder="" />
                    @if ($errors->has('start_date'))
                        <span class="text-danger">{{ $errors->first('start_date') }}</span>
                    @endif
                </div>
                <div class="col-md-6">
                    <label for="EndDate" class="form-label">End Date</label>
                    <input type="text" class="form-control" name="end_date" id="EndDate" value="{{old('end_date')}}" placeholder="" />
                    @if ($errors->has('end_date'))
                        <span class="text-danger">{{ $errors->first('end_date') }}</span>
                    @endif
                </div>
                <div class="col-md-12">
                    <label for="Link" class="form-label">Event Link</label>
                    <input type="text" class="form-control" name="link" id="Link" value="{{old('link')}}" placeholder="" />
                    @if ($errors->has('link'))
                        <span class="text-danger">{{ $errors->first('link') }}</span>
                    @endif
                </div>
                <div class="col-md-10">
                    <label for="Image" class="form-label" style="top:0px !important;">Event Logo</label>
                    <input type="file" class="form-control" name="image" id="Image" />
                    @if ($errors->has('image'))
                        <span class="text-danger">{{ $errors->first('image') }}</span>
                    @endif
                </div>
                <div class="col-md-2">
                    <img src="{{url('/')}}/assets/Images/upload.png" class="product_preview upload w-50" id="product_image">
                </div>
                <div class="col-md-10">
                    <label for="HomeImage" class="form-label" style="top:0px !important;">Home page popup image logo</label>
                    <input type="file" class="form-control" name="home_image" id="HomeImage" />
                    @if ($errors->has('home_image'))
                        <span class="text-danger">{{ $errors->first('home_image') }}</span>
                    @endif
                </div>
                <div class="col-md-2">
                    <img src="{{url('/')}}/assets/Images/upload.png" class="event_preview upload w-50" id="event_image">
                </div>
                <div class="col-md-12">
                    <label for="orderNo" class="form-label">Order No</label>
                    <input type="text" class="form-control" name="order_no" id="orderNo" value="{{old('order_no')}}" placeholder="" />
                    @if ($errors->has('order_no'))
                        <span class="text-danger">{{ $errors->first('order_no') }}</span>
                    @endif
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
         $('#Image').change(function(){
            let reader = new FileReader();
            reader.onload = (e) => {
                $('.product_preview').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        });
        $('#HomeImage').change(function(){
            let reader = new FileReader();
            reader.onload = (e) => {
                $('.event_preview').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        });
    </script>
@endsection
