@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">

        <h1 class="text-3xl font-semibold text-gray-800 mb-6">Detalhes do Motorista</h1>


        <div class="bg-white p-6 shadow-lg rounded-lg max-w-3xl mx-auto">
            <div class="space-y-4">
                <p class="text-lg"><strong>Nome:</strong> {{ $motorista->nome }}</p>
                <p class="text-lg"><strong>CNH:</strong> {{ $motorista->cnh }}</p>
                <p class="text-lg"><strong>Data de Nascimento:</strong> {{ $motorista->data_nascimento ? \Carbon\Carbon::parse($motorista->data_nascimento)->format('d/m/Y') : 'Não informado' }}</p>
                <p class="text-lg"><strong>Telefone:</strong> {{ $motorista->telefone ?: 'Não informado' }}</p>
            </div>


            <div class="mt-6 flex justify-start space-x-4">
                <a href="{{ route('motoristas.index') }}" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-lg shadow-md transition-transform transform hover:scale-105 duration-300">
                    Voltar para a lista
                </a>

                <a href="{{ route('motoristas.edit', $motorista->motorista_id) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white py-2 px-4 rounded-lg shadow-md transition-transform transform hover:scale-105 duration-300">
                    Editar
                </a>


                <button id="open-modal" class="bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded-lg shadow-md transition-transform transform hover:scale-105 duration-300">
                    Excluir
                </button>
            </div>
        </div>
    </div>


    <div id="delete-modal" class="fixed inset-0 z-50 hidden bg-black bg-opacity-50 flex justify-center items-center">
        <div class="bg-white rounded-lg p-6 max-w-sm w-full space-y-6">
            <div class="text-center">
                <svg class="w-12 h-12 mx-auto mb-4 text-red-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 1 0 0-16 8 8 0 0 0 0 16zm0 2a10 10 0 1 1 0-20 10 10 0 0 1 0 20zm-.75-12.75a1 1 0 0 1 1.5 0L10 8.25l.75-.75a1 1 0 0 1 1.5 1.5l-1.5 1.5 1.5 1.5a1 1 0 1 1-1.5 1.5L10 10.25l-.75.75a1 1 0 0 1-1.5-1.5l1.5-1.5-1.5-1.5a1 1 0 0 1 0-1.5z" clip-rule="evenodd"/>
                </svg>
                <h2 class="text-xl font-semibold text-gray-800">Tem certeza que deseja excluir este motorista?</h2>
                <p class="text-gray-600">Essa ação não pode ser desfeita.</p>
            </div>

            <div class="flex justify-between space-x-4">

                <button id="cancel-delete" class="bg-gray-300 hover:bg-gray-400 text-gray-800 py-2 px-4 rounded-lg w-1/2" onclick="closeModal()">Cancelar</button>


                <form id="delete-form" action="{{ route('motoristas.destroy', $motorista->motorista_id) }}" method="POST" class="inline w-1/2">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded-lg w-full">
                        Excluir
                    </button>
                </form>
            </div>
        </div>
    </div>


    <script>
        
        document.getElementById("open-modal").addEventListener("click", function() {
            document.getElementById("delete-modal").classList.remove("hidden");
        });

        
        function closeModal() {
            document.getElementById("delete-modal").classList.add("hidden");
        }
    </script>
@endsection
