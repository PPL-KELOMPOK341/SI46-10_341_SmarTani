<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin Petani</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background: url('https://source.unsplash.com/1600x900/?farm,green') no-repeat center center fixed;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #333;
        }

        .login-container {
            background-color: rgba(255, 255, 255, 0.9); /* Putih dengan transparansi */
            padding: 40px;
            border-radius: 10px;
            width: 100%;
            max-width: 400px;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.3);
            text-align: center;
        }

        .login-container h2 {
            font-size: 28px;
            margin-bottom: 20px;
            color: #4A90E2; /* Biru muda */
            font-weight: bold;
        }

        .login-container p {
            font-size: 16px;
            color: #555;
        }

        label {
            font-size: 14px;
            color: #4A90E2; /* Biru muda */
            margin-bottom: 5px;
            display: block;
            text-align: left;
        }

        input {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }

        input[type="email"]:focus,
        input[type="password"]:focus {
            border-color: #4A90E2; /* Biru muda pada fokus */
            outline: none;
        }

        button {
            background-color: #4A90E2; /* Biru muda */
            color: white;
            border: none;
            padding: 12px 0;
            font-size: 18px;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
            background-color: #357ABD; /* Biru lebih gelap saat hover */
        }

        .footer {
            margin-top: 20px;
            font-size: 14px;
            color: #555;
        }

        .footer a {
            color: #4A90E2;
            text-decoration: none;
        }

        .footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="login-container">
    <h2>Login Admin Petani</h2>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required placeholder="Enter your email">
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required placeholder="Enter your password">
        </div>
        <button type="submit">Login</button>
    </form>
    <div class="footer">
        <p>&copy; 2025 Your Farm Admin. <a href="#">Forgot Password?</a></p>
    </div>
</div>

</body>
</html>
