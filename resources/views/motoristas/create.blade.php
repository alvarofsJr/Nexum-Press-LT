@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">

        <h1 class="text-3xl font-semibold text-gray-800 mb-6 text-center">Adicionar Motorista</h1>


        <form id="motorista-form" action="{{ route('motoristas.store') }}" method="POST" class="bg-white p-6 shadow-lg rounded-lg max-w-md mx-auto">
            @csrf


            <div class="grid grid-cols-2 gap-4 mb-4">
                <div class="flex flex-col">
                    <label for="nome" class="block text-sm font-semibold text-gray-700">Nome</label>
                    <input type="text" id="nome" name="nome" class="w-full p-3 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('nome') border-red-500 @enderror" placeholder="Ex.: Alexandre Pires" value="{{ old('nome') }}">
                    @error('nome')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex flex-col">
                    <label for="cnh" class="block text-sm font-semibold text-gray-700">CNH</label>
                    <input type="text" id="cnh" name="cnh" class="w-full p-3 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('cnh') border-red-500 @enderror" placeholder="Ex.: 00011122334" value="{{ old('cnh') }}">
                    @error('cnh')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
            </div>


            <div class="grid grid-cols-2 gap-4 mb-6">
                <div class="flex flex-col">
                    <label for="data_nascimento" class="block text-sm font-semibold text-gray-700">Data de Nascimento</label>
                    <input type="date" id="data_nascimento" name="data_nascimento" class="w-full p-3 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('data_nascimento') border-red-500 @enderror" placeholder="Ex.: 24/11/1990" value="{{ old('data_nascimento') }}">
                    @error('data_nascimento')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex flex-col">
                    <label for="telefone" class="block text-sm font-semibold text-gray-700">Telefone</label>
                    <input type="text" id="telefone" name="telefone" class="w-full p-3 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('telefone') border-red-500 @enderror" placeholder="Ex.: (88)99804-5751" value="{{ old('telefone') }}">
                    @error('telefone')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
            </div>


            <div class="flex justify-between items-center">

                <a href="{{ route('motoristas.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white py-2 px-4 rounded-lg shadow-md w-1/2 mr-4 text-center">
                    Cancelar
                </a>


                <button type="button" id="save-button" class="bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded-lg shadow-md w-1/2 transition-all">
                    Salvar
                </button>
            </div>
        </form>
    </div>


    <div id="confirmation-modal" class="fixed inset-0 z-50 hidden bg-black bg-opacity-50 flex justify-center items-center">
        <div class="bg-white rounded-lg p-6 max-w-sm w-full">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Confirmar Cadastro</h2>
            <p class="text-gray-600 mb-6">Você tem certeza que deseja adicionar este motorista?</p>
            <div class="flex flex-col space-y-4">
                <button id="cancel-modal" class="bg-gray-300 hover:bg-gray-400 text-gray-800 py-2 px-4 rounded-lg" onclick="closeModal()">Cancelar</button>
                <button id="confirm-submit" class="bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded-lg" onclick="submitForm()">Confirmar</button>
            </div>
        </div>
    </div>

   
    <script>
        
        document.getElementById("save-button").addEventListener("click", function() {
            document.getElementById("confirmation-modal").classList.remove("hidden");
        });

        
        function closeModal() {
            document.getElementById("confirmation-modal").classList.add("hidden");
        }

       
        function submitForm() {
            document.getElementById("motorista-form").submit();  
        }
    </script>
@endsection
