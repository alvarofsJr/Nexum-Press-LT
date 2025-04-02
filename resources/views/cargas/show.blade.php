@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-semibold text-gray-800 mb-6">Detalhes da Carga</h1>

        <div class="bg-white p-6 shadow-lg rounded-lg max-w-3xl mx-auto">
            <div class="space-y-4">
                <p class="text-lg"><strong>Descrição:</strong> {{ $carga->descricao }}</p>
                <p class="text-lg"><strong>Peso:</strong> {{ $carga->peso }} kg</p>
                <p class="text-lg"><strong>Data de Embarque:</strong> {{ \Carbon\Carbon::parse($carga->data_embarque)->format('d/m/Y') }}</p>
                <p class="text-lg"><strong>Motorista:</strong> {{ $carga->motorista->nome }}</p>
                <p class="text-lg"><strong>Veículo:</strong> {{ $carga->veiculo->modelo }}</p>
            </div>
            <div class="mt-6 flex justify-start space-x-4">
                <a href="{{ route('cargas.index') }}" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-lg shadow-md transition-transform transform hover:scale-105 duration-300">
                    Voltar para a lista
                </a>
                <a href="{{ route('cargas.edit', $carga) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white py-2 px-4 rounded-lg shadow-md transition-transform transform hover:scale-105 duration-300">
                    Editar
                </a>
                <form action="{{ route('cargas.destroy', $carga) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')

                   
                    <button type="submit"
                            class="bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded-lg shadow-md transition-transform transform hover:scale-105 duration-300">
                        Excluir
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
