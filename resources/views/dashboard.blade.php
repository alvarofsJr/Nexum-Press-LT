<x-app-layout>
    @section('content')
        <h3 class="text-black text-3xl ml-4 font-medium">Painel de Controle</h3>
        <div class="px-4 pt-6">
            <div class="grid gap-4 xl:grid-cols-2 2xl:grid-cols-3">
                
                <div class="p-4 bg-yellow-500 border border-yellow-400 rounded-lg shadow-sm sm:p-6">
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex-shrink-0">
                            <span class="text-xl font-bold leading-none text-white sm:text-2xl">Cargas</span>
                            <h3 class="text-base font-light text-white">Total de Cargas Registradas</h3>
                        </div>
                        <a href="{{ route('cargas.index') }}" class="inline-flex items-center p-2 text-xs font-medium uppercase rounded-lg text-white sm:text-sm hover:bg-yellow-600">
                            Gerenciar Cargas
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                    <span class="text-2xl font-bold leading-none text-white sm:text-3xl">{{ $cargasCount }}</span>
                </div>

                
                <div class="p-4 bg-yellow-500 border border-yellow-400 rounded-lg shadow-sm sm:p-6">
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex-shrink-0">
                            <span class="text-xl font-bold leading-none text-white sm:text-2xl">Motoristas</span>
                            <h3 class="text-base font-light text-white">Total de Motoristas Registrados</h3>
                        </div>
                        <a href="{{ route('motoristas.index') }}" class="inline-flex items-center p-2 text-xs font-medium uppercase rounded-lg text-white sm:text-sm hover:bg-yellow-600">
                            Gerenciar Motoristas
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                    <span class="text-2xl font-bold leading-none text-white sm:text-3xl">{{ $motoristasCount }}</span>
                </div>

                
                <div class="p-4 bg-yellow-500 border border-yellow-400 rounded-lg shadow-sm sm:p-6">
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex-shrink-0">
                            <span class="text-xl font-bold leading-none text-white sm:text-2xl">Veículos</span>
                            <h3 class="text-base font-light text-white">Total de Veículos Registrados</h3>
                        </div>
                        <a href="{{ route('veiculos.index') }}" class="inline-flex items-center p-2 text-xs font-medium uppercase rounded-lg text-white sm:text-sm hover:bg-yellow-600">
                            Gerenciar Veículos
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                    <span class="text-2xl font-bold leading-none text-white sm:text-3xl">{{ $veiculosCount }}</span>
                </div>
            </div>
        </div>
    @endsection
</x-app-layout>
