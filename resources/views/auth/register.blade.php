<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            height: 100vh;
            background: url("{{ asset('assets/images/mill_10.jpg') }}") no-repeat center center fixed;
            background-size: cover;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: Arial, sans-serif;
        }

        .form-container {
            background-color: rgba(227, 177, 177, 0.92);
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);
            width: 320px;
        }

        .form-container h1 {
            text-align: center;
            margin-bottom: 25px;
            color: #333;
        }

        .form-container div {
            margin-bottom: 15px;
        }

        .form-container input[type="text"],
        .form-container input[type="email"],
        .form-container input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #aaa;
            border-radius: 5px;
            font-size: 14px;
        }

        .form-container button {
            width: 100%;
            padding: 10px;
            background-color: #27ae60;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .form-container button:hover {
            background-color: #1e8449;
        }

        .error-messages {
            color: red;
            font-size: 14px;
            margin-top: 10px;
        }

        .login-link {
            display: block;
            text-align: center;
            margin-top: 15px;
            color: #2980b9;
            text-decoration: none;
        }

        .login-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="form-container">
        <h1>Register</h1>

        <form method="POST" action="{{ url('/register') }}">
            @csrf 

            <div>
                Full Name <br>
                <input type="text" name="name" placeholder="Full Name" required>
            </div>

            <div>
                Email <br>
                <input type="email" name="email" placeholder="Email" required>
            </div>

            <div>
                Password <br>
                <input type="password" name="password" placeholder="Password" required>
            </div>

            <div>
                Retype Password <br>
                <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
            </div>

            <div>
                <button type="submit">Register</button>

                @if($errors->any())
                <ul class="error-messages">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                @endif
            </div>
        </form>

        <a href="{{ url('/login') }}" class="login-link">Already have an account? Login</a>
    </div>

</body>
</html>
