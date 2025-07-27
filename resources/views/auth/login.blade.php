<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <style>
        /* Reset some default browser styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            height: 100vh;
            background: url("{{ asset('assets/images/mill_2.jpg') }}") no-repeat center center fixed;
            background-size: cover;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: Arial, sans-serif;
        }

        .login-container {
            background-color: rgba(162, 138, 138, 0.9);
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);
            width: 350px;
        }

        .login-container h1 {
            text-align: center;
            margin-bottom: 25px;
            color: #333;
        }

        .login-container div {
            margin-bottom: 15px;
        }

        .login-container input[type="text"],
        .login-container input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #aaa;
            border-radius: 5px;
            font-size: 14px;
        }

        .login-container input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .login-container input[type="submit"]:hover {
            background-color: #2980b9;
        }

        .error-messages {
            color: red;
            margin-top: 10px;
            font-size: 14px;
        }

        .register-link {
            display: block;
            text-align: center;
            margin-top: 15px;
            color: #2980b9;
            text-decoration: none;
        }

        .register-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="login-container">
        <h1>Login</h1>

        <form action="{{ url('/login') }}" method="POST">
            @csrf

            <div>
                User <br>
                <input type="text" name="email" value="anayetmd2018@gmail.com" required />
            </div>
            <div>
                Password <br>
                <input type="password" name="password" value="11111111" required />
            </div>

            <div>
                <input type="submit" name="login" value="Login" />
            </div>

            @if($errors->any())
                <ul class="error-messages">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
        </form>

        <a href="{{ url('/register') }}" class="register-link">Register</a>
    </div>

</body>
</html>
