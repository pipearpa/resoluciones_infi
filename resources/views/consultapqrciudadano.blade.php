<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de PQR</title>

    <header class="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3">
        <nav class="navbar container-fluid">
            <a href="{{ url('/') }}"
                style="display: inline-block; width: 80px; height: 90px; background-image: url('https://infimanizales.com/wp-content/uploads/2021/12/Infi-Manizales-Logo-color.png'); background-size: cover; filter: drop-shadow(2px 5px 5px rgba(0, 0, 0, 0.5)); margin: 0 auto;"></a>
        </nav>
    </header>
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
</body>

</html>
<div class="custom-shape-divider-bottom-1712869018">
    <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
        <path
            d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z"
            opacity=".25" class="shape-fill"></path>
        <path
            d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z"
            opacity=".5" class="shape-fill"></path>
        <path
            d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z"
            class="shape-fill"></path>
    </svg>
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

<style>
    /* Estilos del formulario */
    html {
        max-height: max-content;
    }

    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        /* margin: 0; */
        /* padding: 200px; */
        overflow-x: hidden;
        /* max-height: auto; */
    }

    .container {
        width: fit-content;
        margin: 0 auto;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        position: relative;
        margin-top: 210px;
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
        width: 90%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .btn {
        background-color: #39bb36;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
        display: flex;
        align-items: center;
        margin: 0 auto;
    }

    .btn:hover {
        background-color: #33D7A7;
    }

    /* Estilos del mensaje de error */
    .error-message {
        display: none;
        /* Por defecto, ocultar la alerta */
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

    .navbar {
        left: 0px;
        width: 97.5%;
        position: absolute;
        top: 0px;
        display: flex;
        padding: 10px 20px;
        background-color: #f3f3f3;
        box-shadow: 0 4px 5px rgba(0, 0, 0, 0.3);
    }

    .custom-shape-divider-bottom-1712869018 {
        margin: 0;
        padding: 0;
        bottom: -70px;
        left: -9px;
        width: 103.5%;
        z-index: -1;
        overflow: hidden;
        transform: rotate(180deg);
        position: relative;
    }

    .custom-shape-divider-bottom-1712869018 svg {
        position: relative;
        display: block;
        width: calc(100% + 1.3px);
        height: 154px;
    }

    .custom-shape-divider-bottom-1712869018 .shape-fill {
        fill: #265073;
    }


    /* /#D369C1 COLOR POR DEFECTO DE LA DECORACIÓN DE ABAJO/ */

    /* For mobile devices */
    @media screen (min-width: 768px) and (max-width: 360px) {
        input[type="text"] {
            width: 90%;
        }

        .custom-shape-divider-bottom-1712869018 svg {
            width: calc(100% + 1.3px);
            height: 150px;
        }
        html {
            overflow-y: hidden;
        }

        body {
            overflow-y: hidden;
        }
    }

/*     @media screen (max-width: 360px) and (min-height: 740px) {
        .custom-shape-divider-bottom-1712869018 svg {
            width: calc(100% + 1.3px);
            height: 150px;
        }
        .custom-shape-divider-bottom-1712869018 {
            bottom: -50px;
            width: 109%;
            overflow-x: hidden;
            position: relative;
            bottom: -130px;
        }
    } */
</style>
