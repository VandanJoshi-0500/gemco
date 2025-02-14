@extends('admin.layouts.app')

@section('content')
<div class="gc_row">
    <div class="card mt-md-3 mb-3">
        <div class="card-body d-flex align-items-center p-lg-3 p-2 staff_header">
            <div class="pe-4 fs-5">Edit Customer Group</div>
            <div class="ms-auto">
                <a href="{{route('admin.user.groups')}}" class="btn gc_btn">Go Back</a>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <form action="{{route('admin.update.user')}}" method="post" class="row g-3">
                @csrf
                <div class="col-md-12">
                    <label for="GroupName" class="form-label">Group Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="name" id="GroupName" value="{{$group->name}}" placeholder="" />
                    @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                </div>
                <div class="col-md-12">
                    <label for="taxClass" class="form-label">Tax Class <span class="text-danger">*</span></label>
                    <select name="tax_class" id="taxClass" class="form-control">
                        <option value="Retail Customer" @if($group->tax_class == 'Retail Customer') selected @endif>Retail Customer</option>
                    </select>
                    @if ($errors->has('tax_class'))
                        <span class="text-danger">{{ $errors->first('tax_class') }}</span>
                    @endif
                </div>
                <div class="col-md-6">
                    <label for="Status" class="">
                        Status <span class="text-danger">*</span>
                    </label>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" name="status" id="flexSwitchCheckChecked" checked />
                        <label class="form-check-label" for="flexSwitchCheckChecked"></label>
                    </div>
                </div>
                <div class="col-12">
                    <input type="hidden" name="group_id" value="{{$group->id}}">
                    <button type="submit" class="btn gc_btn mt-3">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
