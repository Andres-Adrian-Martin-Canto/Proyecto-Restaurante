<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Titulo--------------------------------------------------------------------------------------------------------------------->
    <title>Iniciar Sesión</title>
    <!--Css------------------------------------------------------------------------------------------------------------------------>
    @vite(['resources/css/forms.css'])
    @vite(['resources/css/global.css'])
    <!--Favicon-------------------------------------------------------------------------------------------------------------------->
    <link rel="icon" href="{{ asset('Imagenes/icono.png') }}" type="image/x-icon">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Kaisei+Decol&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
</head>

<body>
    {{-- Alerta de mensaje creado con exito --}}
    @if (session('success'))
        <style>
            .alert {
                padding: 20px;
                background-color: green;
                color: white;
                margin-bottom: 15px;
                border-radius: 5px;
                position: relative;
                font-family: 'Montserrat', Arial, sans-serif;
            }

            .alert .closebtn {
                position: absolute;
                top: 10px;
                right: 15px;
                color: white;
                font-size: 22px;
                font-weight: bold;
                cursor: pointer;
                line-height: 20px;
                transition: 0.3s;
            }

            .alert .closebtn:hover {
                color: #000;
            }
        </style>
        <div class="alert">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
            <strong>Correcto!</strong> {{ session('success') }}
        </div>
    @endif


    <div class="form">
        <div class="formIz">
            <h2>¿No tiene una cuenta?</h2>
            <p>¡No hay problema! Puede crearse una cuenta ahora mismo y enterarse de todo lo que tenemos para usted</p>
            <a href="{{ route('register.form') }}">Crear cuenta</a>
        </div>
        <form method="POST" action="{{ route('login') }}" class="formDer">
            @csrf
            <h2>Inicie sesión con su cuenta</h2>
            <div class="campos">
                <div>
                    <label for="email">E-Mail</label>
                    <input type="email" id="email" name="email" placeholder="Escribe tu correo" required>
                </div>
                <div>
                    <label for="password">Contraseña</label>
                    <input type="password" id="password" name="password" placeholder="Escribe tu contraseña" required>
                </div>
            </div>

            <div class="check">
                <a href="#" target="_blank" rel="noopener noreferrer">¿Olvidaste tu contraseña?</a>
            </div>

            <input type="submit" value="Iniciar sesión" class="btnAccount">
        </form>
    </div>
    </div>

    <p class="black">© Gokai Asian Food. All rights reserved | Design by<img
            src="{{ asset('Imagenes/BlackWaterLogo.png') }}" alt=""></p>
</body>

</html>
