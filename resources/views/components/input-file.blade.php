<label class="block-inline">
    <span class="font-bold uppercase">{{ $label }}</span>
    <input
        class="block w-full text-sm text-gray-800 file:mr-4 file:rounded-full file:border-0 file:bg-[#c2995c] file:px-4 file:py-2 file:text-sm file:font-semibold file:text-gray-100 hover:file:bg-[#c29959] focus:outline-none hover:cursor-pointer"
        type="file"
        name="{{ $name }}"
        id="{{ $name }}"
        accept="application/pdf,image/*">
</label>