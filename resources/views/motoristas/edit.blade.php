@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-semibold text-gray-800 mb-6 text-center">Editar Motorista</h1>


        <form id="motorista-form" action="{{ route('motoristas.update', $motorista->motorista_id) }}" method="POST" class="bg-white p-6 shadow-lg rounded-lg max-w-md mx-auto">
            @csrf
            @method('PUT')


            <div class="mb-4">
                <label for="nome" class="block text-sm font-semibold text-gray-700">Nome</label>
                <input type="text" id="nome" name="nome" class="w-full p-3 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ old('nome', $motorista->nome) }}" required maxlength="100">
            </div>


            <div class="mb-4">
                <label for="cnh" class="block text-sm font-semibold text-gray-700">CNH</label>
                <input type="text" id="cnh" name="cnh" class="w-full p-3 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ old('cnh', $motorista->cnh) }}" required maxlength="20">
            </div>


            <div class="mb-4">
                <label for="data_nascimento" class="block text-sm font-semibold text-gray-700">Data de Nascimento</label>
                <input type="date" id="data_nascimento" name="data_nascimento" class="w-full p-3 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ old('data_nascimento', $motorista->data_nascimento) }}">
            </div>


            <div class="mb-4">
                <label for="telefone" class="block text-sm font-semibold text-gray-700">Telefone</label>
                <input type="text" id="telefone" name="telefone" class="w-full p-3 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ old('telefone', $motorista->telefone) }}" maxlength="15">
            </div>


            <div class="flex justify-between items-center">

                <a href="{{ route('motoristas.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white py-2 px-4 rounded-lg shadow-md w-1/2 mr-4 text-center">
                    Cancelar
                </a>


                <button type="button" id="update-button" class="bg-yellow-500 hover:bg-yellow-600 text-white py-2 px-4 rounded-lg shadow-md w-1/2 transition-all">
                    Atualizar
                </button>
            </div>
        </form>
    </div>


    <div id="confirmation-modal" class="fixed inset-0 z-50 hidden bg-black bg-opacity-50 flex justify-center items-center">
        <div class="bg-white rounded-lg p-6 max-w-sm w-full">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Confirmar Atualização</h2>
            <p class="text-gray-600 mb-6">Você tem certeza que deseja atualizar os dados deste motorista?</p>
            <div class="flex flex-col space-y-4"">
                <button id="cancel-modal" class="bg-gray-300 hover:bg-gray-400 text-gray-800 py-2 px-4 rounded-lg" onclick="closeModal()">Cancelar</button>
                <button id="confirm-submit" class="bg-yellow-500 hover:bg-yellow-600 text-white py-2 px-4 rounded-lg" onclick="submitForm()">Confirmar</button>
            </div>
        </div>
    </div>


    <script>

        document.getElementById("update-button").addEventListener("click", function() {
            document.getElementById("confirmation-modal").classList.remove("hidden");
        });


        function closeModal() {
            document.getElementById("confirmation-modal").classList.add("hidden");
        }


        function submitForm() {
        }
    </script>
@endsection
