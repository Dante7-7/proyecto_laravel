@extends('layout.plantilla')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <title>Login</title>
    <style>
        :root {
            --bg-url: url("{{ asset('img/img.jpg') }}");
        }
        .login-page {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-size: cover;
        }
        .form {
            height: 590px;
            width: 590px;
            position: relative;
            z-index: 1;
            background: rgb(26, 13, 37);
            max-width: 660px;
            margin: 0 auto 80px;
            padding: 6px;
            text-align: center;
            box-shadow: 16px 14px 20px #0000008c;
            border-radius:50%;
            border: 2px solid rgb(18, 8, 26);
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        h1 {
            font-size: x-large;
            font-weight: 900; 
            color: white;
        }
        .form img {
            height: 120px;
            width: 120px;
        }
        .form input[type="email"],
        .form input[type="password"] {
            width: 100%;
            padding: 15px;
            margin: 10px 0;
            border: none;
            border-radius: 5px;
        }
        .form button {
            font-weight: bold;
            font-family: "Roboto", sans-serif;
            text-transform: uppercase;
            width: 100%;
            padding: 15px;
            color: #110d17;
            background: #8b77b9;
            border: 2px solid #3f305c;
            border-radius: 10px;
        }
        .form button:hover {
            transition: 1s all ease-in-out;
            transform: scale(0.91, 0.91);
            box-shadow: 0px 0px 10px #eeeaf4;
            background: #6d56a1;
            color: #110d17;
            border: 3px solid #110d17;
        }
        .message {
            margin-top: 20px;
            color: white;
        }
        .message a {
            color: #8b77b9;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="login-page">
        <div class="form">
            <form method="POST" action="{{ route('login') }}" class="login-form">
                @csrf
                <h1>Bienvenido usuario</h1>
                <img src="{{ asset('img/catlogin.png') }}"><br>                    
                <input type="email" placeholder="Correo Electrónico" name="email" id="email" required>
                <input type="password" placeholder="Contraseña" name="password" id="password" required><br>
                <button type="submit">Iniciar</button>
                <p class="message">¿No registrado? <a href="{{ route('register') }}">Registrarse</a></p>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

@endsection
