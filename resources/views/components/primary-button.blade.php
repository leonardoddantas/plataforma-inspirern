<button {{ $attributes->merge(['type' => 'submit', 'class' => 'px-2 py-3 bg-slate-700 border border-transparent rounded-md font-medium text-sm text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-slate-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>