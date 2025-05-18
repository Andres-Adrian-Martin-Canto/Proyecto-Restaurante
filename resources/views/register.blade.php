<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Titulo--------------------------------------------------------------------------------------------------------------------->
    <title>Registrese</title>
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
    @error('correo')
        <style>
            .alert {
                padding: 20px;
                background-color: #FE1A00 ;
                border: 2px solid #D83526;
                color: #fafafa;
                margin-bottom: 15px;
                border-radius: 5px;
                position: relative;
                font-family: 'Montserrat', Arial, sans-serif;
            }

            .alert .closebtn {
                position: absolute;
                top: 10px;
                right: 15px;
                color: #fafafa;
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
            <strong>Error!</strong> {{ $message }}
        </div>
    @enderror
    <div class="form">
        <div class="formIz">
            <h2>¡Bienvenido de vuelta!</h2>
            <p>Para estar atento a todo lo que tenemos para ti y seguir disfrutando de nuestros panes, inicia sesión con
                tu cuenta</p>
            <a href="{{ route('login.form') }}">Iniciar sesión</a>
        </div>
        <form action="{{ route('register') }}" method="POST" class="formDer">
            @csrf
            <h2>Crea una cuenta si no tienes una</h2>

            <div class="campos">
                <div>
                    <label for="nombre">Nombre</label>
                    <input type="text" id="nombre" name="nombre" placeholder="Escribe tu nombre"
                        pattern="[A-Za-zÁÉÍÓÚáéíóúÑñ ]+" required>
                </div>
                <div>
                    <label for="correo">E-Mail</label>
                    <input type="email" id="correo" name="correo" placeholder="Escribe tu correo" required>

                </div>
            </div>

            <div class="campos">
                <div>
                    <label for="contraseña">Contraseña</label>
                    <input type="password" id="contraseña" name="contraseña" placeholder="Escribe tu contraseña"
                        pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
                </div>
                <div>
                    <label for="contraseña_confirmation">Confirmar Contraseña</label>
                    <input type="password" id="contraseña_confirmation" name="contraseña_confirmation"
                        placeholder="Confirma tu contraseña" required>
                </div>
            </div>

            <div class="campos">
                <div>
                    <label for="direccion">Dirección</label>
                    <input type="text" id="direccion" name="direccion" placeholder="Escribe tu dirección" required>
                </div>
                <div>
                    <label for="telefono">Teléfono</label>
                    <input type="tel" id="telefono" name="telefono" placeholder="Escribe tu teléfono"
                        pattern="[0-9]{10}" required>
                </div>
            </div>

            <div class="campos">
                <div>
                    <label for="edad">Edad</label>
                    <input type="number" id="edad" name="edad" placeholder="Edad" min="1" max="120"
                        required>
                </div>
                <div>
                    <label for="sexo">Sexo</label>
                    <select id="sexo" name="sexo" required>
                        <option value="">Selecciona tu sexo</option>
                        <option value="Masculino">Masculino</option>
                        <option value="Femenino">Femenino</option>
                        <option value="Otro">Otro</option>
                    </select>
                </div>
            </div>

            <div class="check">
                <input type="checkbox" id="checkB" required>
                <label for="checkB">Estoy de acuerdo con los
                    <a href="terms.html" target="_blank" rel="noopener noreferrer">términos y condiciones</a>
                </label>
            </div>

            <input type="submit" value="Crear cuenta" class="btnAccount">
        </form>
    </div>

    <p class="black">© Gokai Asian Food. All rights reserved | Design by <img
            src="{{ asset('Imagenes/BlackWaterLogo.png') }}" alt=""></p>
</body>

</html>
