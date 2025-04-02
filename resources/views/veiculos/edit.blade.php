@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">

        @if (session('success'))
            <div class="bg-green-500 text-white p-4 rounded-lg mb-4">
                {{ session('success') }}
            </div>
        @endif

        <h1 class="text-3xl font-semibold text-gray-800 mb-6 text-center">Editar Veículo</h1>

        <form action="{{ route('veiculos.update', $veiculo->veiculo_id) }}" method="POST" id="edit-form" class="bg-white p-6 shadow-lg rounded-lg max-w-md mx-auto">
            @csrf
            @method('PUT')


            <div class="mb-4">
                <label for="placa" class="block text-sm font-semibold text-gray-700">Placa</label>
                <input type="text" class="w-full p-3 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" id="placa" name="placa" value="{{ old('placa', $veiculo->placa) }}" required maxlength="7">
            </div>


            <div class="mb-4">
                <label for="modelo" class="block text-sm font-semibold text-gray-700">Modelo</label>
                <input type="text" class="w-full p-3 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" id="modelo" name="modelo" value="{{ old('modelo', $veiculo->modelo) }}">
            </div>


            <div class="mb-4">
                <label for="marca" class="block text-sm font-semibold text-gray-700">Marca</label>
                <input type="text" class="w-full p-3 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" id="marca" name="marca" value="{{ old('marca', $veiculo->marca) }}">
            </div>


            <div class="mb-4">
                <label for="ano_fabricacao" class="block text-sm font-semibold text-gray-700">Ano de Fabricação</label>
                <input type="number" class="w-full p-3 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" id="ano_fabricacao" name="ano_fabricacao" value="{{ old('ano_fabricacao', $veiculo->ano_fabricacao) }}" min="1900" max="{{ date('Y') }}">
            </div>

            <div class="flex justify-between items-center">

                <a href="{{ route('veiculos.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white py-2 px-4 rounded-lg shadow-md w-1/2 mr-4 text-center">
                    Cancelar
                </a>


                <button type="button" onclick="openModal()" class="bg-yellow-500 hover:bg-yellow-600 text-white py-2 px-4 rounded-lg shadow-md w-1/2 transition-all">
                    Atualizar
                </button>
            </div>
        </form>
    </div>


    <div id="confirmation-modal" class="fixed inset-0 z-50 hidden bg-black bg-opacity-50 flex justify-center items-center">
        <div class="bg-white rounded-lg p-6 max-w-sm w-full space-y-6">
            <div class="text-center">
                <svg class="w-12 h-12 mx-auto mb-4 text-yellow-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 1 0 0-16 8 8 0 0 0 0 16zm0 2a10 10 0 1 1 0-20 10 10 0 0 1 0 20zm-.75-12.75a1 1 0 0 1 1.5 0L10 8.25l.75-.75a1 1 0 0 1 1.5 1.5l-1.5 1.5 1.5 1.5a1 1 0 1 1-1.5 1.5L10 10.25l-.75.75a1 1 0 0 1-1.5-1.5l1.5-1.5-1.5-1.5a1 1 0 0 1 0-1.5z" clip-rule="evenodd"/>
                </svg>
                <h2 class="text-xl font-semibold text-gray-800">Tem certeza que deseja atualizar este veículo?</h2>
                <p class="text-gray-600">Essa ação não pode ser desfeita.</p>
            </div>

            <div class="flex justify-between space-x-4">

                <button id="cancel-update" class="bg-gray-300 hover:bg-gray-400 text-gray-800 py-2 px-4 rounded-lg w-1/2" onclick="closeModal()">Cancelar</button>


                <button id="confirm-update" class="bg-yellow-500 hover:bg-yellow-600 text-white py-2 px-4 rounded-lg w-1/2" onclick="confirmUpdate()">Confirmar</button>
            </div>
        </div>
    </div>


    <script>
        
        function openModal() {
            document.getElementById("confirmation-modal").classList.remove("hidden");
        }

        
        function closeModal() {
            document.getElementById("confirmation-modal").classList.add("hidden");
        }

        
        function confirmUpdate() {
            document.getElementById("edit-form").submit();
        }
    </script>
@endsection
