<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Titulo--------------------------------------------------------------------------------------------------------------------->
    <title>Cliente</title>
    <!--Css------------------------------------------------------------------------------------------------------------------------>
    @vite(['resources/css/menuInicio.css', 'resources/js/cliente/carrito-compra.js', 'resources/css/global.css'])
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
                <div class="cell">
                    <div class="cell-bg"
                        style="background-image: url('{{ asset('Imagenes/Cliente/'.$producto->imagen) }}');">
                    </div>
                    <div class="cell-content">
                        <h3>{{ $producto->nombre }} - ${{ $producto->precio }}</h3>
                        <p>{{ $producto->descripcion }}</p>
                    </div>
                </div>
            @endforeach

            {{--
            <div class="cell">
                <div class="cell-bg"> <!--Aquí solo es para una imágen de fondo--> </div>
                <div class="cell-content">
                    <h3>Ramen - $180.00</h3>
                    <p>Sopa de fideos con caldo rico y toppings como huevo, carne o alga</p>

                </div>
            </div>
            <div class="cell">
                <div class="cell-bg"> <!--Aquí solo es para una imágen de fondo--> </div>
                <div class="cell-content">
                    <h3>Udon - $160.00</h3>
                    <p>Fideos gruesos en caldo suave con carne, tempura o vegetales</p>

                </div>
            </div>
            <div class="cell">
                <div class="cell-bg"> <!--Aquí solo es para una imágen de fondo--> </div>
                <div class="cell-content">
                    <h3>Tonkatsu - $170.00</h3>
                    <p>Chuleta de cerdo empanizada y crujiente, acompañada de arroz</p>

                </div>
            </div>
            <div class="cell">
                <div class="cell-bg"> <!--Aquí solo es para una imágen de fondo--> </div>
                <div class="cell-content">
                    <h3>Takoyaki - $120.00</h3>
                    <p>Bolitas de masa rellenas de pulpo, cubiertas con salsas</p>

                </div>
            </div>
            <div class="cell">
                <div class="cell-bg"> <!--Aquí solo es para una imágen de fondo--> </div>
                <div class="cell-content">
                    <h3>Teriyaki - $160.00</h3>
                    <p>Carne glaseada en salsa dulce de soya con arroz y vegetales</p>

                </div>
            </div>
            <div class="cell">
                <div class="cell-bg"> <!--Aquí solo es para una imágen de fondo--> </div>
                <div class="cell-content">
                    <h3>Tempura - $140.00</h3>
                    <p>Camarones fritos con una capa crujiente ligera</p>

                </div>
            </div>
            <div class="cell">
                <div class="cell-bg"> <!--Aquí solo es para una imágen de fondo--> </div>
                <div class="cell-content">
                    <h3>Omurice - $130.00</h3>
                    <p>Tortilla de huevo rellena de arroz frito con salsa de tomate</p>

                </div>
            </div> --}}
        </section>
        <section class="der">
            <h3>Mi orden</h3>

            <div class="order-list">
                {{-- <div class="order-item">
                    <div class="info">
                        <p>Sushi</p>
                        <div>
                            <button>−</button>
                            <button>+</button>
                            <span>x1</span>
                        </div>
                    </div>
                    <p class="price">$ 450.00</p>
                    <button class="delete">
                        <img src="{{ asset('Imagenes/Cliente/trash.png') }}" alt="">
                    </button>
                </div>

                <div class="order-item">
                    <div class="info">
                        <p>Gyozas</p>
                        <div>
                            <button>−</button>
                            <button>+</button>
                            <span>x1</span>
                        </div>
                    </div>
                    <p class="price">$ 150.00</p>
                    <button class="delete">
                        <img src="{{ asset('Imagenes/Cliente/trash.png') }}" alt="">
                    </button>
                </div>

                <div class="order-item">
                    <div class="info">
                        <p>Ramen</p>
                        <div>
                            <button>−</button>
                            <button>+</button>
                            <span>x2</span>
                        </div>
                    </div>
                    <p class="price">$ 100.00</p>
                    <button class="delete">
                        <img src="{{ asset('Imagenes/Cliente/trash.png') }}" alt="">
                    </button>
                </div> --}}
            </div>
            <div class="total">
                <p>Total</p>
                <p>$ 450.00</p>
            </div>
            <button class="checkout">Checkout</button>
        </section>
    </main>
</body>

</html>
