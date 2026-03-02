<!-- resources/views/emails/otp.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f4f4; padding: 20px; }
        .container { background: white; padding: 30px; border-radius: 8px; max-width: 500px; margin: auto; }
        .otp-code { font-size: 36px; font-weight: bold; color: #4F46E5; letter-spacing: 8px; text-align: center; margin: 20px 0; }
        .note { color: #888; font-size: 13px; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Password Reset Request</h2>
        <p>Use the OTP code below to reset your password. It expires in <strong>10 minutes</strong>.</p>
        <div class="otp-code">{{ $otp }}</div>
        <p class="note">If you didn't request this, please ignore this email.</p>
    </div>
</body>
</html>