<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased bg-white">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">

            <div>
                <a href="/">
                    <x-logo class="w-6 h-6 fill-current text-gray-500" />
                </a>

            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">

                <x-auth-session-status class="mb-4" :status="session('status')" />


                <form method="POST" action="{{ route('login') }}">
                    @csrf


                    <div class="mb-4">
                        <label for="credencial" class="block text-sm font-medium text-gray-700">Credencial</label>
                        <input
                            id="credencial"
                            type="text"
                            name="credencial"
                            class="mt-1 block w-full px-4 py-2 border rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            placeholder="Digite sua credencial"
                            value="{{ old('credencial') }}"

                        >
                    </div>
                    <div class="mb-4">
                        <label for="senha" class="block text-sm font-medium text-gray-700">Senha</label>
                        <input
                            id="senha"
                            type="password"
                            name="password"
                            class="mt-1 block w-full px-4 py-2 border rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            placeholder="Digite sua senha"
                        >
                    </div>


                    <div class="mb-4 flex items-center">
                        <input
                            id="showPassword"
                            type="checkbox"
                            class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded"
                        />
                        <label for="showPassword" class="ml-2 text-sm text-gray-600">Mostrar senha</label>
                    </div>


                    <div class="mb-4">
                        <button
                            type="submit"
                            class="w-full py-2 px-4 bg-yellow-500 text-white font-semibold rounded-md hover:bg-yellow-600 focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                        >
                            Entrar
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="fixed bottom-0 w-full bg-gray-100 py-4">
            <footer class="container mx-auto px-4 text-center text-sm text-gray-500">
                <div class="flex justify-between items-center">
                    <div>Copyright &copy; ChrisLM 2023</div>
                    <div>
                        <a href="#" class="hover:text-gray-700">Privacy Policy</a>
                        &middot;
                        <a href="#" class="hover:text-gray-700">Terms &amp; Conditions</a>
                    </div>
                </div>
            </footer>
        </div>

       
        <script src="{{ mix('js/app.js') }}"></script>
        <script>
            
            const togglePassword = document.getElementById('showPassword');
            const passwordInput = document.getElementById('senha');

            togglePassword.addEventListener('change', function () {
               
                passwordInput.type = this.checked ? 'text' : 'password';
            });
        </script>
    </body>
</html>
