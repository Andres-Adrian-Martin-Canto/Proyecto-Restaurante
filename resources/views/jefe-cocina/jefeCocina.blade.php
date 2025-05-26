<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--Titulo--------------------------------------------------------------------------------------------------------------------->
    <title>Jefe de cocina</title>
    <!--Css------------------------------------------------------------------------------------------------------------------------>
    @vite(['resources/css/menuInicio.css', 'resources/css/global.css', 'resources/css/jefeDecocina.css', 'resources/js/jefe-cocina/index.js'])
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
                <img src="{{ asset('Imagenes/JefeCocina/imagen_logo_jefe_cocina.png') }}" alt="">
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
        <div class="contenedor-card">
            @foreach ($arregloInformacion as $detalle)
                <div class="card-mesa">
                    <h2>{{ $detalle['nombreMesa'] }}</h2>
                    <div class="pedido-list">
                        @foreach ($detalle['productos'] as $producto)
                            <div class="pedido-item">
                                <span>{{ $producto['producto_nombre'] . ' x' . $producto['cantidad_producto'] }}</span>
                            </div>
                        @endforeach
                    </div>
                    <select class="status-select" data-comanda-id="{{ $detalle['id'] }}">
                        <option value="listo">Listo</option>
                        <option value="pendiente" selected>Pendiente</option>
                        <option value="cancelado">Cancelado</option>
                    </select>
                </div>
            @endforeach
        </div>

    </main>
</body>

</html>
