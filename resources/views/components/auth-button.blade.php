<button
    {{ $attributes->merge(['type' => 'submit', 'class' => 'w-full items-justify-center px-4 py-3 bg-cyan-900 border border-transparent rounded-lg font-semibold text-xs text-white uppercase tracking-widest hover:bg-cyan-700 focus:bg-cyan-700 active:bg-cyan-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
