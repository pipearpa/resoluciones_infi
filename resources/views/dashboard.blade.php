<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="contenido overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Bienvenido Al Panel Administrativo!") }}
                </div>

                <div class="container">
                    <div id="paginated-content" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach ($pqrs as $index => $pqr)
                            <div class="item">
                                <h3>Tipo: {{ $pqr->tipo }}</h3>
                                <h3>Nombre: {{ $pqr->nombre }}</h3>
                                <h3>Tipo Respuesta: {{ $pqr->respuesta }}</h3>
                                <h3>Documento: {{ $pqr->numero_documento }}</h3>
                                <p>Descripción PQR: {{ $pqr->descripcion }}</p>
                                <!-- Agrega aquí más campos que desees mostrar -->
                            </div>
                        @endforeach
                    </div>
                    <!-- Aquí se encuentra el paginador -->
                    <div id="pagination" class="flex justify-center items-center mt-6">
                        <button id="prev-page" class="pagination-control mr-2">Anterior</button>
                        <span id="current-page" class="pagination-current"></span>
                        <button id="next-page" class="pagination-control ml-2">Siguiente</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<style>
    .contenido {
        background-color: #e0eff5;
        filter: drop-shadow(2px 5px 5px rgba(0, 0, 0, 0.5));
        border-radius: 15px;
    }

    /* Estilos para el paginador */
    .pagination-control {
        padding: 8px 16px;
        border: 1px solid #007bff;
        background-color: #fff;
        color: #007bff;
        cursor: pointer;
        border-radius: 20px;
    }

    #pagination {
        background-color: #4d5c99;
        gap: 15px;
        color: white;
        height: 75px;
    }

    .pagination-control:hover {
        background-color: #007bff;
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

    /* Estilos adicionales para hacer el diseño más responsivo */
    @media screen and (max-width: 768px) {
        .pagination-control {
            padding: 10px 12px;
        }

        .pagination-current {
            margin: 0 5px;
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
</style>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        let itemsPerPage = 6; // Número de elementos por página
        const contentContainer = document.getElementById('paginated-content');
        const paginationContainer = document.getElementById('pagination');
        const prevPageButton = document.getElementById('prev-page');
        const nextPageButton = document.getElementById('next-page');
        const currentPageSpan = document.getElementById('current-page');

        // Datos de ejemplo
        const totalItems = {{ count($pqrs) }}; // Total de elementos
        let currentPage = 1; // Página actual

        // Función para mostrar los elementos de la página actual
        function displayCurrentPage() {
            const startIndex = (currentPage - 1) * itemsPerPage;
            const endIndex = Math.min(startIndex + itemsPerPage, totalItems);

            // Oculta todos los elementos primero
            const items = contentContainer.querySelectorAll('.item');
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

        // Mostrar la página actual y generar el paginador al cargar la página
        displayCurrentPage();
        generatePagination();
    });
</script>
