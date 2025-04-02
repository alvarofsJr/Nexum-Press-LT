@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-semibold text-gray-800 mb-6 text-center">Editar Carga</h1>

        <form id="carga-form" action="{{ route('cargas.update', $carga->carga_id) }}" method="POST" class="bg-white p-6 shadow-lg rounded-lg max-w-md mx-auto">
            @csrf
            @method('PUT')


            <div class="mb-4">
                <label for="peso" class="block text-sm font-semibold text-gray-700">Peso</label>
                <input type="number" step="0.01" class="w-full p-3 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" id="peso" name="peso" value="{{ old('peso', $carga->peso) }}">
                <span id="peso-error" class="text-red-500 text-sm hidden">O peso deve ser um valor positivo.</span>
            </div>


            <div class="mb-4">
                <label for="data_embarque" class="block text-sm font-semibold text-gray-700">Data de Embarque</label>
                <input type="date" class="w-full p-3 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" id="data_embarque" name="data_embarque" value="{{ old('data_embarque', $carga->data_embarque) }}">
                <span id="data_embarque-error" class="text-red-500 text-sm hidden">Por favor, selecione uma data de embarque válida.</span>
            </div>


            <div class="mb-4">
                <label for="motorista_id" class="block text-sm font-semibold text-gray-700">Motorista</label>
                <select name="motorista_id" id="motorista_id" class="w-full p-3 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">Selecione um Motorista</option>
                    @foreach($motoristas as $motorista)
                        <option value="{{ $motorista->motorista_id }}" {{ $motorista->motorista_id == old('motorista_id', $carga->motorista_id) ? 'selected' : '' }}>{{ $motorista->nome }}</option>
                    @endforeach
                </select>
                <span id="motorista_id-error" class="text-red-500 text-sm hidden">Por favor, selecione um motorista.</span>
            </div>


            <div class="mb-4">
                <label for="veiculo_id" class="block text-sm font-semibold text-gray-700">Veículo</label>
                <select name="veiculo_id" id="veiculo_id" class="w-full p-3 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">Selecione um Veículo</option>
                    @foreach($veiculos as $veiculo)
                        <option value="{{ $veiculo->veiculo_id }}" {{ $veiculo->veiculo_id == old('veiculo_id', $carga->veiculo_id) ? 'selected' : '' }}>{{ $veiculo->modelo }}</option>
                    @endforeach
                </select>
                <span id="veiculo_id-error" class="text-red-500 text-sm hidden">Por favor, selecione um veículo.</span>
            </div>

            <!-- Descrição -->
            <div class="mb-4">
                <label for="descricao" class="block text-sm font-semibold text-gray-700">Descrição</label>
                <textarea id="descricao" name="descricao" class="w-full p-3 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" maxlength="255">{{ old('descricao', $carga->descricao) }}</textarea>
                <span id="descricao-error" class="text-red-500 text-sm hidden">A descrição não pode ser maior que 255 caracteres.</span>
            </div>

            
            <div class="flex justify-between items-center">
               
                <a href="{{ route('cargas.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white py-2 px-4 rounded-lg shadow-md w-1/2 mr-4 text-center">
                    Cancelar
                </a>

                <button type="button" class="bg-yellow-500 hover:bg-yellow-600 text-white py-2 px-4 rounded-lg shadow-md w-1/2 transition-all" onclick="validateForm()">
                    Atualizar
                </button>
            </div>
        </form>
    </div>

    <div id="confirmation-modal" class="fixed inset-0 z-50 hidden bg-black bg-opacity-50 flex justify-center items-center">
        <div class="bg-white rounded-lg p-6 max-w-sm w-full space-y-6">
            <div class="text-center">
                <svg class="w-12 h-12 mx-auto mb-4 text-red-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 1 0 0-16 8 8 0 0 0 0 16zm0 2a10 10 0 1 1 0-20 10 10 0 0 1 0 20zm-.75-12.75a1 1 0 0 1 1.5 0L10 8.25l.75-.75a1 1 0 0 1 1.5 1.5l-1.5 1.5 1.5 1.5a1 1 0 1 1-1.5 1.5L10 10.25l-.75.75a1 1 0 0 1-1.5-1.5l1.5-1.5-1.5-1.5a1 1 0 0 1 0-1.5z" clip-rule="evenodd"/>
                </svg>
                <h2 class="text-xl font-semibold text-gray-800">Tem certeza que deseja atualizar esta carga?</h2>
                <p class="text-gray-600">Esta ação irá salvar as alterações feitas.</p>
            </div>

            <div class="flex justify-between space-x-4">
                <button id="cancel-button" class="bg-gray-300 hover:bg-gray-400 text-gray-800 py-2 px-4 rounded-lg w-1/2" onclick="closeModal()">Cancelar</button>

                <button id="confirm-button" class="bg-yellow-500 hover:bg-yellow-600 text-white py-2 px-4 rounded-lg w-1/2">
                    Confirmar
                </button>
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

        function validateForm() {
            let isValid = true;

            let peso = document.getElementById('peso').value;
            if (peso <= 0 || isNaN(peso)) {
                document.getElementById('peso-error').classList.remove('hidden');
                isValid = false;
            } else {
                document.getElementById('peso-error').classList.add('hidden');
            }

            let dataEmbarque = document.getElementById('data_embarque').value;
            if (!dataEmbarque) {
                document.getElementById('data_embarque-error').classList.remove('hidden');
                isValid = false;
            } else {
                document.getElementById('data_embarque-error').classList.add('hidden');
            }

            let motoristaId = document.getElementById('motorista_id').value;
            if (!motoristaId) {
                document.getElementById('motorista_id-error').classList.remove('hidden');
                isValid = false;
            } else {
                document.getElementById('motorista_id-error').classList.add('hidden');
            }

            let veiculoId = document.getElementById('veiculo_id').value;
            if (!veiculoId) {
                document.getElementById('veiculo_id-error').classList.remove('hidden');
                isValid = false;
            } else {
                document.getElementById('veiculo_id-error').classList.add('hidden');
            }

            let descricao = document.getElementById('descricao').value;
            if (descricao.length > 255) {
                document.getElementById('descricao-error').classList.remove('hidden');
                isValid = false;
            } else {
                document.getElementById('descricao-error').classList.add('hidden');
            }

            if (isValid) {
                openModal();
            }
        }

        document.getElementById('confirm-button').addEventListener('click', function() {
            document.getElementById('carga-form').submit();
        });
    </script>
@endsection
