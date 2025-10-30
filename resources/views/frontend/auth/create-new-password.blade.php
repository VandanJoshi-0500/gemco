@extends('frontend.layouts.main')

@section('content')
<section class=" gradient-form">
    <div class="container ">
        <div class="row d-flex justify-content-center align-items-center py-5 gradient-form">
            <div class="col-md-6 col-lg-5 col-xl-4 bg-transparent">
                <div class="card  p-4" style="border-radius: 15px;">
                    <div class="text-center bg-transparent ">
                        <!-- <img src="{{ asset('frontend/Assets/lotus.png') }}" alt="Logo" style="width: 100px;" /> -->
                        <h4 class="my-4 fw-bold bg-transparent">Create New Password</h4>
                    </div>

                    <form>
                    <div class="mb-3 bg-transparent">
                            <label class="form-label bg-transparent">Password</label>
                            <div class="input-group">
                                <input type="password" id="formPassword" class="form-control"
                                    placeholder="Enter Password" />
                                <span class="input-group-text bg-transparent" onclick="togglePassword()" style="cursor: pointer;">
                                    <i class="fa fa-eye bg-transparent" id="toggleIcon"></i>
                                </span>
                            </div>
                        </div>

                        <div class="mb-3 bg-transparent">
                            <label class="form-label bg-transparent">Confirm Password</label>
                            <div class="input-group">
                                <input type="password" id="formConfirmPassword" class="form-control"
                                    placeholder="Enter Confirm Password" />
                                <span class="input-group-text bg-transparent" onclick="toggleConfirmPassword()" style="cursor: pointer;">
                                    <i class="fa fa-eye bg-transparent" id="toggleConfirmIcon"></i>
                                </span>
                            </div>
                        </div>

                        <div class="d-grid mb-3">
                            <a href="{{route('user.login')}}" type="submit" class="btn text-white" style="background-color: #b4963e;">
                                Create Password
                            </a>
                        </div> 

                        <div class="text-center bg-transparent">
                            <p class="mb-0 text-center">
                                <a href="{{route('user.login')}}" class="text-decoration-underline text-muted bg-transparent ">Back To Login</a>
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
        const input = document.getElementById("formConfirmPassword");
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
