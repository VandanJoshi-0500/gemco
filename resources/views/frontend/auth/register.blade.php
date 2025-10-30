@extends('frontend.layouts.main')

@section('content')
    <section class="gradient-form">
        <div class="container">
            <div class="row d-flex justify-content-center align-items-center py-5 gradient-form">
                <div class="col-md-8 col-lg-6 col-xl-9 bg-transparent">
                    <div class="card p-4" style="border-radius: 15px;">
                        <div class="text-center bg-transparent">
                            <!-- <img src="{{ asset('frontend/Assets/lotus.png') }}" alt="Logo" style="width: 100px;" /> -->
                            <h4 class="my-4 fw-bold bg-transparent">Register</h4>
                        </div>

                        <form action="{{ route('register.post') }}" method="POST">
                            @csrf
                            <!-- First and Last Name Row -->
                            <div class="row mb-4 bg-transparent">
                                <div class="col-md-6 bg-transparent">
                                    <label class="form-label bg-transparent">First Name</label>
                                    <input type="text" name="first_name" class="form-control"
                                        value="{{ old('first_name') }}" aria-label="First name" required
                                        placeholder="Enter First Name" />
                                    @error('first_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6 bg-transparent">
                                    <label class="form-label bg-transparent">Last Name</label>
                                    <input type="text" name="last_name" class="form-control"
                                        value="{{ old('last_name') }}" aria-label="Last name" required
                                        placeholder="Enter Last Name" />
                                    @error('last_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Email and Phone Row -->
                            <div class="row mb-4 bg-transparent">
                                <div class="col-md-6 bg-transparent">
                                    <label class="form-label bg-transparent">Email Id</label>
                                    <input type="email" name="email" class="form-control" value="{{ old('email') }}"
                                        placeholder="Enter Email Id" required />
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6 bg-transparent">
                                    {{-- <input type="url" name="website" class="form-control" id="website"
                                        value="{{ old('website') }}" placeholder="Website">
                                    @if ($errors->has('website'))
                                        <span class="text-danger">{{ $errors->first('website') }}</span>
                                    @endif --}}
                                    <label class="form-label bg-transparent">Website</label>
                                    <input type="url" name="website" class="form-control" id="website"
                                        value="{{ old('website') }}" placeholder="Website" required />
                                    @error('website')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>



                                {{-- phone number --}}
                                {{-- <div class="col-md-6 bg-transparent">
                                    <label class="form-label bg-transparent">Phone Number</label>
                                    <input type="text" name="phone" class="form-control" value="{{ old('phone') }}"
                                        placeholder="Enter Phone Number" required />
                                    @error('phone')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div> --}}
                            </div>


                            <!-- company and street.address Row -->
                            <div class="row mb-4 bg-transparent">
                                <div class="col-md-6 bg-transparent">
                                    <label class="form-label bg-transparent">Company</label>
                                    <input type="text" name="company" class="form-control" id="company"
                                        value="{{ old('company') }}" placeholder="Company" required />
                                    @error($errors->has('company'))
                                        <span class="text-danger">{{ $errors->first('company') }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6 bg-transparent">
                                    <label class="form-label bg-transparent">Street Address</label>
                                    <input type="text" name="streetaddress" class="form-control" id="streetaddress"
                                        value="{{ old('streetaddress') }}" placeholder="Street Address *" />
                                    @error($errors->has('streetaddress'))
                                        <span class="text-danger">{{ $errors->first('streetaddress') }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- City and country Row -->
                            <div class="row mb-4 bg-transparent">
                                <div class="col-md-6 bg-transparent">
                                    <label class="form-label bg-transparent">City</label>
                                    <input type="text" name="city" class="form-control" id="city"
                                        placeholder="City *" value="{{ old('city') }}" required />
                                    @error($errors->has('city'))
                                        <span class="text-danger">{{ $errors->first('city') }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6 bg-transparent">
                                    <label class="form-label bg-transparent">Country</label>
                                    <select id="Country" name="country" class="form-control">
                                        <option value="0" selected>Select Country *</option>
                                        @if (!blank($countries))
                                            @foreach ($countries as $country)
                                                <option value="{{ $country['id'] }}"
                                                    @if (old('country') == $country['id']) selected @endif>
                                                    {{ $country['name'] }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    @if ($errors->has('country'))
                                        <span class="text-danger">{{ $errors->first('country') }}</span>
                                    @endif
                                </div>
                            </div>


                            <!-- state and zip Row -->
                            <div class="row mb-4 bg-transparent">
                                <div class="col-md-6 bg-transparent">
                                    <label class="form-label bg-transparent">State / Provience</label>
                                    <select id="State" name="state" class="form-control">
                                        <option value="0" selected>State / Provience *</option>
                                        @if (!blank($states))
                                            @foreach ($states as $state)
                                                <option value="{{ $state['id'] }}"
                                                    @if (old('state') == $state['id']) selected @elseif($state['id'] == '0') selected @endif>
                                                    {{ $state['name'] }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    @if ($errors->has('state'))
                                        <span class="text-danger">{{ $errors->first('state') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-6 bg-transparent">
                                    <label class="form-label bg-transparent">Zip Code</label>
                                    <input type="text" name="zipcode" class="form-control" id="zipcode"
                                        placeholder="Zip Code *" value="{{ old('zipcode') }}" required>
                                    @if ($errors->has('zipcode'))
                                        <span class="text-danger">{{ $errors->first('zipcode') }}</span>
                                    @endif
                                </div>
                            </div>

                            <!-- Tel and Password Row -->
                            <div class="row mb-4 bg-transparent">
                                <div class="col-md-6 bg-transparent">
                                    <label class="form-label bg-transparent">Telephone</label>
                                    <input type="number" name="phone" class="form-control" id="telephone"
                                        placeholder="Telephone" value="{{ old('phone') }}">
                                    @if ($errors->has('phone'))
                                        <span class="text-danger">{{ $errors->first('phone') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-6 bg-transparent">
                                    <label class="form-label bg-transparent">Password</label>
                                    <div class="input-group">
                                        <input type="password" id="formPassword" name="password" class="form-control"
                                            placeholder="Enter Password" required />
                                        <span class="input-group-text bg-transparent" onclick="togglePassword()"
                                            style="cursor: pointer;">
                                            <i class="fa fa-eye bg-transparent" id="toggleIcon"></i>
                                        </span>
                                        @error('password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Password and Confirm Password Row -->
                            <div class="row mb-4 bg-transparent">
                                {{-- <div class="col-md-6 bg-transparent">
                                    <label class="form-label bg-transparent">Password</label>
                                    <div class="input-group">
                                        <input type="password" id="formPassword" name="password" class="form-control"
                                            placeholder="Enter Password" required />
                                        <span class="input-group-text bg-transparent" onclick="togglePassword()"
                                            style="cursor: pointer;">
                                            <i class="fa fa-eye bg-transparent" id="toggleIcon"></i>
                                        </span>
                                        @error('password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div> --}}
                                <div class="col-md-6 bg-transparent">
                                    <label class="form-label bg-transparent">Confirm Password</label>
                                    <div class="input-group">
                                        <input type="password" name="confirm_password" id="ConfirmPassword"
                                            class="form-control" placeholder="Confirm Password" required />
                                        <span class="input-group-text bg-transparent" onclick="toggleConfirmPassword()"
                                            style="cursor: pointer;">
                                            <i class="fa fa-eye bg-transparent" id="toggleConfirmIcon"></i>
                                        </span>
                                        @error('confirm_password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 bg-transparent">
                                    <label class="form-label bg-transparent">Verification code</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control mb-0"
                                            placeholder="Enter Verification Code *" aria-label="Recipient's username"
                                            aria-describedby="basic-addon2">
                                        <span class="input-group-text" id="basic-addon2">gCna6n8</span>
                                    </div>
                                </div>
                            </div>

                            <div class="d-grid mb-3">
                                {{-- <button type="submit" class="artha-product-list-btn register-btn">Sign Up</button> --}}
                                <button type="submit" class="btn text-white register-btn" style="background-color: #000;">
                                    Create Account
                                </button>
                            </div>

                            <div class="text-center bg-transparent">
                                <p class="mb-0 text-center">Already have an account?
                                    <a href="{{ route('user.login') }}"
                                        class="text-decoration-none text-muted bg-transparent text-decoration-underline">Login</a>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script>
        function togglePassword() {
            const input = document.getElementById("formPassword");
            const icon = document.getElementById("toggleIcon");
            if (input.type === "password") {
                input.type = "text";
                icon.classList.remove("fa-eye");
                icon.classList.add("fa-eye-slash");
            } else {
                input.type = "password";
                icon.classList.remove("fa-eye-slash");
                icon.classList.add("fa-eye");
            }
        }

        function toggleConfirmPassword() {
            const input = document.getElementById("ConfirmPassword");
            const icon = document.getElementById("toggleConfirmIcon");
            if (input.type === "password") {
                input.type = "text";
                icon.classList.remove("fa-eye");
                icon.classList.add("fa-eye-slash");
            } else {
                input.type = "password";
                icon.classList.remove("fa-eye-slash");
                icon.classList.add("fa-eye");
            }
        }
    </script>
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
