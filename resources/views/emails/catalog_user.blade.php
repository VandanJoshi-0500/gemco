
<!DOCTYPE html>
<html>
<head>
    <title>User Registered</title>
</head>
<body>
    <div class="container">
        <h2>Thank you for your catalog request!</h2>
        <p>Hi {{ $data['name'] }},</p>
        <p>We've received your catalog request. Our team will get back to you shortly.</p>
        <p>Thank you,<br>Gemco Jewels</p>
        <img src="{{ url('frontend/Assets/whitelogo.png') }}" alt="Gemco Jewels logo">
    </div>
</body>
</html>


