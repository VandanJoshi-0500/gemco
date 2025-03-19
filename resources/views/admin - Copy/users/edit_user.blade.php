@extends('admin.layouts.app')

@section('content')
<div class="gc_row">
    <div class="card mt-md-3 mb-3">
        <div class="card-body d-flex align-items-center p-lg-3 p-2 staff_header">
            <div class="pe-4 fs-5">Edit Customer</div>
            <div class="ms-auto">
                <a href="{{route('admin.users')}}" class="btn gc_btn">Go Back</a>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <form action="{{route('admin.update.users')}}" method="post" class="row g-3">
                @csrf
                <div class="col-md-6">
                    <label for="FirstName" class="form-label">First Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="first_name" id="FirstName" value="{{$user->first_name}}" placeholder="" autofocus />
                    @if ($errors->has('first_name'))
                        <span class="text-danger">{{ $errors->first('first_name') }}</span>
                    @endif
                </div>
                <div class="col-md-6">
                    <label for="LastName" class="form-label">Last Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="last_name" id="LastName" value="{{$user->last_name}}" placeholder="" autofocus />
                    @if ($errors->has('last_name'))
                        <span class="text-danger">{{ $errors->first('last_name') }}</span>
                    @endif
                </div>
                <div class="col-md-6">
                    <label for="email" class="form-label">Email Address <span class="text-danger">*</span></label>
                    <input type="email" class="form-control" name="email" id="email" value="{{$user->email}}" placeholder="" />
                    @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                </div>
                <div class="col-md-6">
                    <label for="Website" class="form-label">Website </label>
                    <input type="url" class="form-control" name="website" id="Website" value="{{$user->website}}" placeholder="" />
                    @if ($errors->has('website'))
                        <span class="text-danger">{{ $errors->first('website') }}</span>
                    @endif
                </div>
                <div class="col-md-6">
                    <label for="Company" class="form-label">Company </label>
                    <input type="text" class="form-control" name="company" id="Company" value="{{$user->company}}" placeholder="" />
                    @if ($errors->has('company'))
                        <span class="text-danger">{{ $errors->first('company') }}</span>
                    @endif
                </div>
                <div class="col-md-6">
                    <label for="StreetAddress" class="form-label">Street Address <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="streetaddress" id="StreetAddress" value="{{$user->streetaddress}}" placeholder="" />
                    @if ($errors->has('streetaddress'))
                        <span class="text-danger">{{ $errors->first('streetaddress') }}</span>
                    @endif
                </div>
                <div class="col-md-6">
                    <label for="City" class="form-label">City <span class="text-danger">*</span> </label>
                    <input type="text" class="form-control" name="city" id="City" value="{{$user->city}}" placeholder="" />
                    @if ($errors->has('city'))
                        <span class="text-danger">{{ $errors->first('city') }}</span>
                    @endif
                </div>
                <div class="col-md-6">
                    <label for="State" class="form-label">State </label>
                    <select id="State" name="state" class="form-control">
                        <option value="0" selected>State / Provience *</option>
                        @if(!blank($states))
                            @foreach ($states as $state)
                                <option value="{{$state['id']}}" @if(old('state') == $state['id']) selected @elseif($state['id'] == $user->state) selected @endif>{{$state['name']}}</option>
                            @endforeach
                        @endif
                    </select>
                    @if ($errors->has('state'))
                        <span class="text-danger">{{ $errors->first('state') }}</span>
                    @endif
                </div>
                <div class="col-md-6">
                    <label for="Country" class="form-label">Country </label>
                    <select name="country" id="Country" class="form-control">
                        <option value="0" selected>Select Country *</option>
                        @if(!blank($countries))
                            @foreach ($countries as $country)
                                <option value="{{$country['id']}}" @if(old('country') == $country['id']) selected @elseif($country['id'] == $user->country) selected @endif>{{$country['name']}}</option>
                            @endforeach
                        @endif
                    </select>
                    @if ($errors->has('country'))
                        <span class="text-danger">{{ $errors->first('country') }}</span>
                    @endif
                </div>
                <div class="col-md-6">
                    <label for="ZipCode" class="form-label">Zip Code </label>
                    <input type="text" class="form-control" name="zipcode" id="ZipCode" value="{{$user->zipcode}}" placeholder="" />
                    @if ($errors->has('zipcode'))
                        <span class="text-danger">{{ $errors->first('zipcode') }}</span>
                    @endif
                </div>
                <div class="col-md-6">
                    <label for="Phone" class="form-label">Phone Number <span class="text-danger">*</span></label>
                    <input type="tel" class="form-control" name="phone" id="Phone" value="{{$user->phone}}" placeholder="" />
                    @if ($errors->has('phone'))
                        <span class="text-danger">{{ $errors->first('phone') }}</span>
                    @endif
                </div>
                <div class="col-md-6">
                    <label for="password" class="form-label">Password (Leave blank if don't want to change)</label>
                    <input class="form-control" id="password" name="password" placeholder=""  />
                    @if ($errors->has('password'))
                        <span class="text-danger">{{ $errors->first('password') }}</span>
                    @endif
                </div>
                <div class="col-md-6">
                    <label for="Fax" class="form-label">Fax </label>
                    <input type="text" class="form-control" name="fax" id="Fax" value="{{$user->fax}}" placeholder="" />
                    @if ($errors->has('fax'))
                        <span class="text-danger">{{ $errors->first('fax') }}</span>
                    @endif
                </div>
                <div class="col-md-6">
                    <label for="UserGroup" class="form-label">User Group </label>
                    <select name="user_group" id="UserGroup" class="form-control">
                        <option value="0">Select Customer Group...</option>
                        @if(!blank($groups))
                            @foreach ($groups as $item)
                                <option value="{{$item->id}}" @if($user->user_group == $item->id) selected @endif>{{$item->name}}</option>
                            @endforeach
                        @endif
                    </select>
                    @if ($errors->has('user_group'))
                        <span class="text-danger">{{ $errors->first('user_group') }}</span>
                    @endif
                </div>
                <div class="col-md-6">
                    <label for="DiscountPercentage" class="form-label">Discount Percentage </label>
                    <input type="number" class="form-control" name="discount_percentage" id="DiscountPercentage" value="{{$user->discount_percentage}}" placeholder="" />
                    @if ($errors->has('discount_percentage'))
                        <span class="text-danger">{{ $errors->first('discount_percentage') }}</span>
                    @endif
                </div>
                <div class="col-md-6">
                    <label for="Status" class="">
                        Status <span class="text-danger">*</span>
                    </label>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" name="status" @if($user->status == 1) checked @endif id="flexSwitchCheckChecked" />
                        <label class="form-check-label" for="flexSwitchCheckChecked"></label>
                    </div>
                </div>
                <div class="col-12">
                    <input type="hidden" name="user_id" value="{{$user->id}}">
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
    $(document).ready(function(){
        $(document).on('change','#Country',function(){
            var country = $(this).val();
            $.ajax({
                url : "{{route('stateByCountry', '')}}"+"/"+country,
                type : 'GET',
                dataType:'json',
                success : function(data) {
                    $('#State').html(data);
                }
            });
        });
    });
</script>
@endsection
