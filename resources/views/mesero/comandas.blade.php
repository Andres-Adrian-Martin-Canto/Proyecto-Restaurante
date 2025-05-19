<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Titulo--------------------------------------------------------------------------------------------------------------------->
    <title>Comandas</title>
    <!--Css------------------------------------------------------------------------------------------------------------------------>
    @vite(['resources/css/menuInicio.css', 'resources/css/global.css', 'resources/css/comandas.css'])
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
        <section class="izq">
            <div class="icon">
                <img src="{{ asset('Imagenes/profile.png') }}" alt="">
            </div>
            <p>{{ Auth::user()->name }}</p>

            <a href="{{ route('mesero') }}" class="boton2">
                <svg viewBox="0 0 40 40" class="arrow-icon">
                    <circle cx="20" cy="20" r="18" />
                    <polyline points="23,12 15,20 23,28" />
                </svg>
                <span>Regresar</span>
            </a>

        </section>
        <div class="card-mesa">
            <h3>Mesa 1</h3>
            <div class="card-producto">
                <span>Sushi x1</span>
                <span class="precio">$450.00</span>
            </div>
            <div class="card-total card-total-rojo">
                Total: <span>$450.00</span>
            </div>
            <div class="card-estado card-estado-proceso">
                Estado: <span>En Proceso</span>
            </div>
            <button class="btn-editar">Editar</button>
        </div>

        <div class="card-mesa">
            <h3>Mesa 2</h3>
            <div class="card-producto">
                <span>Sushi x1</span>
                <span class="precio">$450.00</span>
            </div>
            <div class="card-total card-total-verde">
                Total: <span>$450.00</span>
            </div>
            <div class="card-estado card-estado-listo">
                Estado: <span>Listo</span>
            </div>
            <button class="btn-editar">Editar</button>
        </div>
    </main>
</body>

</html>
