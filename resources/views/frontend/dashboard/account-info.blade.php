@extends('frontend.layouts.main')

@section('css')
    <link rel="stylesheet" href="{{ url('frontend/css/style.css') }}">
@endsection

@section('content')

<div class="container-fluid my-dashboard-main-container">
  <div class="row container py-5">
    <!-- Sidebar -->
    <div class="col-md-3 sidebar">
      @include('frontend.dashboard.sidebar')
    </div>

    <!-- Main Content -->
    <div class="col-md-9 p-4 my-dashboard-right-container">
      <h4 class="page-main-title">Account Information</h4>
      <hr>

        <div class="container mt-5 bg-transparent " style="max-width: 600px;">
          <form>
            <div class="row mb-3 bg-transparent">
              <div class="col bg-transparent">
                <input type="text" class="form-control" placeholder="Shaival">
              </div>
              <div class="col bg-transparent">
                <input type="text" class="form-control" placeholder="Shah">
              </div>
            </div>
            <div class="mb-3 bg-transparent">
              <input type="email" class="form-control" placeholder="shaival@repletesoftware.com">
            </div>
            <div class="form-check mb-4 bg-transparent">
              <input class="form-check-input" type="checkbox" id="changePassword">
              <label class="form-check-label bg-transparent disabled" for="changePassword" >
                Change Password
              </label>
            </div>

            <!-- Password Fields - Hidden by Default -->
          <div id="passwordFields" style="display: none;" class="bg-transparent">
            <div class="row mb-3 bg-transparent">
              <div class="col bg-transparent">
                <input type="password" class="form-control" placeholder="">
              </div>
              <div class="col bg-transparent">
                <input type="password" class="form-control" placeholder="New Password *">
              </div>
            </div>
            <div class="mb-3 bg-transparent">
              <input type="password" class="form-control" placeholder="Confirm Password *">
            </div>
          </div>

            <button type="submit" class="btn account-info-save-btn w-100">SAVE</button>
          </form>
        </div>


       </div>

    </div>
  </div>
</div>
@endsection

@section('script')

<script>
  document.addEventListener("DOMContentLoaded", function () {
    const changePasswordCheckbox = document.getElementById('changePassword');
    const passwordFields = document.getElementById('passwordFields');

    changePasswordCheckbox.addEventListener('change', function () {
      passwordFields.style.display = this.checked ? 'block' : 'none';
    });
  });
</script>

@endsection
