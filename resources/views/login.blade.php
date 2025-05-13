<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Titulo--------------------------------------------------------------------------------------------------------------------->
    <title>Login Gokai</title>
    <!--Css------------------------------------------------------------------------------------------------------------------------>
    @vite(['resources/css/login.css', 'resources/js/login.js'])
    <!--Favicon-------------------------------------------------------------------------------------------------------------------->
    <link rel="icon" href="{{ asset('Favicon.png') }}" type="image/x-icon">
</head>

<body>
    <h1 class="titulo">GOKAI ASIAN FOOD</h1>
    <div class="login-wrapper">
        <div class="login-card">
            <div class="login-title">
                <h2>LOGIN</h2>
            </div>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <label for="email">Correo electrónico<span>*</span></label>
                <input type="email" name="email" id="email" placeholder="administrador@ejemplo.com" required />

                <label for="password">Contraseña<span>*</span></label>
                <input type="password" name="password" id="password" placeholder="***************" required />

                <button type="submit">Iniciar sesión</button>
            </form>
        </div>
    </div>
</body>

</html>
