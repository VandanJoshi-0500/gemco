@extends('frontend.layouts.main')

@section('content')
    <section class="gradient-form">
        <div class="container">
            <div class="row d-flex justify-content-center align-items-center py-5 gradient-form">
                <div class="col-md-8 col-lg-6 col-xl-5 bg-transparent">
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
                                    <label class="form-label bg-transparent">Phone Number</label>
                                    <input type="text" name="phone" class="form-control" value="{{ old('phone') }}"
                                        placeholder="Enter Phone Number" required />
                                    @error('phone')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Password and Confirm Password Row -->
                            <div class="row mb-4 bg-transparent">
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
                                <div class="col-md-6 bg-transparent">
                                    <label class="form-label bg-transparent">Confirm Password</label>
                                    <div class="input-group">
                                        <input type="password" name="confirm_password" id="ConfirmPassword"
                                            class="form-control" placeholder="Confirm Password" required/>
                                        <span class="input-group-text bg-transparent" onclick="toggleConfirmPassword()"
                                            style="cursor: pointer;">
                                            <i class="fa fa-eye bg-transparent" id="toggleConfirmIcon"></i>
                                        </span>
                                        @error('confirm_password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="d-grid mb-3">
                                <button type="submit" class="btn text-white" style="background-color: #b4963e;">
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
@endsection
