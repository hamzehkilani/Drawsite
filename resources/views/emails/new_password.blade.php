
<!DOCTYPE html>
<html>
<head>
    <title>Password Reset</title>
</head>
<body>
    <p>Hello {{ $username }},</p>
    <p>You are receiving this email because a password reset request has been made for your account.</p>
    <p>If you did not request a password reset, you can ignore this email.</p>

    <p>To reset your password, click on the link below:</p>
    <a href="{{ $userIdForResetPassword }}">Reset Password</a>

    <p>If you're having trouble clicking the link, you can copy and paste the following URL into your browser:</p>
    <p>{{ $userIdForResetPassword }}</p>


    <p>If you have any issues, please contact our support team at support@example.com.</p>

    <p>Thank you!</p>
</body>
</html>
