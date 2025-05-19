<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Titulo--------------------------------------------------------------------------------------------------------------------->
    <title>Jefe de cocina</title>
    <!--Css------------------------------------------------------------------------------------------------------------------------>
    @vite(['resources/css/menuInicio.css', 'resources/css/global.css', 'resources/css/jefeDecocina.css'])
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
            <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit" class="boton">
                    <img src="{{ asset('Imagenes/cerrar_sesion.png') }}" alt="" class="plato">
                    <p>Cerrar sesión</p>
                </button>
            </form>
        </section>
        <div class="card-mesa">
            <h2>Mesa 1</h2>
            <div class="pedido-item">
                <span>Sushi x1</span>
                <select class="status-select">
                    <option>Listo</option>
                    <option>En preparación</option>
                    <option>Cancelado</option>
                    <option>Pendiente</option>
                </select>
            </div>
            <div class="pedido-item">
                <span>Ramen x1</span>
                <select class="status-select">
                    <option>Listo</option>
                    <option selected>En preparación</option>
                    <option>Cancelado</option>
                    <option>Pendiente</option>
                </select>
            </div>
            <button class="btn-listo">Pedido listo</button>
        </div>

        <div class="card-mesa">
            <h2>Mesa 2</h2>
            <div class="pedido-item">
                <span>Gyozas x1</span>
                <select class="status-select">
                    <option selected>Listo</option>
                    <option>En preparación</option>
                    <option>Cancelado</option>
                    <option>Pendiente</option>
                </select>
            </div>
            <div class="pedido-item">
                <span>Sushi x1</span>
                <select class="status-select">
                    <option>Listo</option>
                    <option selected>En preparación</option>
                    <option>Cancelado</option>
                    <option>Pendiente</option>
                </select>
            </div>
            <button class="btn-listo">Pedido listo</button>
        </div>
    </main>
</body>

</html>
