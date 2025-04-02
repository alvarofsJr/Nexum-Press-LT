@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
        
        <h1 class="text-3xl font-semibold text-gray-800 mb-6">Detalhes do Veículo</h1>


        <div class="bg-white p-6 shadow-lg rounded-lg max-w-3xl mx-auto">

            <div class="space-y-4">
                <h3 class="text-2xl font-semibold text-gray-800">{{ $veiculo->modelo }} - {{ $veiculo->marca }}</h3>
                <p class="text-lg"><strong>Placa:</strong> {{ $veiculo->placa }}</p>
                <p class="text-lg"><strong>Ano de Fabricação:</strong> {{ $veiculo->ano_fabricacao }}</p>
            </div>

            <div class="mt-6 flex justify-start space-x-4">

                <a href="{{ route('veiculos.index') }}" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-lg shadow-md transition-transform transform hover:scale-105 duration-300">
                    Voltar para a lista
                </a>


                <a href="{{ route('veiculos.edit', $veiculo) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white py-2 px-4 rounded-lg shadow-md transition-transform transform hover:scale-105 duration-300">
                    Editar
                </a>

                <form action="{{ route('veiculos.destroy', $veiculo) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir este veículo?')" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded-lg shadow-md transition-transform transform hover:scale-105 duration-300">
                        Excluir
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
