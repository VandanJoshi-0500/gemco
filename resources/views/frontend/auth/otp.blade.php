<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Verify OTP</title>
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
      text-align: center;
      font-size: 20px;
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

    .otp-input {
      width: 60px;
      height: 60px;
      margin: 0 5px;
      font-size: 24px;
      text-align: center;
    }

    .otp-wrapper {
      display: flex;
      justify-content: center;
      margin-bottom: 20px;
    }
  </style>
</head>

<body>

  <div class="container create-account-main-container">
    <img src="https://images.naptol.com/usr/local/csp/staticContent/product_images/horizontal/750x750/Shubh-Muhurat-Jewellery-Collection-01.jpg" alt="Jewelry Banner" class="top-image">

    <div class="form-container mt-0 container">
      <h4 class="text-center fw-bold mb-1">OTP VERIFICATION</h4>
      <p class="text-center text-muted mb-4">ENTER THE 6-DIGIT CODE SENT TO YOUR EMAIL</p>
      <form>
        <div class="otp-wrapper">
          <input type="text" maxlength="1" class="form-control otp-input" required>
          <input type="text" maxlength="1" class="form-control otp-input" required>
          <input type="text" maxlength="1" class="form-control otp-input" required>
          <input type="text" maxlength="1" class="form-control otp-input" required>
          <input type="text" maxlength="1" class="form-control otp-input" required>
          <input type="text" maxlength="1" class="form-control otp-input" required>
        </div>

        <div class="d-grid mb-3">
          <button type="submit" class="btn btn-gold">Verify</button>
        </div>

        <div class="text-center">
          <a href="#">Didn't receive code? Resend</a>
        </div>
      </form>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // Auto-focus for OTP fields
    const inputs = document.querySelectorAll(".otp-input");
    inputs.forEach((input, index) => {
      input.addEventListener("keyup", function (e) {
        if (e.key >= 0 && e.key <= 9 && index < inputs.length - 1) {
          inputs[index + 1].focus();
        } else if (e.key === "Backspace" && index > 0 && !input.value) {
          inputs[index - 1].focus();
        }
      });
    });
  </script>
</body>

</html>
