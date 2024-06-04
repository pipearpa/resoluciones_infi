<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de PQRS</title>
</head>
<body>
    <h1>Reporte de PQRS</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tipo</th>
                <th>Estado</th>
                <th>Email</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Respuesta</th>
                <!-- Agrega más encabezados según los campos de tu modelo PQR -->
            </tr>
        </thead>
        <tbody>
            @foreach($pqr as $registro)
            <tr>
                <td>{{ $registro->id }}</td>
                <td>{{ $registro->tipo }}</td>
                <td>{{ $registro->estado }}</td>
                <td>{{ $registro->email }}</td>
                <td>{{ $registro->nombre }}</td>
                <td>{{ $registro->descripcion }}</td>
                <td>{{ $registro->respuesta }}</td>
                <!-- Agrega más celdas según los campos de tu modelo PQR -->
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
