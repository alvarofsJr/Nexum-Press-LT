@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-semibold text-gray-800 mb-6">Lista de Motoristas</h1>


        @if(session('success'))
            <div class="bg-green-500 text-white p-4 rounded-lg mb-4">
                {{ session('success') }}
            </div>
        @endif


        <div class="mb-4">
            <a href="{{ route('motoristas.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-lg shadow-md">Adicionar Motorista</a>
        </div>


        <table class="w-full table-auto border-collapse bg-white shadow-lg rounded-lg">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-3 text-left">Nome</th>
                    <th class="p-3 text-left">CNH</th>
                    <th class="p-3 text-left">Telefone</th>
                    <th class="p-3 text-left">Data de Nascimento</th>
                    <th class="p-3 text-left">Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse($motoristas as $motorista)
                    <tr class="border-t">
                        <td class="p-3">{{ $motorista->nome }}</td>
                        <td class="p-3">{{ $motorista->cnh }}</td>
                        <td class="p-3">{{ $motorista->telefone ?? 'N/A' }}</td>
                        <td class="p-3">{{ \Carbon\Carbon::parse($motorista->data_nascimento)->format('d/m/Y') ?? 'N/A' }}</td>
                        <td class="p-3">
                            <a href="{{ route('motoristas.show', $motorista->motorista_id) }}" class="text-blue-500 hover:underline">Ver</a> |
                            <a href="{{ route('motoristas.edit', $motorista->motorista_id) }}" class="text-yellow-500 hover:underline">Editar</a> |
                            <!-- Botão para abrir o Modal de Exclusão -->
                            <button class="text-red-500 hover:underline" onclick="openModal({{ $motorista->motorista_id }})">
                                Excluir
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="p-3 text-center text-gray-500">Nenhum motorista cadastrado.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>


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


                    <form id="delete-form" action="" method="POST" class="inline w-1/2">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded-lg w-full">
                            Excluir
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script>

        function openModal(motoristaId) {
            document.getElementById('delete-form').action = '/motoristas/' + motoristaId;
            document.getElementById("delete-modal").classList.remove("hidden");
        }
        function closeModal() {
            document.getElementById("delete-modal").classList.add("hidden");
        }
    </script>
@endsection
