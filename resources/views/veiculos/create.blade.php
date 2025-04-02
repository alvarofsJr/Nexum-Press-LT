@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">

        <h1 class="text-3xl font-semibold text-gray-800 mb-6 text-center">Adicionar Veículo</h1>


        <form action="{{ route('veiculos.store') }}" method="POST" class="bg-white p-6 shadow-lg rounded-lg max-w-md mx-auto" id="formVeiculo">
            @csrf


            <div class="grid grid-cols-2 gap-4 mb-4">
                <div class="flex flex-col">
                    <label for="modelo" class="block text-sm font-semibold text-gray-700">Modelo</label>
                    <input type="text" class="w-full p-2 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" id="modelo" name="modelo" value="{{ old('modelo') }}" placeholder="Ex.: Uno">
                    @error('modelo')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex flex-col">
                    <label for="marca" class="block text-sm font-semibold text-gray-700">Marca</label>
                    <input type="text" class="w-full p-2 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" id="marca" name="marca" value="{{ old('marca') }}" placeholder="Ex.: Fiat">
                    @error('marca')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
            </div>


            <div class="grid grid-cols-2 gap-4 mb-6">
                <div class="flex flex-col">
                    <label for="ano_fabricacao" class="block text-sm font-semibold text-gray-700">Ano de Fabricação</label>
                    <input type="number" class="w-full p-2 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" id="ano_fabricacao" name="ano_fabricacao" min="1900" max="{{ date('Y') }}" value="{{ old('ano_fabricacao') }}" placeholder="Ex.: 2012">
                    @error('ano_fabricacao')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex flex-col">
                    <label for="placa" class="block text-sm font-semibold text-gray-700">Placa</label>
                    <input type="text" class="w-full p-2 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" id="placa" name="placa" value="{{ old('placa') }}" placeholder="Ex.: ABC1234">
                    @error('placa')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="flex justify-between items-center">
                <a href="{{ route('veiculos.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white py-2 px-4 rounded-lg shadow-md w-1/2 mr-4 text-center">
                    Cancelar
                </a>

                <button type="button" id="open-modal" class="bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded-lg shadow-md w-1/2 transition-all">
                    Salvar
                </button>
            </div>
        </form>
    </div>


    <div id="confirmation-modal" class="fixed inset-0 bg-gray-500 bg-opacity-75 flex justify-center items-center z-50 hidden">
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

            document.getElementById("formVeiculo").submit();
            document.getElementById("confirmation-modal").classList.add("hidden"); 
        });
    </script>
@endsection
