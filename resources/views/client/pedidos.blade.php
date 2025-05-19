@php
    use Carbon\Carbon;
@endphp
<!DOCTYPE html>
<html lang="es">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Titulo--------------------------------------------------------------------------------------------------------------------->
    <title>Pedidos</title>
    <!--Css------------------------------------------------------------------------------------------------------------------------->
    @vite(['resources/css/global.css'])
    @vite(['resources/css/pedidos.css'])

    <!--Favicon-------------------------------------------------------------------------------------------------------------------->
    <link rel="icon" href="{{ asset('Imagenes/icono.png') }}" type="image/x-icon">
    <link
        href="https://fonts.googleapis.com/css2?family=Kaisei+Decol&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
</head>

<body>
    <div class="container">
        <header class="header-pedidos" style="display: flex; align-items: center; gap: 2rem; margin-bottom: 2rem;">
            <a href="javascript:history.back()" class="btn-back">
                <svg viewBox="0 0 40 40" class="arrow-icon">
                    <circle cx="20" cy="20" r="18" />
                    <polyline points="23,12 15,20 23,28" />
                </svg>
                <span>Regresar</span>
            </a>
            <h2>Mis Pedidos</h2>
        </header>
        @forelse ($ventas as $venta)
            <div class="pedido border rounded-lg p-4 mb-6 shadow-md bg-white">
                <h4 class="text-lg font-bold mb-2">
                    Compra del {{ \Carbon\Carbon::parse($venta->fecha)->format('d/m/Y H:i') }}
                </h4>
                <p><strong>Método de pago:</strong> {{ $venta->metodo_pago }}</p>
                <p class="total font-semibold text-green-600">
                    <strong>Total:</strong> ${{ number_format($venta->detalles->sum('total'), 2) }}
                </p>

                <table class="w-full mt-4 border border-gray-300 text-sm">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-2 py-1 border">Producto</th>
                            <th class="px-2 py-1 border">Cantidad</th>
                            <th class="px-2 py-1 border">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($venta->detalles as $detalle)
                            <tr>
                                <td class="px-2 py-1 border">
                                    {{ $detalle->producto->nombre ?? 'Producto eliminado' }}
                                </td>
                                <td class="px-2 py-1 border">{{ $detalle->cantidad }}</td>
                                <td class="px-2 py-1 border">
                                    ${{ number_format($detalle->total, 2) }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @empty
            <p>No hay ventas registradas.</p>
        @endforelse
        </main>
    </div>
</body>

</html>
