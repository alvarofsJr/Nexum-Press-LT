<x-app-layout>
    @section('content')
        <div class="container mx-auto px-6 py-8">
            <h3 class="text-black text-3xl font-medium">Painel de Controle</h3>
            <div class="grid gap-4 xl:grid-cols-2 2xl:grid-cols-3">

                <div class="p-4 bg-white border border-yellow-500 rounded-lg shadow-sm sm:p-6 dark:bg-gray-800 dark:border-gray-700">
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex-shrink-0">
                            <span class="text-xl font-bold leading-none text-black sm:text-2xl dark:text-white">Cargas</span>
                            <h3 class="text-base font-light text-gray-500 dark:text-gray-400">Total de Cargas Registradas</h3>
                        </div>
                        <a href="{{ route('cargas.index') }}" class="inline-flex items-center p-2 text-xs font-medium uppercase rounded-lg text-yellow-600 sm:text-sm hover:bg-yellow-100 dark:hover:bg-yellow-600 dark:text-yellow-300">
                            Gerenciar Cargas
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                    <span class="text-2xl font-bold leading-none text-black sm:text-3xl dark:text-white">{{ $cargasCount }}</span>
                </div>


                <div class="p-4 bg-white border border-yellow-500 rounded-lg shadow-sm sm:p-6 dark:bg-gray-800 dark:border-gray-700">
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex-shrink-0">
                            <span class="text-xl font-bold leading-none text-black sm:text-2xl dark:text-white">Motoristas</span>
                            <h3 class="text-base font-light text-gray-500 dark:text-gray-400">Total de Motoristas Registrados</h3>
                        </div>
                        <a href="{{ route('motoristas.index') }}" class="inline-flex items-center p-2 text-xs font-medium uppercase rounded-lg text-yellow-600 sm:text-sm hover:bg-yellow-100 dark:hover:bg-yellow-600 dark:text-yellow-300">
                            Gerenciar Motoristas
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                    <span class="text-2xl font-bold leading-none text-black sm:text-3xl dark:text-white">{{ $motoristasCount }}</span>
                </div>


                <div class="p-4 bg-white border border-yellow-500 rounded-lg shadow-sm sm:p-6 dark:bg-gray-800 dark:border-gray-700">
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex-shrink-0">
                            <span class="text-xl font-bold leading-none text-black sm:text-2xl dark:text-white">Veículos</span>
                            <h3 class="text-base font-light text-gray-500 dark:text-gray-400">Total de Veículos Registrados</h3>
                        </div>
                        <a href="{{ route('veiculos.index') }}" class="inline-flex items-center p-2 text-xs font-medium uppercase rounded-lg text-yellow-600 sm:text-sm hover:bg-yellow-100 dark:hover:bg-yellow-600 dark:text-yellow-300">
                            Gerenciar Veículos
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                    <span class="text-2xl font-bold leading-none text-black sm:text-3xl dark:text-white">{{ $veiculosCount }}</span>
                </div>
            </div>
        </div>
    @endsection
</x-app-layout>
