<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@vite(['resources/css/nuevaresolucion.css'])

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nueva Resolución</title>
    <!-- Agrega enlaces a tus archivos CSS aquí -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="font-sans antialiased dark:bg-black dark:text-white/50">
    <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">

        <div
            class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#62e769] selection:text-white">
            <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                <header class="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3">
                    <nav class="navbar container-fluid">
                        <a href="{{ url('/dashboard') }}"
                            style="display: inline-block; width: 80px; height: 90px; background-image: url('https://infimanizales.com/wp-content/uploads/2021/12/Infi-Manizales-Logo-color.png'); background-size: cover; filter: drop-shadow(2px 5px 5px rgba(0, 0, 0, 0.5)); margin: 0 auto;"></a>
                    </nav>
                </header>
                <div class="creaReso container-fluid">

                    <h1 class="text-center">CREA UNA NUEVA RESOLUCION
                        <hr>
                    </h1>
                    <form action="{{ route('crearnuevaresolucion.store') }}" method="POST" enctype="multipart/form-data"
                        class="grid-form">
                        @csrf
                        <section {{-- class="creaReso" --}}>
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre de la Resolución:</label>
                                <input type="text" class="form-control" id="nombre" name="nombre">
                            </div>
                            <div class="mb-3">
                                <label for="descripcion" class="form-label" id="descripcion">Descripción:</label>
                                <textarea class="form-control" id="descripcion" name="descripcion" rows="6" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="col-md-4 control-label" id="archivo">Nuevo Archivo</label>
                                <div class="col-md-6">
                                    <input type="file" class="form-control" name="archivo">
                                </div>
                            </div>
                            <button type="submit" class="btn col-6" id="enviar">Guardar Resolución</button>
                        </section>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <!-- Agrega enlaces a tus archivos JavaScript aquí -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
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



{{-- <script>
    function toggleCampos() {
        var anonimoCheckbox = document.getElementById('anonimo');
        var camposOcultar = ['nombre', 'tipoDocumento', 'numero_documento', 'numeroTel', 'direccion'];

        if (anonimoCheckbox.checked) {
            camposOcultar.forEach(function(campo) {
                var input = document.getElementById(campo);
                var label = document.querySelector(`label[for='${campo}']`);
                if (input) input.style.display = 'none';
                if (label) label.style.display = 'none';
            });
        } else {
            camposOcultar.forEach(function(campo) {
                var input = document.getElementById(campo);
                var label = document.querySelector(`label[for='${campo}']`);
                if (input) input.style.display = 'block';
                if (label) label.style.display = 'block';
            });
        }
    }
</script> --}}
