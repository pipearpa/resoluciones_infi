<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Consulta de PQR</title>
</head>
<body>
    <nav class="navbar container-fluid">
        <a href="{{ url('/') }}" style="display: inline-block; width: 80px; height: 90px; background-image: url('https://infimanizales.com/wp-content/uploads/2021/12/Infi-Manizales-Logo-color.png'); background-size: cover; filter: drop-shadow(2px 5px 5px rgba(0, 0, 0, 0.5)); margin: 0 auto;"></a>
    </nav>
    <div class="container">
        <br>
        <div id="consulta">
        <h1>Consulta de PQR</h1>
        </div>
        <form action="{{ route('consultapqrciudadano') }}" method="POST">
            @csrf
            <div class="numeroSolicitud">
                <label for="id" style="font-size: 1.5em">Numero Solicitud:</label>
                <input type="text" id="id" name="id">
            </div>
            <div class="numeroDocumento">
                <label for="numero_documento" style="font-size: 1.5em">Número Documento:</label>
                <input type="text" id="numero_documento" name="numero_documento">
            </div>
            <button type="submit" class="consultar btn btn-lg btn-success">Consultar PQR</button>
        </form>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
<div class="custom-shape-divider-bottom-1712869018">
    <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120"      preserveAspectRatio="none">
        <path d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z" opacity=".25" class="shape-fill"></path>
        <path d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z" opacity=".5" class="shape-fill"></path>
        <path d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z" class="shape-fill"></path>
    </svg>
</div>

<style>

    #consulta {
        display: flex;
        background-color: #468faf;
        border-radius: 25px;
        width: 30%;
        justify-content: center;
    }

    .logo {
        max-width: 100px; /* Ajusta el tamaño máximo del logo según sea necesario */
        height: auto; /* Mantiene la proporción de la imagen */
        filter: drop-shadow(2px 5px 5px rgba(0, 0, 0, 0.5));
    }

    .container {
        display: flex;
        margin: 0 auto;
        flex-direction: column;
        flex-wrap: wrap;
        align-content: center;
        align-items: center;
        gap: 10px;
    }

    form {
        width: 27%;
        margin: 0 auto;
        display: flex;
        flex-direction: column;
        justify-content: center;
        background-color: #89c2d9;
        padding: 50px;
        border-radius: 20px;
        box-shadow: 0 5px 8px rgba(0, 0, 0.1, 0.3);

    }

    .consultar {
        background-color: #468faf; /* Blue background */
        color: #fff; /* White text color */
        border: none; /* Remove default border */
        padding: 15px 30px; /* Adjust padding */
        border-radius: 5px; /* Rounded corners */
        cursor: pointer; /* Indicate clickable area */
        font-size: 18px; /* Adjust font size */
        text-transform: uppercase; /* Make text uppercase */
        transition: background-color 0.3s ease; /* Smooth hover effect */
        margin-top: 25px;
    }

    input[type="text"] {
        padding: 10px;
        font-size: 1em;
        border: 1px solid #ccc;
        border-radius: 5px;
        width: 100%;
        box-sizing: border-box; /* Incluye el padding y el border en el ancho */
    }

    .consultar:hover {
                background-color: #2a6f97; /* Darker blue on hover */
                }

    .navbar {
        display: flex;
        justify-content: space-between;
        align-items: stretch;
        padding: 10px 20px; /* Ajusta el espaciado según sea necesario */
        background-color: #a9d6e5; /* Color de fondo de la navbar */
        box-shadow: 0 4px 5px rgba(0, 0, 0, 0.3); /* Sombra suave */
        flex-wrap: wrap;
        flex-direction: row;
        border-bottom-left-radius: 15px; 
        border-bottom-right-radius: 15px;
    }

    body {
        max-height: 100vh; /* Establece la altura mínima del cuerpo para que sea igual al 100% del viewport height */
    }

    .custom-shape-divider-bottom-1712869018 {
        position: fixed;
        margin:0;
        padding: 0;
        bottom: 0;
        left: 0;
        width: 100%;
        z-index: -1; /* Para que esté detrás del contenido */
        overflow: hidden;
        transform: rotate(180deg);
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

        /* Responsive styles for smaller screens */
    @media (max-width: 768px) {
        .custom-shape-divider-bottom-1712869018 svg {
            width: calc(100% + 1.3px);
            height: 80px;
        }

        form {
            width: 100%;
        }

        #consulta {
            width: 70%;
        }
    }

</style>