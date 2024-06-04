<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8"
            style="padding: 8px; border-radius: 20px;">
            <div class="contenido overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <section class="filtro">
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link active" data-tab="Sin tramitar" href="#">Sin tramitar</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-tab="En trámite" href="#">En trámite</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-tab="Tramitada" href="#">Tramitada</a>
                            </li>
                        </ul>
                    </section>

                    <a href="http://localhost/pqr_infi_mzls/public/pdf" class="btn" id="exportarPDF">
                        <i class="fas fa-file-pdf"></i> Exportar a PDF
                    </a>
                </div>

                <div id="paginated-content" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <ol class="list-group list-group-numbered">
                        @foreach ($pqrs as $index => $pqr)
                            <li class="pqr-card" data-estado="{{ $pqr->estado }}">
                                <div class="ms-2 me-auto">
                                    <div class="fw-bold">Tipo: {{ $pqr->tipo }}</div>
                                    <p>ID: {{ $pqr->id }}</p>
                                    <p>Estado: {{ $pqr->estado }}</p>
                                </div>
                                    <div class="pqr-actions">
                                        <button class="btn btn-primary" onclick="openModal('{{ $pqr->id }}')">Ver
                                            Detalles</button>
                                    </div>
                            </li>

                            <!-- Modal -->
                            <div id="modal-{{ $pqr->id }}" class="modal">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <span class="close" onclick="closeModal('{{ $pqr->id }}')">&times;</span>
                                        <div class="modal-header">
                                            <h5 class="modal-title" style="font-weight: 700;">PQR ID: {{ $pqr->id }}</h5>

                                        </div>
                                        <div class="modal-body">
                                            <p><strong>Estado:</strong> {{ $pqr->estado }}</p>
                                            <p><strong>Tipo:</strong> {{ $pqr->tipo }}</p>
                                            <p><strong>Descripción:</strong> {{ $pqr->descripcion }}</p>
                                            <br>
                                            <hr>
                                            <br>
                                            <p><strong>Fecha de creación:</strong> {{ $pqr->created_at }}</p>
                                            <p><strong>Usuario:</strong> {{ $pqr->nombre }}</p>
                                            <p><strong>Tipo de documento:</strong> {{ $pqr->tipoDocumento }}</p>
                                            <p><strong>Número de documento:</strong> {{ $pqr->numero_documento }}</p>
                                            <p><strong>Correo electrónico:</strong> {{ $pqr->email }}</p>
                                            <p><strong>Número de teléfono:</strong> {{ $pqr->numeroTel }}</p>
                                            <p><strong>Dirección:</strong> {{ $pqr->direccion }}</p>
                                            <p><strong>Medio de Respuesta:</strong> {{ $pqr->respuesta }}</p>
                                            <p><strong>Nombre Archivo Adjuntos:</strong> {{ $pqr->archivo }}</p>

                                            @if ($pqr->archivo)
                                                <a href="{{ route('download', $pqr->id) }}" class="btn btn-primary">
                                                    <i class="fas fa-download"></i> Descargar archivo
                                                </a>
                                            @else
                                                <strong>Sin archivo adjunto</strong>
                                            @endif
                                        </div>
                                        <div class="modal-footer">
                                            @if ($pqr->estado === 'Sin tramitar')
                                                <form action="{{ route('pqrs.marcarEnTramite', $pqr->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit" class="btn btn-primary">Marcar como En
                                                        trámite</button>
                                                </form>
                                            @else
                                                {{-- ($pqr->estado === 'En trámite') --}}
                                                <form action="{{ route('pqrs.marcarTramitada', $pqr->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit" class="btn btn-primary">Marcar como
                                                        Tramitada</button>
                                                </form>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </ol>
                </div>
                <!-- Aquí se encuentra el paginador -->
                <div id="pagination" class="px-6 py-4 flex flex-wrap justify-center items-center">
                    <div id="acomodar">
                        <nav aria-label="Page navigation example">
                            <div id="acomodar1">
                                <select id="itemsPerPageSelect" style="width: 60px;">
                                    <option value="3">3</option>
                                    <option value="5">5</option>
                                    <option value="10">10</option>
                                    <option value="20">20</option>
                                </select>
                            <ul class="pagination justify-content-center" id="pagination-container">
                                <li class="page-item ">
                                    <a class="page-link" id="prev-page" href="#">Previous</a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" id="next-page" href="#">Next</a>
                                </li>
                            </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>

<style>

    #exportarPDF {
        position: relative;
        display: flex;
        width: fit-content;
        left: 90%;
        justify-content: flex-end;
        background-color: lightslategrey;
    }

    #exportarPDF:hover {
        background-color: #042042;
        color: ghostwhite;
    }

    #acomodar1 {
        display: flex;
        flex-direction: row-reverse;
        align-items: center;
    }

    #iconoAgregar {
        position: relative;
        left: 23pc;
        top: 16px;
        /*         left: 18pc;
        top: 1pc; */
    }

    /* Estilos para los nav-tabs */
    .nav-tabs {
        border-bottom: 1px solid #dee2e6;
        margin-bottom: 1rem;
    }

    .nav-item a {
        color: black;
    }

    .nav-tabs .nav-item {
        margin-bottom: -0.5px;
        color: #000;
    }

    .nav-tabs .nav-link {
        border: 1px solid transparent;
        border-top-left-radius: .25rem;
        border-top-right-radius: .25rem;
    }

    .nav-tabs .nav-link.active {
        background-color: #042042;
        border-color: #042042 #042042 #fff;
        color: ghostwhite;
    }

    .nav-tabs .nav-link:hover {
        background-color: #ebebeb;
        color: #000;
    }

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
        display:flex;
        justify-content: space-between;
        align-items: center;
        /* Add spacing between cards */
    }

    .pqr-id {
        font-size: 12px;
        color: #aaa;
        margin-top: 5px;
    }

    /* PQR Actions */
    .pqr-actions {
        display: flex;
        justify-content: space-between;
        align-items: center;
        /* Align buttons vertically */
    }

    .pqr-actions button {
        padding: 5px 5px;
        border: 1px solid #ddd;
        border-radius: 25px;
        cursor: pointer;
        transition: all 0.2s ease-in-out;
        background-color: #ffcb00;
    }

    .pqr-actions button:hover {
        background-color: #eee;
        color: #333;
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

        #acomodar {
            position: relative;
            left: 14px;
        }

        #exportarPDF {
            left: 62%;
        }
    }

    .pqr-card {
        background-color: #f7f7f7;
        padding: 10px;
    }

    .contenido {
        filter: drop-shadow(2px 5px 5px rgba(0, 0, 0, 0.2));
        border-radius: 15px;
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
            bottom: 0;
        }

        #items-per-page {
            position: relative;
            left: 20px;
        }

        #iconoAgregar {
            position: relative;
            left: 3pc;
        }

        .nav-tabs {
            display: flex;
            width: 335px;
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
        background-color: rgba(0, 0, 0, 0.3);
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
        width: 100%;
        overflow: scroll;
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


    .page-link.active {
        background-color: #007bff;
        color: #fff;
    }
    .page-item.disabled .page-link {
        cursor: not-allowed;
        color: #6c757d;
    }

    /* Estilos para el contenedor del selector */
    #itemsPerPageSelect {
        display: inline-block;
        margin-left: 10px;
        padding: 5px 10px;
        font-size: 1rem;
        border: 1px solid #ced4da;
        border-radius: 5px;
        background-color: #ffffff;
        color: #495057;
        cursor: pointer;
        outline: none;
        transition: border-color 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
    }

    /* Estilos para el label */
    #itemsPerPageSelect + label {
        margin-right: 10px;
        font-size: 1rem;
        color: #495057;
    }

    /* Estilos al enfocar el selector */
    #itemsPerPageSelect:focus {
        border-color: #80bdff;
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
    }

    /* Estilos para la paginación */
    .pagination {
        margin: 0;
    }

    .pagination .page-item .page-link {
        color: #000000;
    }

    .pagination .page-item.disabled .page-link {
        color: #6c757d;
        pointer-events: none;
        background-color: transparent;
    }

    .pagination .page-item.active .page-link {
        z-index: 1;
        color: ghostwhite;
        background-color: #007bff;
        border-color: #007bff;
    }

    .pagination .page-link {
        position: relative;
        /* display: block; */
        padding: 0.5rem 0.75rem;
        margin-left: -1px;
        line-height: 1.25;
        border: 1px solid #dee2e6;
        text-decoration: none;
    }

    .pagination .page-link:hover {
        z-index: 2;
        color: #0056b3;
        text-decoration: none;
        background-color: #e9ecef;
        border-color: #dee2e6;
    }

    .active>.page-link, .page-link.active {
        z-index: 0;
        background-color: #042042;
        color: #fff !important;
    }
</style>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-U1W1WqQOG3zIFz9g2V2Cq6Mplplml5dlQfwQ91LW6Fypf82i2R4kOnzI42P3rjG" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.2/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-O4lQ2B74G25gR169MCw6pQ1q4kZ05Q4Qz9i7Q7Q7tWR7F+qP0pK6U1ZI4hQzV3" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        let itemsPerPage = 3; // Número de elementos por página inicial
        const contentContainer = document.getElementById('paginated-content');
        const paginationContainer = document.getElementById('pagination-container');
        const itemsPerPageSelect = document.getElementById('itemsPerPageSelect');
        const totalItems = {{ count($pqrs) }}; // Total de elementos
        let currentPage = 1; // Página actual
        let totalPages = Math.ceil(totalItems / itemsPerPage); // Total de páginas

        // Función para mostrar los elementos de la página actual
        function displayCurrentPage() {
            const startIndex = (currentPage - 1) * itemsPerPage;
            const endIndex = Math.min(startIndex + itemsPerPage, totalItems);

            // Oculta todos los elementos primero
            const items = contentContainer.querySelectorAll('.pqr-card');
            items.forEach(item => item.style.display = 'none');

            // Muestra solo los elementos de la página actual
            for (let i = startIndex; i < endIndex; i++) {
                items[i].style.display = 'flex';
            }
        }

        // Función para generar el paginador
        function generatePagination() {
            paginationContainer.innerHTML = ''; // Limpia el contenedor de paginación
            const prevPageButton = document.createElement('li');
            prevPageButton.classList.add('page-item');
            prevPageButton.innerHTML = `<a class="page-link" href="#">Previous</a>`;
            prevPageButton.addEventListener('click', () => goToPage(currentPage - 1));
            paginationContainer.appendChild(prevPageButton);

            for (let i = 1; i <= totalPages; i++) {
                const pageItem = document.createElement('li');
                pageItem.classList.add('page-item');
                pageItem.innerHTML = `<a class="page-link" href="#" data-page="${i}">${i}</a>`;
                pageItem.querySelector('.page-link').addEventListener('click', (e) => {
                    e.preventDefault();
                    goToPage(i);
                });
                paginationContainer.appendChild(pageItem);
            }

            const nextPageButton = document.createElement('li');
            nextPageButton.classList.add('page-item');
            nextPageButton.innerHTML = `<a class="page-link" href="#">Next</a>`;
            nextPageButton.addEventListener('click', () => goToPage(currentPage + 1));
            paginationContainer.appendChild(nextPageButton);

            // Actualiza los estados de los botones y la clase activa
            updatePaginationControls();
        }

        // Función para actualizar los estados de los botones y la clase activa
        function updatePaginationControls() {
            const pageLinks = paginationContainer.querySelectorAll('.page-link');
            pageLinks.forEach(link => link.classList.remove('active'));

            const prevPageButton = paginationContainer.querySelector('.page-item:first-child .page-link');
            const nextPageButton = paginationContainer.querySelector('.page-item:last-child .page-link');

            prevPageButton.parentElement.classList.toggle('disabled', currentPage === 1);
            nextPageButton.parentElement.classList.toggle('disabled', currentPage === totalPages);

            const currentPageLink = paginationContainer.querySelector(`.page-link[data-page="${currentPage}"]`);
            if (currentPageLink) {
                currentPageLink.classList.add('active');
            }
        }

        // Función para ir a una página específica
        function goToPage(page) {
            if (page >= 1 && page <= totalPages) {
                currentPage = page;
                displayCurrentPage();
                updatePaginationControls();
            }
        }

        // Event listener para el cambio de selección de elementos por página
        itemsPerPageSelect.addEventListener('change', (event) => {
            itemsPerPage = parseInt(event.target.value);
            totalPages = Math.ceil(totalItems / itemsPerPage);
            currentPage = 1; // Reiniciar a la primera página
            generatePagination();
            displayCurrentPage();
        });

        // Inicializar la paginación y mostrar la primera página
        generatePagination();
        displayCurrentPage();
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

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const tabs = document.querySelectorAll('.nav-link');
        const pqrsCards = document.querySelectorAll('.pqr-card');

        tabs.forEach(tab => {
            tab.addEventListener('click', function(event) {
                event.preventDefault();
                const tabId = this.getAttribute('data-tab');

                // Oculta todas las tarjetas
                pqrsCards.forEach(card => {
                    card.style.display = 'none';
                });

                // Muestra las tarjetas del estado correspondiente
                pqrsCards.forEach(card => {
                    const estadoCard = card.getAttribute('data-estado');

                    if (estadoCard === tabId) {
                        card.style.display = 'flex';
                    }
                });

                // Cambia la clase activa de la pestaña seleccionada
                tabs.forEach(tab => {
                    tab.classList.remove('active');
                });
                this.classList.add('active');
            });
        });
    });
</script>
