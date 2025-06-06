<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Titulo--------------------------------------------------------------------------------------------------------------------->
    <title>El Admin</title>
    <!--Css------------------------------------------------------------------------------------------------------------------------>
    @vite(['resources/css/admin.css'])
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
        <section class="izq">
            <div class="icon">
                <img src="{{ asset('Imagenes/Administrador/imagen_perfil_admin.png') }}" alt="" class="plato">
            </div>
            <p>El Admin Carlos</p>

            <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit" class="boton">
                    <img src="{{ asset('Imagenes/cerrar_sesion.png') }}" alt="" class="plato">
                    <p>Cerrar sesión</p>
                </button>
            </form>

        </section>

        <section class="der">
            <h3 class="titulo">Generar reportes</h3>
            <form action="{{ route('reporte.exportar') }}" method="POST" class="formulario">
                @csrf
                <div class="select">
                    <label for="start">Inicio</label>
                    <input type="datetime-local" name="start" id="start" required>
                </div>
                <div class="select">
                    <label for="end">Finalización</label>
                    <input type="datetime-local" name="end" id="end" required>
                </div>
                <div class="select">
                    <label for="concept">Concepto</label>
                    <select name="concept" id="concept" required>
                        <option value="Ventas">Ventas</option>
                        <option value="Reservaciones">Reservaciones</option>
                        <option value="Comandas_y_pedidos">Comandas y pedidos</option>
                    </select>
                </div>
                <button type="submit">Generar reporte</button>
            </form>
        </section>
          
    </main>
</body>

</html>
