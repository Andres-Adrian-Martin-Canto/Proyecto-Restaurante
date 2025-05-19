<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Titulo--------------------------------------------------------------------------------------------------------------------->
    <title>Reservaciones</title>
    <!--Css------------------------------------------------------------------------------------------------------------------------>
    @vite(['resources/css/reserva.css'])
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
            <div class="select">
                <label for="start" onclick="document.getElementById('start').showPicker()">Inicio</label>
                <input type="datetime-local" name="start" id="start" required>
            </div>
            <div class="select">
                <label for="end" onclick="document.getElementById('end').showPicker()">Finalización</label>
                <input type="datetime-local" name="end" id="end" required>
            </div>
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
                <div class="mesa mesa1">1</div>
                <div class="mesa">2</div>
                <div class="mesa">3</div>
                <div class="mesa">4</div>
                <div class="mesa">5</div>
                <div class="mesa">6</div>
                <div class="mesa">7</div>
                <div class="mesa">8</div>
                <div class="mesa">9</div>
                <div class="mesa mesa-central">21</div>
                <div class="mesa">10</div>
                <div class="mesa">11</div>
                <div class="mesa">12</div>
                <div class="mesa">13</div>
                <div class="mesa">14</div>
                <div class="mesa">15</div>
                <div class="mesa">16</div>
                <div class="mesa">17</div>
                <div class="mesa">18</div>
                <div class="mesa">19</div>
                <div class="mesa">20</div>
            </div>
        </div>
    </main>

</body>

</html>
