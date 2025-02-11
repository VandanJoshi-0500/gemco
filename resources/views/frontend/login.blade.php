<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<style>
    /* .......................LOGINPAGE.................... */
.login-page-main-container{
    background-image: url("http://127.0.0.1:8000/frontend/Assets/ProductListIMGs/ProductList.png");

    background-size: cover;
    object-fit: cover;
    background-position: center;
    width: 100%;
}
.login-form-google-account{
    width: 73%;
    display: flex;
    justify-content: center;
    align-items: center;
}
.login-form-google-account a{
    background-color: #fff;
    text-decoration: none;
    color: #000;
    width: 100%;
    padding: 10px;
    border-radius: 20px;
    border: 1px solid #00000029;
}
.login-form-google-account a:hover{
    background-color: #000000df;
    color: #fff;
}
.divider-line {
    border: none; /* Remove default border */
    height: 1px; /* Set height */
    background-color: #ccc; /* Light gray for visibility */
    width: 100%; /* Ensure full width */
}
.login-page-form-input{
    background-color: rgba(128, 128, 128, 0.178) !important;
    border-radius: 20px;
    width: 87%;
    padding: 5px 10px;
    display: flex;
    align-items: center;
    justify-content: start;
    gap: 20px;
}
.login-page-form-input input{
    background: transparent !important;
    border: none !important;
    outline-style: none !important;
}
.login-page-form-input i.fa-solid.fa-envelope {
    background: transparent !important;
}
button.login-page-submit-btn{
    background-color: #AC805D !important;
    color: #fff;
    padding: 10px 50px;
    border-radius: 20px;
    width: 69%;
    border-radius: 20px !important;
}
.login-form-img{
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
}
.login-form-img img{
    width: 100% !important;
   height: 200px !important;
   object-fit: cover;
}

button.btn.login-page-submit-btn.my-3:hover {
    background: #6e4624 !important;
    color: white;
}
</style>
<body>
    <div class="container-fluid login-page-main-container">
        <div class="container d-flex justify-content-center align-items-center flex-column gap-3 py-2">
            <div class="d-flex justify-content-center align-items-center flex-column gap-1 bg-white pb-3">
             <div class="login-form-img">
                <img src="{{url('frontend/Assets/Login/login-form-image.png')}}" alt="login-form-img" class="img-fluid">
             </div>
             <div class="login-form-title mt-2">
                <h4 class="text-center fw-bold ">CREATE YOUR ACCOUNT</h4>
                <p class="text-center">LETS GET STARTED WITH YOUR 30 DAYS FREE TRIALS</p>
             </div>
             <div class="login-divider d-flex align-items-center justify-content-center gap-3">
                 {{-- <hr class="flex-grow-1 divider-line">
                 <span class="text-muted fw-semibold">OR</span>
                 <hr class="flex-grow-1 divider-line"> --}}
                </div>

                <form class="row d-flex align-items-center justify-content-center">
                    <div class="mb-3 col-md-10 d-flex align-items-center justify-content-center">
                        <div class="input-group login-page-form-input ">
                            <i class="fa-solid fa-envelope"></i>
                            <input type="email" class="form-control" id="email" placeholder="Enter your email" required>
                        </div>
                    </div>
                    <div class="mb-3 col-md-10 d-flex align-items-center justify-content-center">
                        <div class="input-group login-page-form-input d-flex gap-3">
                            <i class="fa-solid fa-lock me-1 ps-2" ></i>
                            <input type="password" class="form-control" id="password" placeholder="Enter your password" required>
                            <i class="fa-regular fa-eye"></i>
                        </div>
                    </div>
                    <button type="submit" class="btn login-page-submit-btn my-3">Login</button>
                </form>

                <div class="login-divider d-flex align-items-center justify-content-center gap-3">
                    <hr class="flex-grow-1 divider-line">
                    <span class="text-muted fw-semibold">OR</span>
                    <hr class="flex-grow-1 divider-line">
                </div>

                <div class="login-form-google-account row">
                   <a href="" class="col-md-12 d-flex gap-2 align-items-center shadow-sm justify-content-center"><img src="{{url('frontend/Assets/Login/google.png')}}" width="20" height="20" alt="">Login with Google</a>
                </div>
                <div class="login-form-google-account row">
                <a href="" class="col-md-12 d-flex gap-2 align-items-center shadow-sm justify-content-center"><img src="{{url('frontend/Assets/Login/facebook.png')}}" width="20" height="20" alt="">Login with Facebook</a>
             </div>

        </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://kit.fontawesome.com/3f158b2d89.js" crossorigin="anonymous"></script>
</html>
