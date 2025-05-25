<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Titulo--------------------------------------------------------------------------------------------------------------------->
    <title>Mesero</title>
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
                <img src="{{ asset('Imagenes/Mesero/imagen_perfil_mesero.png') }}" alt="">
            </div>
            <p>{{ Auth::user()->name }}</p>

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="boton">
                    <img src="{{ asset('Imagenes/cerrar_sesion.png') }}" alt="">
                    <p>Cerrar sesión</p>
                </button>
            </form>
            <a href="{{ route('mesero.comandas') }}" class="boton">
                <img src="{{ asset('Imagenes/Mesero/comandas.png') }}" alt="">
                <p>Comandas</p>
            </a>
        </section>
        <section class="center">
        </section>
        <section class="der">
            <h3>Mi orden</h3>
            <div class="order">
                <img src="{{ asset('Imagenes/Mesero/clock.png') }}" alt="">
                <p id="reloj-hora">--:-- --</p>
            </div>
            <script>
                function mostrarHora() {
                    const reloj = document.getElementById('reloj-hora');
                    if (!reloj) return;
                    const ahora = new Date();
                    let horas = ahora.getHours();
                    const minutos = ahora.getMinutes().toString().padStart(2, '0');
                    const ampm = horas >= 12 ? 'pm' : 'am';
                    horas = horas % 12 || 12;
                    reloj.textContent = `${horas}:${minutos} ${ampm}`;
                }
                setInterval(mostrarHora, 1000);
                mostrarHora();
            </script>
            <div class="mesa-select">
                <img src="{{ asset('Imagenes/Mesero/mesa.png') }}" alt="" class="icono-mesa">
                <select id="mesa-seleccionada">
                    @for ($i = 1; $i <= 21; $i++)
                        <option value="{{ $i }}">Mesa {{ $i }}</option>
                    @endfor
                </select>
            </div>

            <div class="order-list">

            </div>

            <div class="total">
                <p>Total</p>
                <p>$ 450.00</p>
            </div>

            <button class="checkout">Finalizar pedido</button>
        </section>
    </main>
</body>

</html>
