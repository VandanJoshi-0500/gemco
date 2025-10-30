@extends('frontend.layouts.main')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>My Account Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .my-dashboard-main-container{
        display: flex;
        align-items:center;
        justify-content:center;
    }
    .sidebar {
        /* background-color: #ffffff; */
      /* border-right: 1px solid #ddd; */
      min-height: 100vh;
    }
    .sidebar a {
      display: block;
      padding: 10px 15px;
      color: #000;
      text-decoration: none;
    }
    .sidebar a.active, .sidebar a:hover {
      color: #b09842;
      font-weight: 500;
    }
    .card {
      border: 1px solid #ddd;
    }
    .edit-link {
      color: #b09842;
      text-decoration: none;
    }
    .edit-link:hover {
      text-decoration: underline;
    }
    .my-dashboard-right-container {
    background-color: #ffffff;
}
.my-dashboard-left-sidebar{
    background-color: #ffffff;

}
.my-dashboard-change-password-p p{
    padding-bottom: 0px !important;
}
  </style>
</head>
<body>

<div class="container-fluid my-dashboard-main-container">
  <div class="row container py-5">
    <!-- Sidebar -->
    <div class="col-md-3 sidebar">
      @include('frontend.dashboard.sidebar')
    </div>

    <!-- Main Content -->
    <div class="col-md-9 p-4 my-dashboard-right-container">
      <h4>My Dashboard</h4>
      <hr>
      <p class="bg-transparent"><strong class="bg-transparent">Hello Shaival Shah!</strong></p>
      <p class="mb-4">From your My Account Dashboard you have the ability to view a snapshot of your recent account activity and update your account information. Select a link below to view or edit information.</p>

      <!-- <hr> -->
      <div class="d-flex justify-content-between align-items-center mb-2 bg-transparent">
        <h5 class="bg-transparent"><strong class="bg-transparent">Contact Information</strong></h5>
        <a href="#" class="edit-link bg-transparent"><i class="fa-solid fa-pen-to-square"></i>   Edit</a>
      </div>
      <div class="d-flex flex-column bg-transparent my-dashboard-change-password-p">
        <h6 class="bg-transparent">Shaival Shah</h6>
        <h6 class="bg-transparent">shaival@repletesoftware.com </h6>
        <a href="#" class="edit-link bg-transparent">Change Password</a>
      </div>


      <h5 class="bg-transparent mt-4"><strong class="bg-transparent">Address Book</strong></h5>
      <div class="row bg-transparent mt-4">
            <div class="col-md-4 bg-transparent">
                <div class="card p-3 mb-3">
                    <h6 class="bg-transparent"><strong class="bg-transparent">Address</strong></h6>
                    <span class="bg-transparent">Shaival Shah</span>
                    <span class="bg-transparent">Test</span>
                    <span class="bg-transparent">test, New York, 10018</span>
                    <span class="bg-transparent">US</span>
                    <span class="bg-transparent">T: 223232</span>
                    <a href="#" class="edit-link bg-transparent mt-3">Edit Address</a>
                </div>
            </div>

            <div class="col-md-4 bg-transparent">
                <div class="card p-3 mb-3">
                    <h6 class="bg-transparent"><strong class="bg-transparent">Address</strong></h6>
                    <span class="bg-transparent">Shaival Shah</span>
                    <span class="bg-transparent">Test</span>
                    <span class="bg-transparent">test, New York, 10018</span>
                    <span class="bg-transparent">US</span>
                    <span class="bg-transparent">T: 223232</span>
                    <a href="#" class="edit-link bg-transparent mt-3">Edit Address</a>
                </div>
            </div>

            <div class="col-md-4 bg-transparent">
                <div class="card p-3 mb-3">
                    <h6 class="bg-transparent"><strong class="bg-transparent">Address</strong></h6>
                    <span class="bg-transparent">Shaival Shah</span>
                    <span class="bg-transparent">Test</span>
                    <span class="bg-transparent">test, New York, 10018</span>
                    <span class="bg-transparent">US</span>
                    <span class="bg-transparent">T: 223232</span>
                    <a href="#" class="edit-link bg-transparent mt-3">Edit Address</a>
                </div>
            </div>


       </div>

    </div>
  </div>
</div>

</body>
</html>

@endsection

@section('script')


@endsection
