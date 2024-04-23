<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Consulta de PQR</title>
    <!-- Agrega enlaces a tus archivos CSS aquí -->
</head>
<body>
    <div class="container">
        <h1 class="text-center">Consulta de PQR</h1>
        <!-- Aquí puedes agregar el formulario de consulta de PQR -->
        <form action="{{ route('consultapqrciudadano') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="numero_pqr" class="form-label">Número de PQR:</label>
                <input type="text" class="form-control" id="numero_pqr" name="numero_pqr" required>
            </div>
            <button type="submit" name="consultarpqr" id= "consultarpqr" class="btn btn-primary">Consultar</button>
        </form>
    </div>
    <!-- Agrega enlaces a tus archivos JavaScript aquí -->
</body>
</html>
