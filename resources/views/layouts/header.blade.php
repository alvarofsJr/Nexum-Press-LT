<header class="flex items-center justify-between px-6 py-4 bg-gray-200 border-b-2 border-gray-300">
    <div class="flex items-center">
        <!-- Botão para abrir a Sidebar (em dispositivos móveis) -->
        <button @click="sidebarOpen = true" class="text-gray-500 focus:outline-none lg:hidden hover:text-gray-700">
            <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M4 6H20M4 12H20M4 18H11" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </button>
    </div>

    <div class="flex items-center">

        <div x-data="{ dropdownOpen: false, modalOpen: false }" class="relative">

            <button @click="dropdownOpen = !dropdownOpen" class="flex items-center px-4 py-2 bg-gray-200 text-white rounded-md hover:bg-gray-400">
                <span class="mr-2 text-black">{{ auth()->user()->name }}</span>
                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </button>


            <div x-show="dropdownOpen" x-cloak @click.outside="dropdownOpen = false" x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100"
                class="absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded-md shadow-lg z-10">
                <div class="px-4 py-2 text-gray-800 font-semibold">
                    {{ auth()->user()->name }}
                </div>




                <button @click="modalOpen = true" class="block px-4 py-2 text-sm text-black hover:bg-gray-200">Sair</button>
            </div>

            <div x-show="modalOpen" x-cloak class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
                <div class="bg-white p-6 rounded-md shadow-lg w-96">
                    <h3 class="text-xl font-semibold">Você tem certeza que deseja sair?</h3>
                    <div class="mt-4 flex justify-between">
                        <button @click="modalOpen = false" class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-400">
                            Cancelar
                        </button>
                        <button @click="modalOpen = false; document.getElementById('logout-form').submit();" class="px-4 py-2 bg-yellow-500 text-white rounded-md hover:bg-yellow-400">
                            Confirmar
                        </button>
                    </div>
                </div>
            </div>


            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                @csrf
            </form>
        </div>


        <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>



        <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>

    </div>

</header>


