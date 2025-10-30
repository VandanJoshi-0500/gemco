@extends('frontend.layouts.app')

@section('content')
    <section class=" gradient-form">
        <div class="container ">
            <div class="row d-flex justify-content-center align-items-center py-5 gradient-form">
                <div class="col-md-6 col-lg-5 col-xl-4 bg-transparent">
                    <div class="card  p-4" style="border-radius: 15px;">

                        {{-- Error and success notification --}}
                        <div class="mt-2">
                            @if ($errors->any())
                                <div class="col-12">
                                    @foreach ($error->all() as $error)
                                        <div class="alert alert-danger">{{ $error }}</div>
                                    @endforeach
                                </div>
                            @endif
                            @if (session()->has('error'))
                                <div class="alert alert-danger">{{ session('error') }}</div>
                            @endif
                            @if (session()->has('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif
                        </div>

                        <div class="text-center bg-transparent ">
                            <!-- <img src="{{ asset('frontend/Assets/lotus.png') }}" alt="Logo" style="width: 100px;" /> -->
                            <h4 class="my-4 fw-bold bg-transparent">Forgot Password</h4>
                        </div>

                        {{-- action="{{ route('password.email') }}" --}}
                        <form method="POST" action="{{ route('reset.password.post') }}" class="mt-4">
                            @csrf
                            <input type="text" name="token" hidden value={{$token}}>
                            <div class="form-outline mb-4 bg-transparent">
                                <label class="form-label bg-transparent">Enter Email Address</label>
                                <input type="email" class="form-control" name="email" placeholder="Enter Email Address" />
                            </div>
                            <!-- <div class="form-outline mb-4 bg-transparent">
                                    <label class="form-label bg-transparent">Enter new password</label>
                                    <input type="password" class="form-control" name="password"
                                        placeholder="Enter new password" id="password" />
                                    <span class="position-absolute end-0 top-50 translate-middle-y me-3"
                                        onclick="togglePassword('password', 'togglePasswordIcon')" style="cursor: pointer;">
                                        <i class="fa fa-eye" id="togglePasswordIcon"></i>
                                    </span>
                                </div>
                                <div class="form-outline mb-4 bg-transparent">
                                    <label class="form-label bg-transparent">Confirm Password</label>
                                    <input type="password" class="form-control" name="password_confirmation"
                                        placeholder="Confirm Password" id="password_confirmation"/>
                                    <span class="position-absolute end-0 top-50 translate-middle-y me-3"
                                        onclick="togglePassword('password_confirmation', 'toggleConfirmIcon')"
                                        style="cursor: pointer;">
                                        <i class="fa fa-eye" id="toggleConfirmIcon"></i>
                                    </span>
                                </div> -->
                            <div class="form-outline mb-4 bg-transparent position-relative">
                                <label class="form-label bg-transparent">Enter new password</label>
                                <input type="password" class="form-control" name="password" id="password"
                                    placeholder="Enter new password" />
                                <span class="eyeiconpasswordreset translate-middle-y me-3"
                                    onclick="togglePassword('password', 'togglePasswordIcon')" style="cursor: pointer;">
                                    <i class="fa fa-eye" id="togglePasswordIcon"></i>
                                </span>
                            </div>

                            <div class="form-outline mb-4 bg-transparent position-relative">
                                <label class="form-label bg-transparent">Confirm Password</label>
                                <input type="password" class="form-control" name="password_confirmation"
                                    id="password_confirmation" placeholder="Confirm Password" />
                                <span class="eyeiconpasswordreset translate-middle-y me-3"
                                    onclick="togglePassword('password_confirmation', 'toggleConfirmIcon')"
                                    style="cursor: pointer;">
                                    <i class="fa fa-eye" id="toggleConfirmIcon"></i>
                                </span>
                            </div>

                            <div class="d-grid mb-3">
                                {{-- {{route('user.otp')}} --}}
                                <button type="submit" class="btn text-white"
                                    style="background-color: #000; color: white;">Reset Password</button>
                                {{-- <a href="" type="submit" class="btn text-white"
                                    style="background-color: #000; color: white;">
                                    Send OTP
                                </a> --}}
                            </div>

                            <div class="text-center bg-transparent">
                                <p class="mb-0 text-center">
                                    <a href="{{ route('login') }}"
                                        class="text-decoration-underline text-muted bg-transparent ">Back To Login</a>
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- <script>
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
            </script> -->

    <script>
        function togglePassword(inputId, iconId) {
            const input = document.getElementById(inputId);
            const icon = document.getElementById(iconId);
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