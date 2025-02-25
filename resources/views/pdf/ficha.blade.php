<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ficha Técnica - {{ $producto->nombre }}</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        h1 { color: #333; }
        .container { width: 100%; text-align: center; }
        img { width: 200px; height: auto; margin-bottom: 10px; }
        .info { text-align: left; margin-top: 20px; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Ficha Técnica</h1>
        <img src="{{ $producto->imagen }}" alt="{{ $producto->nombre }}">
        <div class="info">
            <p><strong>Nombre:</strong> {{ $producto->nombre }}</p>
            <p><strong>Descripción:</strong> {{ $producto->descripcion }}</p>
            <p><strong>Precio:</strong> S/ {{ $producto->precio }}</p>
        </div>
    </div>
</body>
</html>
