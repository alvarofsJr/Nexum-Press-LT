<a {{ $attributes->merge([
    'class' => 'block w-full px-4 py-2 text-start text-sm leading-5 text-gray-700 dark:text-gray-300 hover:bg-yellow-500 dark:hover:bg-yellow-600 focus:outline-none focus:bg-yellow-500 dark:focus:bg-yellow-600 transition duration-150 ease-in-out'
]) }}>
    {{ $slot }}
</a>
