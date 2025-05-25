<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Titulo--------------------------------------------------------------------------------------------------------------------->
    <title>Cliente</title>
    <!--Css------------------------------------------------------------------------------------------------------------------------>
    @vite(['resources/css/menuInicio.css', 'resources/js/cliente/carrito/index.js', 'resources/css/global.css'])
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
            <a href="{{ route('cliente.reservaciones') }}" class="boton">
                <img src="{{ asset('Imagenes/Cliente/reservation.png') }}" alt="">
                <p>Reservaciones</p>
            </a>
            <a href="{{ route('cliente.pedidos') }}" class="boton">
                <img src="{{ asset('Imagenes/Cliente/delivery.png') }}" alt="">
                <p>Pedidos</p>
            </a>
        </section>

        <section class="center">
            @foreach ($productos as $producto)
                <div class="cell" data-id="{{ $producto->id }}">
                    <div class="cell-bg"
                        style="background-image: url('{{ asset($producto->imagen)}}');">
                    </div>
                    <div class="cell-content">
                        <h3>{{ $producto->nombre }} - ${{ $producto->precio }}</h3>
                        <p>{{ $producto->descripcion }}</p>
                    </div>
                </div>
            @endforeach
        </section>

        <section class="der">
            <h3>Mi orden</h3>
            <div class="order-list">

            </div>
            <div class="total">
                <p>Total</p>
                <p id="total-carrito">$ 0.00</p>
            </div>
            <button class="checkout">Finalizar pedido</button>
        </section>
    </main>
</body>

</html>
