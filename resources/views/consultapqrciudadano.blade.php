<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de PQR</title>
    <style>
        /* Estilos del formulario */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .btn {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        /* Estilos del mensaje de error */
        .error-message {
            display: none; /* Por defecto, ocultar la alerta */
            padding: 10px;
            background-color: #f44336;
            color: white;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        /* Estilos del mensaje de no encontrado */
        #not-found-message {
            display: none;
            padding: 10px;
            background-color: #f44336;
            color: white;
            border-radius: 5px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Consulta de PQR</h1>
        <!-- Formulario de consulta de PQR -->
        <form id="pqr-form" action="{{ route('consultapqrciudadano') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="id">Número Solicitud:</label>
                <input type="text" id="id" name="id">
            </div>
            <div class="form-group">
                <label for="numero_documento">Número Documento:</label>
                <input type="text" id="numero_documento" name="numero_documento">
            </div>
            <button type="submit" class="btn">Consultar PQR</button>
        </form>
        
        <!-- Mensaje de error -->
        <div id="error-message" class="error-message">
            Por favor, complete todos los campos.
        </div>

        <!-- Mensaje de no encontrado -->
        <div id="not-found-message">
            No se encontró ninguna PQR con los datos proporcionados.
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Escuchar el evento submit del formulario
            document.getElementById('pqr-form').addEventListener('submit', function(event) {
                // Obtener los valores de los campos
                const id = document.getElementById('id').value.trim();
                const numero_documento = document.getElementById('numero_documento').value.trim();

                // Validar si alguno de los campos está vacío
                if (id === '' || numero_documento === '') {
                    // Mostrar la alerta de error
                    document.getElementById('error-message').style.display = 'block';
                    // Ocultar el mensaje de no encontrado
                    document.getElementById('not-found-message').style.display = 'none';

                    // Prevenir el envío del formulario
                    event.preventDefault();
                }
            });
        });

        // Función para mostrar el mensaje de no encontrado
        function showNotFoundMessage() {
            document.getElementById('not-found-message').style.display = 'block';
        }
    </script>
</body>
</html>
