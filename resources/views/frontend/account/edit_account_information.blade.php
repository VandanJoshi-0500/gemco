@extends('frontend.layouts.account')

@section('css')
    <link rel="stylesheet" href="{{ url('frontend/css/style.css') }}">
@endsection

@section('content')
    <!-- Main Content -->
    <div class="col-md-9 p-4 my-dashboard-right-container">
        {{-- <div class="bg-transparent" id="existing-address-container">
            <h4 class="page-main-title">Address Book</h4>
            <hr>

            <div class="row bg-transparent mt-4">
                <div class="col-md-4 bg-transparent">
                    <div class="card p-3 mb-3">
                        <h6 class="bg-transparent"><strong class="bg-transparent">Address</strong></h6>
                        <span class="bg-transparent">{{$user->first_name.' '.$user->last_name}}</span>
                        <span class="bg-transparent">{{$user->streetaddress}}</span>
                        <span class="bg-transparent">{{$user->city}}, {{$state->name ?? 'N/A'}}, {{$user->zipcode}}</span>
                        <span class="bg-transparent">{{$country->name ?? 'N/A'}}</span>
                        <span class="bg-transparent">T: {{$user->phone}}</span>

                        <a href="{{route('edit_account_information',$user->id)}}" class="edit-link bg-transparent mt-3">Edit Address</a>
                    </div>
                </div>
            </div>
        </div> --}}


        <div class="bg-transparent" id="edit-existing-address">
            <h4 class="mb-4 bg-transparent">Edit Address</h4>
            <hr />
            <form action="{{ route('updateaddressbook') }}" method="post">
                @csrf
                <div class="row mb-3 bg-transparent">
                    <div class="col-md-6 bg-transparent">
                        <input type="text" name="first_name" class="form-control" placeholder="First Name *"
                            aria-label="First name" value="{{ $user->first_name }}" />
                        @if ($errors->has('first_name'))
                            <span class="text-danger">{{ $errors->first('first_name') }}</span>
                        @endif
                    </div>
                    <div class="col-md-6 bg-transparent">
                        <input type="text" name="last_name" class="form-control" placeholder="Last Name *"
                            aria-label="Last name" value="{{ $user->last_name }}" />
                        @if ($errors->has('last_name'))
                            <span class="text-danger">{{ $errors->first('last_name') }}</span>
                        @endif
                    </div>
                </div>

                <div class="row mb-3 bg-transparent">
                    <div class="col-md-6 bg-transparent">
                        <input type="url" name="website" class="form-control" id="website" placeholder="Website"
                            value="{{ $user->website }}" />
                        @if ($errors->has('website'))
                            <span class="text-danger">{{ $errors->first('website') }}</span>
                        @endif
                    </div>
                    <div class="col-md-6 bg-transparent">
                        <input type="text" name="company" class="form-control" id="company" placeholder="Company"
                            value="{{ $user->company }}" />
                        @if ($errors->has('company'))
                            <span class="text-danger">{{ $errors->first('company') }}</span>
                        @endif
                    </div>
                </div>

                <div class="row mb-3 bg-transparent">
                    <div class="col-md-6 bg-transparent">
                        <input type="text" name="streetaddress" class="form-control" id="streetaddress"
                            placeholder="Street Address *" value="{{ $user->streetaddress }}">
                        @if ($errors->has('streetaddress'))
                            <span class="text-danger">{{ $errors->first('streetaddress') }}</span>
                        @endif
                    </div>
                    <div class="col-md-6 bg-transparent">
                        <input type="text" name="city" class="form-control" id="city" placeholder="City *"
                            value="{{ $user->city }}">
                        @if ($errors->has('city'))
                            <span class="text-danger">{{ $errors->first('city') }}</span>
                        @endif
                    </div>
                </div>

                <div class="row mb-3 bg-transparent">
                    <div class="col-md-6 bg-transparent">
                        {{-- <select class="form-select">
                            <option selected>New York</option>
                            <option>California</option>
                            <option>Texas</option>
                        </select> --}}
                        <select id="inputState" name="state" class="form-control">
                            <option selected>State / Provience *</option>
                            {{-- @if (!blank($states))
                            @foreach ($states as $state)
                                <option value="{{$state['id']}}" @if (old('state') == $state['id']) selected @elseif($state['id'] == $user->state) selected @endif>{{$state['name']}}</option>
                            @endforeach
                        @endif --}}
                            @if (!empty($states))
                                @foreach ($states as $state)
                                    <option value="{{ $state['id'] }}"
                                        @if (old('state') == $state['id']) selected @elseif($state['id'] == $user->state) selected @endif>
                                        {{ $state['name'] }}</option>
                                @endforeach
                            @endif
                        </select>
                        @if ($errors->has('state'))
                            <span class="text-danger">{{ $errors->first('state') }}</span>
                        @endif
                    </div>
                    <div class="col-md-6 bg-transparent">
                        <select id="inputCountry" name="country" class="form-control">
                            <option selected>Select Country *</option>
                            @if (!blank($countries))
                                @foreach ($countries as $country)
                                    <option value="{{ $country['id'] }}"
                                        @if (old('country') == $country['id']) selected @elseif($country['id'] == $user->country) selected @endif>
                                        {{ $country['name'] }}</option>
                                @endforeach
                            @endif
                        </select>
                        @if ($errors->has('country'))
                            <span class="text-danger">{{ $errors->first('country') }}</span>
                        @endif
                        {{-- <select class="form-select">
                            <option selected>United States</option>
                            <option>Canada</option>
                            <option>UK</option>
                        </select> --}}
                    </div>
                </div>

                <div class="row mb-3 bg-transparent">
                    <div class="col-md-6 bg-transparent">
                        <input type="text" name="zipcode" class="form-control" id="zipcode" placeholder="Zip Code *"
                            value="{{ $user->zipcode }}">
                        @if ($errors->has('zipcode'))
                            <span class="text-danger">{{ $errors->first('zipcode') }}</span>
                        @endif
                    </div>
                    <div class="col-md-6 bg-transparent">
                        <input type="phone" name="phone" class="form-control" id="telephone" placeholder="Telephone"
                            value="{{ $user->phone }}">
                        @if ($errors->has('phone'))
                            <span class="text-danger">{{ $errors->first('phone') }}</span>
                        @endif
                    </div>
                </div>

                <div class="row mb-4 bg-transparent">
                    <div class="col-md-6 bg-transparent">
                        <input type="number" name="fax" class="form-control" id="fax" placeholder="Fax"
                            value="{{ $user->fax }}">
                        @if ($errors->has('fax'))
                            <span class="text-danger">{{ $errors->first('fax') }}</span>
                        @endif
                    </div>
                </div>

                <div class="d-flex justify-content-between bg-transparent">
                    <input type="hidden" name="id" value="{{ $user->id }}">
                    <a href="{{ route('address_book') }}" class="btn btn-secondary w-25 save_adddress me-3">Back</a>
                    <button type="submit" class="btn btn-warning text-white w-25 save_adddress">SAVE ADDRESS</button>
                    {{-- <button type="button" class="btn btn-secondary w-25">BACK</button> --}}
                </div>
            </form>
        </div>

    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $(document).on('change', '#inputCountry', function() {
                var country = $(this).val();
                $.ajax({
                    url: "{{ route('stateByCountry', '') }}" + "/" + country,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('#inputState').html(data);
                    }
                });
            });
        });
    </script>
@endsection
