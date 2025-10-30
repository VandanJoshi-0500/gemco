@extends('frontend.layouts.main')

@section('content')
<section class="gradient-form">
    <div class="container">
        <div class="row d-flex justify-content-center align-items-center py-5 gradient-form">
            <div class="col-md-6 col-lg-5 col-xl-4 bg-transparent">
                <div class="card p-4" style="border-radius: 15px;">
                    <div class="text-center bg-transparent">
                        <h4 class="my-4 fw-bold bg-transparent">Enter 6 Digit OTP</h4>
                    </div>

                    <form>
                        <!-- OTP Fields -->
                        <div class="mb-4 text-center bg-transparent">
                            <div class="d-flex justify-content-between bg-transparent">
                                @for ($i = 1; $i <= 6; $i++)
                                    <input type="text" maxlength="1" class="form-control mx-1 text-center otp-input" style="width: 40px; display: inline-block;" />
                                @endfor
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="d-grid mb-3">
                            <a href="{{route('user.create.password')}}" type="submit" class="btn text-white" style="background-color: #b4963e;">
                                Submit OTP
                            </a>
                        </div>

                        <!-- Back Link -->
                        <div class="text-center bg-transparent">
                            <p class="mb-0 text-center">
                                <a href="{{ route('user.login') }}" class="text-decoration-underline text-muted bg-transparent">Back To Login</a>
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
    // Auto move to next input on keypress
    const otpInputs = document.querySelectorAll('.otp-input');

    otpInputs.forEach((input, index) => {
        input.addEventListener('input', (e) => {
            if (e.target.value.length === 1 && index < otpInputs.length - 1) {
                otpInputs[index + 1].focus();
            }
        });

        input.addEventListener('keydown', (e) => {
            if (e.key === "Backspace" && e.target.value === '' && index > 0) {
                otpInputs[index - 1].focus();
            }
        });
    });
</script>
@endsection
