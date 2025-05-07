<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!--Titulo--------------------------------------------------------------------------------------------------------------------->
  <title>GOKAI ASIAN FOOD</title>
  <!--Css------------------------------------------------------------------------------------------------------------------------>
  @vite(['resources/css/principal.css', 'resources/js/principal.js'])
  <!--Favicon-------------------------------------------------------------------------------------------------------------------->
  <link rel="icon" href="{{ asset('Favicon.png') }}" type="image/x-icon">
</head>

<body>
  <div class="contenedor">
    <h1 class="titulo">GOKAI ASIAN FOOD</h1>
  </div>

  <a class="boton-completo" href="{{ route('login') }}">
    <span class="texto-boton">Explora, Ordena y Disfruta.</span>
    <button class="boton-go">GO</button>
  </a>

</body>
</html>
