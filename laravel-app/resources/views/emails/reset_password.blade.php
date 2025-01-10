<!DOCTYPE html>
<html>

<head>
    <title>Password Reset</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .button {
            background-color: #e3e3e3;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <p>Hi,</p>
    <p>You are receiving this email because we received a password reset request for your account.</p>
    <p><a href="{{ $resetLink }}" class="button">Reset Password</a></p>
    <p>This password reset link will expire in 60 minutes.</p>
    <p>If you did not request a password reset, no further action is required.</p>
    <p>Regards,<br>OACP Team</p>
</body>

</html>
