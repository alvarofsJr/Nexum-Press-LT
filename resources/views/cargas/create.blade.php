@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-semibold text-gray-800 mb-6 text-center">Adicionar Carga</h1>


        <form action="{{ route('cargas.store') }}" method="POST" id="form-carga" class="bg-white p-6 shadow-lg rounded-lg max-w-md mx-auto">
            @csrf


            <div class="grid grid-cols-2 gap-4 mb-4">
                <div class="flex flex-col">
                    <label for="veiculo_id" class="block text-sm font-semibold text-gray-700">Veículo</label>
                    <select name="veiculo_id" id="veiculo_id" class="w-full p-3 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('veiculo_id') border-red-500 @enderror">
                        <option value="">Selecione um Veículo</option>
                        @foreach($veiculos as $veiculo)
                            <option value="{{ $veiculo->veiculo_id }}" {{ old('veiculo_id') == $veiculo->veiculo_id ? 'selected' : '' }}>{{ $veiculo->modelo }}</option>
                        @endforeach
                    </select>
                    @error('veiculo_id')
                        <span class="text-red-500 text-sm">{{ __('messages.validation.veiculo_required') }}</span>
                    @enderror
                </div>

                <div class="flex flex-col">
                    <label for="motorista_id" class="block text-sm font-semibold text-gray-700">Motorista</label>
                    <select name="motorista_id" id="motorista_id" class="w-full p-3 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('motorista_id') border-red-500 @enderror">
                        <option value="">Selecione um Motorista</option>
                        @foreach($motoristas as $motorista)
                            <option value="{{ $motorista->motorista_id }}" {{ old('motorista_id') == $motorista->motorista_id ? 'selected' : '' }}>{{ $motorista->nome }}</option>
                        @endforeach
                    </select>
                    @error('motorista_id')
                        <span class="text-red-500 text-sm">{{ __('messages.validation.motorista_required') }}</span>
                    @enderror
                </div>
            </div>


            <div class="grid grid-cols-2 gap-4 mb-6">
                <div class="flex flex-col">
                    <label for="data_embarque" class="block text-sm font-semibold text-gray-700">Data de Embarque</label>
                    <input type="date" class="w-full p-3 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('data_embarque') border-red-500 @enderror" id="data_embarque" name="data_embarque" value="{{ old('data_embarque') }}">
                    @error('data_embarque')
                        <span class="text-red-500 text-sm">{{ __('messages.validation.data_embarque_required') }}</span>
                    @enderror
                </div>

                <div class="flex flex-col">
                    <label for="peso" class="block text-sm font-semibold text-gray-700">Peso</label>
                    <input type="number" step="0.01" class="w-full p-3 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('peso') border-red-500 @enderror" id="peso" name="peso" value="{{ old('peso') }}">
                    @error('peso')
                        <span class="text-red-500 text-sm">{{ __('messages.validation.peso_required') }}</span>
                    @enderror
                </div>
            </div>


            <div class="mb-6">
                <label for="descricao" class="block text-sm font-semibold text-gray-700">Descrição</label>
                <textarea id="descricao" name="descricao" rows="4" class="w-full p-3 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Descrição detalhada da carga">{{ old('descricao') }}</textarea>
                @error('descricao')
                    <span class="text-red-500 text-sm">{{ __('messages.validation.descricao_required') }}</span>
                @enderror
            </div>


            <div class="flex justify-between items-center">
                <a href="{{ route('cargas.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white py-2 px-4 rounded-lg shadow-md w-1/2 mr-4 text-center">
                    Cancelar
                </a>

                <button type="button" id="open-modal" class="bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded-lg shadow-md w-1/2 transition-all">
                    Salvar
                </button>
            </div>
        </form>
    </div>


    <div id="confirmation-modal" class="fixed inset-0 z-50 hidden bg-black bg-opacity-50 flex justify-center items-center">
        <div class="bg-white rounded-lg p-6 max-w-sm w-full">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Confirmar Ação</h2>
            <p class="text-gray-600 mb-6">Você tem certeza que deseja salvar as alterações?</p>
            <div class="flex flex-col space-y-4"> 
                <button id="cancel-modal" class="bg-gray-300 hover:bg-gray-400 text-gray-800 py-2 px-4 rounded-lg">Cancelar</button>
                <button id="confirm-submit" class="bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded-lg">Confirmar</button>
            </div>
        </div>
    </div>


    <script>
        document.getElementById("open-modal").addEventListener("click", function() {
            document.getElementById("confirmation-modal").classList.remove("hidden");
        });

        document.getElementById("cancel-modal").addEventListener("click", function() {
            document.getElementById("confirmation-modal").classList.add("hidden");
        });

        document.getElementById("confirm-submit").addEventListener("click", function() {
            document.getElementById("form-carga").submit();
        });
    </script>
@endsection
