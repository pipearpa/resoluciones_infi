<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Resoluciones</title>
</head>
<body>
    <h1>Reporte de Resoluciones</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <!-- Agrega más encabezados según los campos de tu modelo PQR -->
            </tr>
        </thead>
        <tbody>
            @foreach($resolucion as $registro)
            <tr>
                <td>{{ $registro->id }}</td>
                <td>{{ $registro->nombre }}</td>
                <td>{{ $registro->descripcion }}</td>

                <!-- Agrega más celdas según los campos de tu modelo PQR -->
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
