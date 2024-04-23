<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nueva PQR</title>
    <!-- Agrega enlaces a tus archivos CSS aquí -->
</head>
<body>
    <div class="container">
        <h1 class="text-center">Nueva PQR</h1>
        <!-- Aquí puedes agregar el formulario de creación de nueva PQR -->
        <form action="{{ route('nuevapqr') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="tipo" class="form-label">Tipo de PQR:</label>
                <select class="form-select" id="tipo" name="tipo" required>
                    <option value="Peticion">Petición</option>
                    <option value="Queja">Queja</option>
                    <option value="Reclamo">Reclamo</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción:</label>
                <textarea class="form-control" id="descripcion" name="descripcion" rows="5" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Enviar PQR</button>
        </form>
    </div>
    <!-- Agrega enlaces a tus archivos JavaScript aquí -->
</body>
</html>
