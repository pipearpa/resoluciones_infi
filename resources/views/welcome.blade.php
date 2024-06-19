<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>RESOLUCIONES</title>

    <!-- Fonts -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
</head>

<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <div id="container">
        <div class="containerInicio">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                        required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Contraseña')" />

                    <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                        autocomplete="current-password" />

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember Me -->
                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox"
                            class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                        <span class="ms-2 text-sm text-gray-600">{{ __('Recuerdame') }}</span>
                    </label>
                </div>

                <div class="flex items-center justify-end mt-4">
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                            href="{{ route('password.request') }}">
                            {{ __('Olvidaste tu contraseña?') }}
                        </a>
                    @endif

                    <x-primary-button class="ms-3">
                        {{ __('Log in') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
        <footer class="footer-diseño py-16 text-center text-sm text-black dark:text-white/70">
            <img src="https://www.peoplecontact.com.co/images/peoplecontact-1.png" alt="Logo de peopleContact"
                class="logo-pequeno">
            <p>
                <strong>Desarrollado por <a id="enlaceSoftG" target="blank" href="https://www.peoplecontact.com.co/"
                        style="text-decoration: none; color: black;">PeopleContact</a></strong>
            </p>
        </footer>
    </div>
</x-guest-layout>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>

</body>

</html>



{{-- MARK:ESTILOS --}}

<style>
    form {
        padding: 10px;
        border-radius: 10px;
        background-color: #dbdcdd;
    }

    .containerInicio {
        padding: 10px;
        background-color: #a9aaaa;
        border-radius: 10px;
        box-shadow: 0 5px 8px rgba(0, 0, 1, 0.8);
    }

    #container {
        display: flex;
        flex-direction: column;
    align-items: center;
    }

    body {
        overflow: hidden;
    }
    /* Responsive styles for smaller screens */
    @media (max-width: 768px) {
        .footer-diseño {
            align-content: center;
        }

    }

    .logo-pequeno {
        position: relative;
        max-width: 500px;
        max-height: 100px;
        bottom: 20px;
        filter: drop-shadow(5px 5px 5px rgba(0, 0, 0, 0.5));
    }

    .logo {
        max-width: 100px;
        /* Ajusta el tamaño máximo del logo según sea necesario */
        height: auto;
        /* Mantiene la proporción de la imagen */
        filter: drop-shadow(2px 5px 5px rgba(0, 0, 0, 0.5));
    }


    /* /#D369C1 COLOR POR DEFECTO DE LA DECORACIÓN DE ABAJO/ */

    /* For mobile devices */
    @media (max-width: 767px) {
        .logo-pequeno {
            bottom: 10px;
        }

        * {
            overflow-x: hidden;
        }
    }

    .footer-diseño {
        display: flex;
        flex-wrap: wrap;
        justify-content: flex-end;
        align-content: flex-end;
        flex-direction: column;
        align-items: center;
    }
</style>


{{-- MARK:SCRIPTS --}}


{{-- <script>
    // JavaScript para activar el botón desplegable en pantallas pequeñas
    $(document).ready(function() {
        $('#dropdownButton').on('click', function() {
            $('.dropdown-menu').toggle();
        });
    });
</script>
 --}}
