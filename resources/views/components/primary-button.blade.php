<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-lime-300 border border-transparent rounded-md font-semibold text-xs text-[#26311d] uppercase tracking-widest hover:bg-lime-200 focus:bg-stone-700 active:bg-[#e3f9b8] focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
