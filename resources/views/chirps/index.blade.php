<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Chirps') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST">
                        @csrf
                        <textarea name="messege" class="w-full px-4 py-2 border border-gray-300 rounded-md resize-y text-gray-900 focus:border-blue-500 focus:ring focus:ring-blue-200" placeholder="¿Qué estás pensando?"">

                        </textarea>
                        
                        <x-primary-button>Chirps</x-primary-button>
                            
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
