@extends('frontend.layouts.account')

@section('css')
    <link rel="stylesheet" href="{{ url('frontend/css/style.css') }}">
@endsection

@section('content')
    <!-- Main Content -->
    <div class="col-md-9 p-4 my-dashboard-right-container">
        <h4 class="page-main-title">Edit Account Details</h4>
        <hr>

        <div class="mt-5 bg-transparent " style="max-width: 100%;">
            <form action="{{ route('update.user.info') }}" method="post" enctype="multipart/form-data">
                <div class="row mb-3 bg-transparent">
                    <div class="col bg-transparent">
                        <input type="text" name="first_name" class="form-control" value="{{ $user->first_name }}"
                            aria-label="First name">
                        @if ($errors->has('first_name'))
                            <span class="text-danger">{{ $errors->first('first_name') }}</span>
                        @endif
                        {{-- <input type="text" class="form-control" value="{{$user->first_name}}" placeholder="Shaival"> --}}
                    </div>
                    <div class="col bg-transparent">
                        <input type="text" name="last_name" class="form-control" value="{{ $user->last_name }}"
                            aria-label="Last name">
                        @if ($errors->has('last_name'))
                            <span class="text-danger">{{ $errors->first('last_name') }}</span>
                        @endif
                        {{-- <input type="text" class="form-control" placeholder="Shah"> --}}
                    </div>
                </div>
                <div class="mb-3 bg-transparent">
                    <input type="email" name="email" class="form-control" id="inputEmail4" value="{{ $user->email }}">
                    @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                    {{-- <input type="email" class="form-control" placeholder="shaival@repletesoftware.com"> --}}
                </div>
                <div class="form-check mb-4 bg-transparent">
                    <input type="checkbox" class="form-check-input" name="change_password" id="changePassword">
                    <label class="form-check-label bg-transparent disabled" for="changePassword">
                        Change Password
                    </label>

                    {{-- <input class="form-check-input" type="checkbox" id="changePassword">
                    <label class="form-check-label bg-transparent disabled" for="changePassword">
                        Change Password
                    </label> --}}
                </div>

                <!-- Password Fields - Hidden by Default -->
                <div id="passwordFields" style="display: none;" class="bg-transparent">
                    <div class="row mb-3 bg-transparent">
                        <div class="col bg-transparent password-toggle-wrapper">
                            <input type="password" name="old_password" id="old_password" class="form-control"
                                placeholder="Current Password *">
                            <i class="fa-solid fa-eye password-toggle-icon" toggle="#old_password"></i>
                            @if ($errors->has('old_password'))
                                <span class="text-danger">{{ $errors->first('old_password') }}</span>
                            @endif
                            {{-- <input type="password" class="form-control" placeholder=""> --}}
                        </div>
                        <div class="col bg-transparent password-toggle-wrapper">
                            <input type="password" name="new_password" id="new_password" class="form-control"
                                placeholder="New Password *">
                            <i class="fa-solid fa-eye password-toggle-icon" toggle="#new_password"></i>
                            @if ($errors->has('new_password'))
                                <span class="text-danger">{{ $errors->first('new_password') }}</span>
                            @endif
                            {{-- <input type="password" class="form-control" placeholder="New Password *"> --}}
                        </div>
                    </div>
                    <div class="mb-3 bg-transparent password-toggle-wrapper">
                        <input type="password" name="confirm_password" id="confirm_password" class="form-control"
                            placeholder="Confirm Password *">
                        <i class="fa-solid fa-eye password-toggle-icon" toggle="#confirm_password"></i>
                        @if ($errors->has('confirm_password'))
                            <span class="text-danger">{{ $errors->first('confirm_password') }}</span>
                        @endif
                        {{-- <input type="password" class="form-control" placeholder="Confirm Password *"> --}}
                    </div>
                </div>

                <input type="hidden" name="id" value="{{ $user->id }}">
                <button type="submit" class="btn account-info-save-btn w-100 submit save">Save</button>
                {{-- <button type="submit" class="btn account-info-save-btn w-100">SAVE</button> --}}
            </form>
        </div>


    </div>

    </div>
@endsection



@section('script')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const changePasswordCheckbox = document.getElementById('changePassword');
            const passwordFields = document.getElementById('passwordFields');

            changePasswordCheckbox.addEventListener('change', function() {
                passwordFields.style.display = this.checked ? 'block' : 'none';
            });
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const changePasswordCheckbox = document.getElementById('changePassword');
            const passwordFields = document.getElementById('passwordFields');

            changePasswordCheckbox.addEventListener('change', function() {
                passwordFields.style.display = this.checked ? 'block' : 'none';
            });

            // Toggle password visibility
            document.querySelectorAll('.password-toggle-icon').forEach(function(icon) {
                icon.addEventListener('click', function() {
                    const input = document.querySelector(this.getAttribute('toggle'));
                    const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
                    input.setAttribute('type', type);
                    this.classList.toggle('fa-eye');
                    this.classList.toggle('fa-eye-slash');
                });
            });
        });
    </script>
@endsection
