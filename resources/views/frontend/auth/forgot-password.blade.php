<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Forgot Password</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" sizes="96x96" href="{{ url('frontend/Assets/smalllogo.png') }}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
  <style>
    .form-container {
      margin: auto;
      background-color: white;
      padding: 30px;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
      z-index: 1;
      position: relative;
    }

    .form-control {
      border-radius: 20px;
      padding-left: 40px;
    }

    .form-icon {
      position: absolute;
      left: 15px;
      top: 50%;
      transform: translateY(-50%);
      color: #888;
    }

    .btn-gold {
      background-color: #b38b59;
      color: white;
      border-radius: 20px;
    }

    .btn-gold:hover {
      background-color: #997347;
    }

    .top-image {
      width: 100%;
      height: 300px;
      object-fit: cover;
    }

    .create-account-main-container {
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-direction: column;
      padding: 20px;
      max-width: 700px;
    }

    input:focus,
    .form-control:focus {
      outline: none;
      box-shadow: none;
    }

    div .text-center a{
        color:#AC805D;
        text-decoration: underline;
    }
  </style>
</head>

<body>

  <div class="container create-account-main-container">
    <img src="https://images.naptol.com/usr/local/csp/staticContent/product_images/horizontal/750x750/Shubh-Muhurat-Jewellery-Collection-01.jpg" alt="Jewelry Banner" class="top-image">

    <div class="form-container mt-0 container">
      <h4 class="text-center fw-bold mb-1">FORGOT PASSWORD</h4>
      <p class="text-center text-muted mb-4">ENTER YOUR EMAIL TO RESET YOUR PASSWORD</p>
      <form>
        <div class="mb-4 position-relative">
          <i class="fa fa-envelope form-icon"></i>
          <input type="email" class="form-control" placeholder="Enter your email" required>
        </div>

        <div class="d-grid mb-3">
          <button type="submit" class="btn btn-gold">Send Reset Link</button>
        </div>

        <div class="text-center">
          <a href="{{ route('user.login')}}">Back to Login</a>
        </div>
      </form>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
