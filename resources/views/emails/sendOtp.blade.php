<!DOCTYPE html>
<html>
<head>
    <title>{{ env('APP_NAME') }} - Password Reset OTP</title>
</head>
<body>
    <h1>Welcome {{ $user->name }} to {{ env('APP_NAME') }} Application</h1>
    <p>Your OTP code is: <strong>{{ $otpCode }}</strong></p>
    <p>Please use this code to reset your password. This code will expire in 60 minutes.</p>
</body>
</html>