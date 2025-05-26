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
                <img src="{{ asset('Imagenes/Mesero/imagen_perfil_mesero.png') }}" alt="">
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
        @foreach ($arregloInformacion as $item)
            <div class="card-mesa">
                <h3>{{ $item['nombreMesa'] }}</h3>
                <div class="card-mesa-lista">
                    @foreach ($item['productos'] as $producto)
                        <div class="card-producto">
                            <span>{{ $producto['producto_nombre'] }} x{{ $producto['cantidad_producto'] }}</span>
                            <span class="precio">${{ number_format($producto['producto_total'], 2) }}</span>
                        </div>
                    @endforeach
                    <div class="card-total card-total-rojo">
                        Total: <span>${{ number_format($item['total'], 2) }}</span>
                    </div>
                    <div class="card-total card-total-rojo">
                        Estado: <span>{{ $item['status'] }}</span>
                    </div>
                </div>
                <form action="{{ route('mesero.cambiarEstadoComanda') }}" method="post">
                    @csrf
                    <input type="hidden" name="comanda_id" value="{{ $item['id'] }}">
                    <button type="submit" class="btn-editar">Entregado</button>
                </form>

            </div>
        @endforeach
    </main>
</body>
</html>
