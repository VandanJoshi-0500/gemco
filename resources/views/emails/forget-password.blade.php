<!-- <a href="{{ route('reset.password', $token) }}">Reset Password</a> -->

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Reset Your Password</title>
    <style>
        body {
            background-color: #f4f4f4;
            font-family: Arial, sans-serif;
            padding: 0;
            margin: 0;
        }
        .email-container {
            max-width: 600px;
            background-color: #ffffff;
            margin: 40px auto;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        .header {
            text-align: center;
            padding-bottom: 20px;
            border-bottom: 1px solid #eeeeee;
        }
        .header h2 {
            margin: 0;
            color: #333333;
        }
        .content {
            padding: 20px 0;
            color: #555555;
            line-height: 1.6;
        }
        .btn {
            display: inline-block;
            background-color: #000000;
            color: white !important;
            padding: 12px 25px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            margin: 20px 0;
        }
        .footer {
            font-size: 13px;
            color: #999999;
            text-align: center;
            padding-top: 20px;
            border-top: 1px solid #eeeeee;
        }
        p.emailname{
            text-transform:capitalize;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="header">
            <h2>Password Reset</h2>
        </div>
        <div class="content">
            <p class="emailname">Hello {{ $user->name }},</p>
            <p>We received a request to reset your password. Click the button below to proceed:</p>

            <a href="{{ route('reset.password', $token) }}" class="btn">Reset Password</a>

            <p>If you did not request this, please ignore this email. This password reset link will expire in 60 minutes.</p>
        </div>
        <div class="footer">
            &copy; {{ date('Y') }} Gemco Jewels. All rights reserved.
        </div>
    </div>
</body>
</html>
