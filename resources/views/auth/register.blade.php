<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        
        <div>
            <x-input-label for="name" :value="__('Nome')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        
        <div class="mt-4">
            <x-input-label for="credencial" :value="__('Credencial')" />
            <x-text-input id="credencial" class="block mt-1 w-full" type="text" name="credencial" :value="old('credencial')" required pattern="[A-Za-z]{3}[0-9]{3}" />
            <x-input-error :messages="$errors->get('credencial')" class="mt-2" />
        </div>

        
        <div class="mt-4">
            <x-input-label for="password" :value="__('Senha')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required pattern="\d{}" autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

       
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirme sua senha')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required pattern="\d{6}" autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
