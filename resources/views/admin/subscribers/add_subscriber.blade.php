@extends('admin.layouts.app')

@section('content')
<div class="card mt-md-3 mb-3">
    <div class="card-body d-flex align-items-center p-lg-3 p-2 staff_header">
        <div class="pe-4 fs-5">Add Subscriber</div>
        <div class="ms-auto">
            <a href="{{route('admin.subscribers')}}" class="btn gc_btn">Go Back</a>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <form action="{{route('admin.add.subscriber.data')}}" method="post" enctype="multipart/form-data" class="row g-3">
            @csrf
            <div class="col-md-12">
                <label for="Email" class="form-label">Email Address <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="email" id="Email" value="{{old('email')}}" placeholder="" autofocus />
                @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
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
