@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">

        <h1 class="text-3xl font-semibold text-gray-800 mb-6">Lista de Cargas</h1>


        <div class="mb-6">
            @if(session('success'))
                <div class="bg-green-100 text-green-800 p-4 rounded-lg shadow-md mb-4">
                    {{ session('success') }}
                </div>
            @elseif(session('error'))
                <div class="bg-red-100 text-red-800 p-4 rounded-lg shadow-md mb-4">
                    {{ session('error') }}
                </div>
            @endif
        </div>

        <div class="mb-4">
            <a href="{{ route('cargas.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-lg shadow-md">Adicionar Carga</a>
        </div>


        <table class="w-full table-auto border-collapse bg-white shadow-lg rounded-lg">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-3 text-left">Motorista</th>
                    <th class="p-3 text-left">Descrição</th>
                    <th class="p-3 text-left">Peso</th>
                    <th class="p-3 text-left">Data de Embarque</th>
                    <th class="p-3 text-left">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cargas as $carga)
                    <tr class="border-t hover:bg-gray-100">
                        <td class="p-3">{{ $carga->motorista->nome }}</td>
                        <td class="p-3">{{ $carga->descricao }}</td>
                        <td class="p-3">{{ $carga->peso }}</td>
                        <td class="p-3">{{ \Carbon\Carbon::parse($carga->data_embarque)->format('d/m/Y') }}</td>
                        <td class="p-3">
                            <a href="{{ route('cargas.show', $carga) }}" class="text-blue-500 hover:underline">Ver</a> |
                            <a href="{{ route('cargas.edit', $carga) }}" class="text-yellow-500 hover:underline">Editar</a> |
                            <button class="text-red-500 hover:underline" onclick="openModal({{ $carga->carga_id }})">Excluir</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


    <div id="deleteModal" class="fixed inset-0 flex items-center justify-center bg-gray-500 bg-opacity-50 hidden">
        <div class="bg-white p-6 rounded-lg shadow-lg w-96">
            <h3 class="text-xl font-semibold mb-4">Tem certeza que deseja excluir esta carga?</h3>
            <form id="deleteForm" method="POST" action="" class="flex justify-end space-x-4">
                @csrf
                @method('DELETE')
                <button type="button" class="bg-gray-500 hover:bg-gray-600 text-white py-2 px-4 rounded-lg" onclick="closeModal()">Cancelar</button>
                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded-lg">Excluir</button>
            </form>
        </div>
    </div>

    <script>

        function openModal(cargaId) {
            const modal = document.getElementById('deleteModal');
            const form = document.getElementById('deleteForm');
            form.action = '/cargas/' + cargaId;
            modal.classList.remove('hidden');
        }

        function closeModal() {
            const modal = document.getElementById('deleteModal');
            modal.classList.add('hidden');
        }
    </script>
@endsection
