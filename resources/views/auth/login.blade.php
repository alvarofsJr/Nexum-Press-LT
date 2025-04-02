<x-guest-layout>
    <!-- Status de sessão -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div>
            <label for="credencial">Credencial</label>
            <input
                type="text"
                name="credencial"
                id="credencial"
                class="input @error('credencial') border-red-500 @enderror"
                value="{{ old('credencial') }}"
            />
            @error('credencial')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="password">Senha</label>
            <input
                type="password"
                name="password"
                id="password"
                class="input @error('password') border-red-500 @enderror"
            />
            @error('password')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <input type="checkbox" id="showPassword" class="mr-2">
            <label for="showPassword">Mostrar Senha</label>
        </div>

        <div>
            <button type="submit">Login</button>
        </div>
    </form>

    <script>
        const togglePassword = document.getElementById('showPassword');
        const passwordInput = document.getElementById('password');

        togglePassword.addEventListener('change', function () {
            passwordInput.type = this.checked ? 'text' : 'password';
        });
    </script>
</x-guest-layout>
