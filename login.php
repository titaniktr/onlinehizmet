<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giriş Yap</title>
    <style>
        /* Reset some default styles */
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #000000; /* Set your desired background color */
        }

        /* Create a container to center content */
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        /* Style the login form */
        .login-form {
            background-color: #9d9d9d;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            padding: 20px;
            text-align: center;
        }

        /* Style form elements as needed */
        .form-group {
            margin-bottom: 20px;
        }

        /* Style the "Giriş Yap" text */
        .login-text {
            font-size: 24px; /* Adjust the font size */
            color: #000000; /* Set your desired text color */
            margin-bottom: 10px; /* Adjust the margin as needed */
        }

        /* Style the input field */
        .input-field {
            border: 2px solid #4CAF50; /* Set the border color */
            border-radius: 5px;
            padding: 10px;
            width: 100%;
            font-size: 16px;
        }

        /* Style the "Giriş Yap" button */
        .login-button {
            background-color: #4CAF50;
            border: none;
            color: #6c6c6c;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        /* Add hover effect to the button */
        .login-button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="login-form">
        <h1 class="login-text">Giriş Yap</h1>
        <form action="auth-login" method="post">
            <div class="form-group">
            <input type="password" name="auth_key" id="key" class="input-field" placeholder="Lütfen key giriniz" required style="text-align: center; vertical-align: middle; padding: 5px; width: 250px;">
            </div>
            <div class="form-group">
                <div class="g-recaptcha" data-sitekey="6LdzYgomAAAAAIsdqBs-vFOETAk60AO9o0fgHwgg"></div>
            </div>
            <div class="form-group">
                <button type="submit" class="login-button">
                    Giriş Yap
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Include your JavaScript and other resources here -->
<script src="https://www.google.com/recaptcha/api.js"></script>
</body>
</html>
