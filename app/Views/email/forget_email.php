<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }
        .email-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .email-header {
            text-align: center;
            margin-bottom: 20px;
        }
        .email-header img {
            max-width: 150px;
            margin: 0 auto;
        }
        .email-content {
            text-align: center;
        }
        .email-footer {
            text-align: center;
            margin-top: 20px;
            font-size: 12px;
            color: #6c757d;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="email-header">
            <img src="https://via.placeholder.com/150" alt="College Logo">
        </div>
        <div class="email-content">
            <h2>Password Reset Request</h2>
            <p>Dear [Student Name],</p>
            <p>We received a request to reset your password. Click the button below to reset your password:</p>
            <a href="<?=base_url("reset/password?token=$token")?>" class="btn btn-primary">Reset Password</a>
            <p>If you did not request a password reset, please ignore this email or contact support.</p>
        </div>
        <div class="email-footer">
            <p>&copy; [Year] [College Name]. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
