<div x-cloak :class="sidebarOpen ? 'block' : 'hidden'" @click="sidebarOpen = false" class="fixed inset-0 z-20 transition-opacity bg-black opacity-50 lg:hidden"></div>

<div x-cloak :class="sidebarOpen ? 'translate-x-0 ease-out' : '-translate-x-full ease-in'" class="fixed inset-y-0 left-0 z-30 w-64 overflow-y-auto transition duration-300 transform bg-yellow-400 lg:translate-x-0 lg:static lg:inset-0">

    <div class="flex items-center justify-center mt-8">
            <div class="fixed top-0 left-0 right-0 mb-2 z-50 flex items-center justify-center py-4">
                <img src="{{ mix('public/build/assets/imagens/download.png') }}" class="w-12 h-12" />
            </div>
    </div>

    <nav class="mt-10">
        <a class="flex items-center px-6 py-2 mt-4 {{ Route::currentRouteNamed('dashboard') ? 'text-black bg-yellow-200' : 'text-black' }} hover:bg-yellow-100 hover:text-black" href="{{ route('dashboard') }}">
            <span class="text-2xl {{ Route::currentRouteNamed('dashboard') ? 'text-yellow-600' : 'text-black' }}">🖥️</span>
            <span class="mx-3 font-poppins font-bold">Painel de Controle</span>
        </a>

        <a class="flex items-center px-6 py-2 mt-4 {{ Route::currentRouteNamed('cargas.index') ? 'text-black bg-yellow-200' : 'text-black' }} hover:bg-yellow-100 hover:text-black" href="{{ route('cargas.index') }}">
            <span class="text-2xl {{ Route::currentRouteNamed('cargas.index') ? 'text-yellow-600' : 'text-black' }}">🚚</span>
            <span class="mx-3 font-poppins font-bold">Cargas</span>
        </a>

        <a class="flex items-center px-6 py-2 mt-4 {{ Route::currentRouteNamed('motoristas.index') ? 'text-black bg-yellow-200' : 'text-black' }} hover:bg-yellow-100 hover:text-black" href="{{ route('motoristas.index') }}">
            <span class="text-2xl {{ Route::currentRouteNamed('motoristas.index') ? 'text-yellow-600' : 'text-black' }}">👨‍✈️</span>
            <span class="mx-3 font-poppins font-bold">Motoristas</span>
        </a>

        <a class="flex items-center px-6 py-2 mt-4 {{ Route::currentRouteNamed('veiculos.index') ? 'text-black bg-yellow-200' : 'text-black' }} hover:bg-yellow-100 hover:text-black" href="{{ route('veiculos.index') }}">
            <span class="text-2xl {{ Route::currentRouteNamed('veiculos.index') ? 'text-yellow-600' : 'text-black' }}">🚗</span>
            <span class="mx-3 font-poppins font-bold">Veículos</span>
        </a>
    </nav>

</div>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">


<script>

    const dropdownButton = document.getElementById('dropdown-button');
    const dropdownMenu = document.getElementById('dropdown-menu');
    let isOpen = false;


    function toggleDropdown() {
        isOpen = !isOpen;
        dropdownMenu.classList.toggle('hidden', !isOpen);
    }

    dropdownButton.addEventListener('click', () => {
        toggleDropdown();
    });
</script>
