<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Titulo--------------------------------------------------------------------------------------------------------------------->
    <title>Reservaciones</title>
    <!--Css------------------------------------------------------------------------------------------------------------------------>
    @vite(['resources/css/reserva.css', 'resources/css/global.css', 'resources/js/cliente/reservacion/index.js'])
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
        <div class="izq">
            <header class="header-pedidos">
                <h3>Reservación</h3>
                <a href="{{ route('cliente') }}" class="btn-back">
                    <svg viewBox="0 0 40 40" class="arrow-icon">
                        <circle cx="20" cy="20" r="18" />
                        <polyline points="23,12 15,20 23,28" />
                    </svg>
                    <span>Regresar</span>
                </a>
            </header>

            {{-- ** Desde aqui para abajo --}}
            <div class="select">
                <label for="date" onclick="document.getElementById('date').showPicker()">Fecha</label>
                <input type="date" name="date" id="date" required>
            </div>
            <div class="select">
                <label for="start_time" onclick="document.getElementById('start_time').showPicker()">Hora de
                    inicio</label>
                <input class="horaInicial" type="time" name="start_time" id="start_time" required>
            </div>
            <div class="select">
                <label for="end_time" onclick="document.getElementById('end_time').showPicker()">Hora de
                    finalización</label>
                <input class="horaFinal" type="time" name="end_time" id="end_time" disabled required>
            </div>
            {{-- ** Fin --}}

            <div class="select">
                <label for="chart" onclick="document.getElementById('chart').showPicker()">Mesa</label>
                <select name="chart" id="chart">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    <option value="13">13</option>
                    <option value="14">14</option>
                    <option value="15">15</option>
                    <option value="16">16</option>
                    <option value="17">17</option>
                    <option value="18">18</option>
                    <option value="19">19</option>
                    <option value="20">20</option>
                    <option value="21">21</option>
                </select>
            </div>

            <button type="submit">Realizar reservación</button>
            <button type="submit">Consultar reservaciones</button>

            <div class="leyenda">
                <div class="color-box blue"></div>
                <p>Mesa seleccionada</p>
            </div>
            <div class="leyenda">
                <div class="color-box green"></div>
                <p>Mesa disponible</p>
            </div>
            <div class="leyenda">
                <div class="color-box orange"></div>
                <p>Mesa no disponible</p>
            </div>
        </div>

        <div class="der">
            <div class="grid">
                @for ($i = 1; $i <= 21; $i++)
                    @if ($i == 10)
                        <div class="mesa mesa-central" data-status="{{ $status[21] ?? 'disponible' }}">21</div>
                    @else
                        <div class="mesa" data-status="{{ $status[$i] ?? 'disponible' }}">{{ $i <= 9 ? $i : $i - 1 }}</div>
                    @endif
                @endfor
            </div>
        </div>
    </main>
</body>

</html>
