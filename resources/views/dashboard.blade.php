<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8"
            style="padding: 8px;background-color: #c1eae9; border-radius: 20px;">
            <div class="contenido overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
                <div id="paginated-content" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($pqrs as $index => $pqr)
                        <div class="pqr-card">
                            <div class="pqr-summary">
                                <h1><strong> Tipo : {{ $pqr->tipo }} </strong></h1>
                                <p style="font-size: 20px"> <strong>Descripción :</strong> {{ $pqr->descripcion }} </p>
                                <span class="pqr-id">ID: {{ $pqr->id }}</span>
                            </div>

                            <div class="pqr-info">
                                <p><strong>Fecha de creación:</strong> {{ $pqr->created_at }}</p>
                                <p><strong>Usuario:</strong> {{ $pqr->nombre }}</p>
                                <p><strong>Tipo de documento:</strong> {{ $pqr->tipoDocumento }}</p>
                                <p><strong>Número de documento:</strong> {{ $pqr->numero_documento }}</p>
                                <p><strong>Correo electrónico:</strong> {{ $pqr->email }}</p>
                                <p><strong>Número de teléfono:</strong> {{ $pqr->numeroTel }}</p>
                                <p><strong>Dirección:</strong> {{ $pqr->direccion }}</p>
                                <p><strong>Medio de Respuesta:</strong> {{ $pqr->respuesta }}</p>
                                <p><strong>Archivos Adjuntos:</strong> {{ $pqr->archivo }}</p>
                            </div>

                            <div class="pqr-actions">
                                <button class="btn btn-primary" onclick="openModal('{{ $pqr->id }}')">Ver
                                    Detalles</button>
                                {{-- <button class="btn btn-secondary" onclick="assignPqr(pqr.id)">Asignar</button>
                                <button class="btn btn-success" onclick="resolvePqr(pqr.id)">Resolver</button>
                                <button class="btn btn-warning" onclick="escalatePqr(pqr.id)">Escalar</button> --}}
                            </div>
                        </div>

                        <!-- Modal -->
                        <div id="modal-{{ $pqr->id }}" class="modal">
                            <div class="modal-content">
                                <span class="close" onclick="closeModal('{{ $pqr->id }}')">&times;</span>
                                <span class="pqr-id" style="font-size: 20px">ID: {{ $pqr->id }}</span>
                                <hr>
                                <h2 style="margin: 5px; font-size:20px;"><strong> Tipo : {{ $pqr->tipo }} </strong>
                                </h2>
                                <hr><br>
                                <p><strong>Descripción :</strong> {{ $pqr->descripcion }}</p> <br>
                                <hr>
                                <p><strong>Fecha de creación:</strong> {{ $pqr->created_at }}</p>
                                <hr>
                                <p><strong>Usuario:</strong> {{ $pqr->nombre }}</p>
                                <hr>
                                <p><strong>Tipo de documento:</strong> {{ $pqr->tipoDocumento }}</p>
                                <hr>
                                <p><strong>Número de documento:</strong> {{ $pqr->numero_documento }}</p>
                                <hr>
                                <p><strong>Correo electrónico:</strong> {{ $pqr->email }}</p>
                                <hr>
                                <p><strong>Número de teléfono:</strong> {{ $pqr->numeroTel }}</p>
                                <hr>
                                <p><strong>Dirección:</strong> {{ $pqr->direccion }}</p>
                                <hr>
                                <p><strong>Medio de Respuesta:</strong> {{ $pqr->respuesta }}</p>
                                <hr>
                                <p><strong>Nombre Archivo Adjuntos:</strong> {{ $pqr->archivo }}</p>
                                <hr>
                                <!-- Agrega esto en tu vista donde muestras los detalles de la PQR -->
                                <p><strong>Archivos Adjuntos:</strong>
                                    @if ($pqr->archivo)
                                        <a href="{{ route('download', $pqr->id) }}" style="color: red";">Descargar archivo</a>
                                    @else
                                        Sin archivo adjunto
                                    @endif
                                </p>
                               
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Aquí se encuentra el paginador -->
                <div id="pagination" class="px-6 py-4 flex flex-wrap justify-center items-center">
                    <div id="acomodar">
                        <button id="prev-page" class="pagination-control mr-2">Anterior</button>
                        <span id="current-page" class="pagination-current"></span>
                        <button id="next-page" class="pagination-control ml-2">Siguiente</button>
                        <select id="items-per-page" class="ml-3">
                            <option value="3">3 elementos por página</option>
                            <option value="6">6 elementos por página</option>
                            <option value="12">12 elementos por página</option>
                            <option value="18">18 elementos por página</option>
                            <!-- Agrega más opciones según sea necesario -->
                        </select>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
</x-app-layout>

<style>
    /* PQR Card Container */
    #paginated-content {
        display: grid;
        padding: 10px;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 20px;
        margin: 0 auto;
    }

    /* Individual PQR Card */
    .pqr-card {
        background-color: #c1eae9;
        border-radius: 8px;
        box-shadow: 0 1px 8px rgba(0, 0, 0.5, 1);
        padding: 20px;
        max-width: 100%;
        /* Prevent cards from overflowing container */
        margin-bottom: 20px;
        /* Add spacing between cards */
    }

    /* PQR Summary */
    .pqr-summary {
        margin-bottom: 15px;
    }

    .pqr-summary h1 {
        font-size: 18px;
        margin-bottom: 5px;
        color: #333;
    }

    .pqr-summary p {
        font-size: 14px;
        line-height: 1.5;
        color: #666;
        white-space: nowrap;
        /* Evita que el texto se divida en varias líneas */
        overflow: hidden;
        /* Oculta el texto que excede el tamaño del contenedor */
        text-overflow: ellipsis;
        /* Muestra "..." al final del texto truncado */
    }

    .pqr-id {
        font-size: 12px;
        color: #aaa;
        margin-top: 5px;
    }

    /* PQR Info */
    .pqr-info {
        flex: 1;
        /* Allow info section to grow */
        margin-bottom: 15px;
    }

    .pqr-info p {
        font-size: 14px;
        line-height: 1.5;
        color: #333;
        margin-bottom: 5px;
    }

    /* PQR Actions */
    .pqr-actions {
        display: flex;
        justify-content: space-between;
        align-items: center;
        /* Align buttons vertically */
    }

    .pqr-actions button {
        padding: 8px 16px;
        border: 1px solid #ddd;
        border-radius: 4px;
        cursor: pointer;
        transition: all 0.2s ease-in-out;
    }

    .pqr-actions button:hover {
        background-color: #eee;
    }

    /* Action Button Colors (Adjust as needed) */
    /*     .btn-primary {
    background-color: #007bff;
    color: #fff;
    } */

    .btn-secondary {
        background-color: #6c757d;
        color: #fff;
    }

    .btn-success {
        background-color: #28a745;
        color: #fff;
    }

    .btn-warning {
        background-color: #ffc107;
        color: #000;
    }

    /* Responsive Adjustments (Optional) */
    @media screen and (max-width: 768px) {
        #paginated-content {
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        }
    }

    @media screen and (max-width: 576px) {
        #paginated-content {
            grid-template-columns: 1fr;
        }

        #paginated-content {
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        }

        .pqr-card {
            flex-direction: initial;
        }

        /* .pqr-summary {
        display: flex;
        flex-direction: column;
        align-items: center;
        flex-wrap: wrap;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    } */

        #acomodar {
            position: relative;
            left: 14px;
        }
    }


    .pqr-card {
        background-color: #f7f7f7;
        padding: 10px;
    }

    .contenido {
        background-color: #e0eff5;
        filter: drop-shadow(2px 5px 5px rgba(0, 0, 0, 0.5));
        border-radius: 15px;
    }

    /* Estilos para el paginador */
    .pagination-control {
        padding: 8px 16px;
        border: 1px solid #7eae89;
        background-color: #fff;
        color: #7eae89;
        cursor: pointer;
        border-radius: 20px;
    }

    #pagination {
        background-color: #2c7da0;
        gap: 15px;
        color: white;
        height: 75px;
        margin: 0 auto;
        width: fit-content;
        border-radius: 60px;
        position: relative;
        bottom: 10px;
    }

    .pagination-control:hover {
        background-color: #7eae89;
        color: #fff;
    }

    .pagination-control[disabled] {
        opacity: 0.5;
        cursor: not-allowed;
    }

    /* Estilos para el indicador de página actual */
    .pagination-current {
        margin: 0 10px;
        font-weight: bold;
    }

    /* Estilos para el contenedor de elementos paginados */
    .item {
        background-color: #f7f7f7;
        border-radius: 8px;
        padding: 20px;
        margin-bottom: 20px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        color: #333;
    }

    #items-per-page:hover {
        background-color: #7eae89;
        border: 1px solid #7eae89;
        color: rgb(255, 255, 255);
        border-radius: 20px;
    }

    #items-per-page {
        border: 1px solid #7eae89;
        color: #7eae89;
        border-radius: 20px;
    }


    /* Estilos adicionales para hacer el diseño más responsivo */
    @media screen and (max-width: 768px) {
        .pagination-control {
            padding: 10px 12px;
        }

        .pagination-current {
            margin: 0 5px;
        }

        #pagination {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            align-content: center;
        }

        #items-per-page {
            position: relative;
            left: 20px;
        }
    }

    @media screen and (max-width: 576px) {
        .pagination-control {
            padding: 4px 8px;
        }

        .pagination-current {
            margin: 0 3px;
        }
    }


    /* Estilo para el modal */
    .modal {
        display: none;
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0, 0, 0, 0.4);
    }

    /* Contenido del modal */
    .modal-content {
        display: flex;
        align-content: center;
        justify-content: center;
        flex-wrap: wrap;
        background-color: #fefefe;
        margin: 15% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
    }

    /* Botón para cerrar el modal */
    .close {
        color: #aaa;
        float: right;
        font-size: 35px;
        font-weight: bold;

    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }
</style>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-U1W1WqQOG3zIFz9g2V2Cq6Mplplml5dlQfwQ91LW6Fypf82i2R4kOnzI42P3rjG" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.2/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-O4lQ2B74G25gR169MCw6pQ1q4kZ05Q4Qz9i7Q7Q7tWR7F+qP0pK6U1ZI4hQzV3" crossorigin="anonymous"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        let itemsPerPage = 3; // Número de elementos por página inicial
        const contentContainer = document.getElementById('paginated-content');
        const paginationContainer = document.getElementById('pagination');
        const prevPageButton = document.getElementById('prev-page');
        const nextPageButton = document.getElementById('next-page');
        const currentPageSpan = document.getElementById('current-page');
        const itemsPerPageSelect = document.getElementById('items-per-page');

        // Datos de ejemplo
        const totalItems = {{ count($pqrs) }}; // Total de elementos
        let currentPage = 1; // Página actual

        // Función para mostrar los elementos de la página actual
        function displayCurrentPage() {
            const startIndex = (currentPage - 1) * itemsPerPage;
            const endIndex = Math.min(startIndex + itemsPerPage, totalItems);

            // Oculta todos los elementos primero
            const items = contentContainer.querySelectorAll('.pqr-card');
            items.forEach(item => item.style.display = 'none');

            // Muestra solo los elementos de la página actual
            for (let i = startIndex; i < endIndex; i++) {
                items[i].style.display = 'block';
            }
        }

        // Función para generar el paginador
        function generatePagination() {
            const totalPages = Math.ceil(totalItems / itemsPerPage);

            currentPageSpan.textContent = `Página ${currentPage} de ${totalPages}`;

            prevPageButton.disabled = currentPage === 1;
            nextPageButton.disabled = currentPage === totalPages;
        }

        // Función para ir a una página específica
        function goToPage(page) {
            const totalPages = Math.ceil(totalItems / itemsPerPage);
            currentPage = Math.max(1, Math.min(page, totalPages));
            displayCurrentPage();
            generatePagination();
        }

        // Event listeners para botones de paginación
        prevPageButton.addEventListener('click', () => goToPage(currentPage - 1));
        nextPageButton.addEventListener('click', () => goToPage(currentPage + 1));

        itemsPerPageSelect.addEventListener('change', function() {
            itemsPerPage = parseInt(this.value);
            currentPage = 1; // Volver a la primera página al cambiar el número de elementos por página
            displayCurrentPage();
            generatePagination();
        });

        // Mostrar la página actual y generar el paginador al cargar la página
        displayCurrentPage();
        generatePagination();
    });
</script>

<script>
    function openModal(id) {
        var modal = document.getElementById('modal-' + id);
        modal.style.display = 'block';
    }

    // Función para cerrar el modal con el ID de la PQR específica
    function closeModal(id) {
        var modal = document.getElementById('modal-' + id);
        modal.style.display = 'none';
    }
</script>
