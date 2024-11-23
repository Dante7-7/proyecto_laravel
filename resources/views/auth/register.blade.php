@extends('layout.plantilla')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
    <title>Registro</title>
    <style>
        :root {
            --bg-url: url('img/img.jpg'); /* Ruta de la imagen de fondo */
        }

        body {
            background: var(--bg-url) no-repeat center center fixed;
            background-size: cover;

        }

   
        h2 {
            font-size: 2em;
            margin-bottom: 10px;
        }

        p {
            color: rgba(255, 255, 255, 0.7);
        }



        .btn {
            background: transparent;
            color: #fff;
            border: 2px solid #ffffff;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 1em;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn:hover {
            background-color: #ffffff;
            color: #000;
        }

        .social-icons a {
            color: #ffffff;
            font-size: 1.5em;
            margin: 0 10px;
            text-decoration: none;
            transition: color 0.3s;
        }

        .social-icons a:hover {
            color: #d8d0e7;
        }

        .small {
            color: rgba(255, 255, 255, 0.7);
        }

        .small a {
            color: #ffffff;
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <!--formulario para la creacion de usuario o administrador -->
    <div class="login-page">
    <div class="form">
        <!--ruta del controlador user-->
        <form class="login-form" method="POST" action="{{ route('register') }}">
            @csrf
            <h1>Regístrate</h1>
            <img src="{{ asset('img/catregis.png') }}" height="120px" width="120px;"><br>
            <!--input de ingreso de datos del usuario o administrador -->
            <input type="text" placeholder="Nombre de usuario" name="name" id="N_Usuario" required/>
            <input type="email" placeholder="Email" name="email" id="Email" required/>
            <input type="password" placeholder="Contraseña" name="password" id="contraseña" required/>
            <input type="password" placeholder="Confirmar Contraseña" name="password_confirmation" required/><br>
            <button type="submit">Crear</button>
            <!--me lleva de regreso a login-->
            <p class="message">¿Ya registrado? <a href="{{ route('login') }}">Iniciar sesión</a></p>
        </form>
    </div>
</div>
    <!-- Enlace a Font Awesome para los iconos de redes sociales -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</body>
</html>

@endsection
