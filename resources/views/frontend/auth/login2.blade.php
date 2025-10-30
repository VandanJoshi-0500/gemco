@extends('frontend.layouts.main')

@section('content')
    <section class=" gradient-form">
        <div class="container ">
            <div class="row d-flex justify-content-center align-items-center py-5 gradient-form">
                <div class="col-md-6 col-lg-5 col-xl-4 bg-transparent">
                    <div class="card  p-4" style="border-radius: 15px;">
                        <div class="text-center bg-transparent ">
                            <!-- <img src="{{ asset('frontend/Assets/lotus.png') }}" alt="Logo" style="width: 100px;" /> -->
                            <h4 class="my-4 fw-bold bg-transparent">Login</h4>
                        </div>
                        {{-- Success message --}}
                        @if (session('register'))
                            <div id="success-message" class="alert alert-success mt-3">
                                {{ session('register') }}
                            </div>
                        @endif

                        {{-- Error message --}}
                        @if ($errors->any())
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                            {{-- <div class="alert alert-danger mt-3"> --}}
                            {{-- </div> --}}
                        @endif

                        <form action="{{ route('login.post') }}" method="POST">
                            @csrf

                            {{-- <div class="input-group login-page-form-input ">
                            <i class="fa-solid fa-envelope"></i>
                            <input type="email" class="form-control" name="email" id="email"
                                placeholder="Enter your Email" required>
                        </div> --}}

                            <div class="form-outline mb-4 bg-transparent">
                                <label class="form-label bg-transparent">Username</label>
                                <input type="email" class="form-control" name="email" id="email"
                                    placeholder="Enter Email Address" required />
                            </div>


                            <div class="mb-3 bg-transparent">
                                <label class="form-label bg-transparent">Password</label>
                                <div class="input-group">
                                    <input type="password" name="password" id="formPassword" class="form-control"
                                        placeholder="Enter Password" required>
                                    <span class="input-group-text bg-transparent" onclick="togglePassword()"
                                        style="cursor: pointer;">
                                        <i class="fa fa-eye bg-transparent" id="toggleIcon"></i>
                                    </span>
                                </div>

                                {{-- <div class="mb-3 me-4 col-md-10 d-flex align-items-center justify-content-end">
                                    <a href="{{ route('user.forget.password') }}" class="text-muted"
                                        style="font-size: 0.9rem;" onclick="goToForgotPasswordScreen()">Forgot Password</a>
                                </div> --}}

                                <div class="text-end mt-1 bg-transparent">
                                    <a class="text-decoration-none text-muted bg-transparent"
                                        href="{{ route('forget.password') }}">Forgot password?</a>
                                </div>
                            </div>

                            <div class="d-grid mb-3">
                                {{-- <button type="submit" class="btn  login-page-submit-btn">Login</button> --}}
                                <button type="submit" class="btn text-white" style="background-color: #000;">
                                    Log in
                                </button>
                            </div>

                            <div class="text-center bg-transparent">
                                <p class="mb-0">Don't have an account?
                                    <a href="{{ route('register') }}"
                                        class="text-decoration-underline text-muted bg-transparent ">Sign Up</a>
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
    </script>
@endsection
