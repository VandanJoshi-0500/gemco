@extends('frontend.layouts.main')

@section('content')
    <section class="h-100 gradient-form" style="background-color: #f5e7d6">
        <div class="container py-5">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="login-page-left-side-section">
                    <div class="card-body p-md-5 mx-md-4">
                        <div class="text-center">
                            <img src="{{ url('frontend/Assets/blacklogo.png') }}"
                                style="width: 185px" alt="logo" />
                            <h4 class="mt-1 mb-5 pb-1">Login</h4>
                        </div>

                        <form>
                            <div data-mdb-input-init class="form-outline mb-3">
                                <label class="form-label" for="form2Example11">Username</label>
                                <input type="email" id="form2Example11" class="form-control"
                                    placeholder="Enter Email Address" />
                            </div>

                            <div class="mb-3 d-flex flex-column">
                                <label class="form-label" for="form2Example22">Password</label>
                                <div class="input-group">
                                    <input type="password" id="form2Example22" class="form-control"
                                        placeholder="Enter Password" />
                                    <span class="input-group-text" onclick="togglePassword()" style="cursor: pointer;">
                                        <i class="fa fa-eye" id="toggleIcon"></i>
                                    </span>
                                </div>
                                <a class="text-end login-forgot-password" href="#!">Forgot password?</a>
                            </div>


                            <div class="text-center pt-1 pb-1 login-btn-login-page">
                                <button data-mdb-button-init data-mdb-ripple-init class="mb-3" type="button">
                                    Log in
                                </button>
                                <!-- <a class="text-muted" href="#!">Forgot password?</a> -->
                            </div>

                            <div class="d-flex align-items-center justify-content-center">
                                <p class="">Don't have an account?
                                    <a type="button" data-mdb-button-init data-mdb-ripple-init
                                        class="text-muted text-center login-create-an-account">
                                        Create new
                                    </a>
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
        const passwordInput = document.getElementById("form2Example22");
        const toggleIcon = document.getElementById("toggleIcon");
        const isPassword = passwordInput.type === "password";
        passwordInput.type = isPassword ? "text" : "password";
        toggleIcon.classList.toggle("fa-eye");
        toggleIcon.classList.toggle("fa-eye-slash");
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO"
    crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
@endsection
