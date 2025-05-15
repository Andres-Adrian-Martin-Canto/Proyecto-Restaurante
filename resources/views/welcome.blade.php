<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Titulo--------------------------------------------------------------------------------------------------------------------->
    <title>Gokai Asian Food | Inicio</title>
    <!--Css------------------------------------------------------------------------------------------------------------------------>
    @vite(['resources/css/inicio.css'])
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

    <main>
        <img src="{{ asset('Imagenes/plato.png') }}" alt="" class="plato">
        <div class="videoContainer">
            <video autoplay muted loop playsinline class="backgroundVideo">
                <source src="{{ asset('Videos/video_index.mp4') }}" type="video/mp4">
                Tu navegador no soporta videos en HTML5.<!--Mensaje que aparece si el navegador no soporta el video-->
            </video>
            <div class="content">
                <h1>Gokai Asian Food</h1>
                <div class="loginContainer">
                    <div>Explora, ordena, disfruta</div>
                    <a href="{{ route('login') }}">Ingresar</a>
                </div>

                <a href="https://maps.app.goo.gl/gGhN8xq1VsfFEcTs8" target="_blank" class="locationContainer">
                    <img src="{{ asset('Imagenes/location.png') }}" alt="">
                    <p>Ver ubicación en Google Maps</p>
                </a>
            </div>
        </div>
        <div class="leftContainer">
            <div>
                <p>Designed by <img src="{{ asset('Imagenes/BlackWaterLogo.png') }}" alt=""></p>
            </div>
        </div>
    </main>

</body>

</html>
