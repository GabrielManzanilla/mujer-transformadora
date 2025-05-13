<label for="" class="items-center gap-2 mb-2 grid grid-cols-1 lg:grid-cols-5">

    @if ($type == 'select')
        <span class="text-gray-700 text-md font-semibold">
            {{ $label}}
        </span>
        <select name="{{ $name }}" id="{{$id}}"
            class="w-full px-2 py-1 border text-md border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#6D1528] col-span-4">
            {{ $slot }}
        </select>

    @elseif ($type == 'file')
        <span class="text-gray-700 text-md font-semibold">{{ $label }}</span>
        <input
            class="block w-full text-sm text-gray-800 file:mr-4 file:rounded-full file:border-0 file:bg-[#c2995c] file:px-4 file:py-2 file:text-sm file:font-semibold file:text-gray-100 hover:file:bg-[#c29959] focus:outline-none hover:cursor-pointer col-span-4"
            type="file" name="{{ $name }}" id="{{ $id }}" accept="application/pdf,image/*">
    @else
        <span class="text-gray-700 text-md font-semibold">
            {{ $slot }}
        </span>
        <input type="{{ $type }}" id="{{$id}}" name="{{ $name }}"
            class="w-full px-2 py-1 border text-md border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#6D1528] col-span-4"
            value="{{ $value ?? '' }}" placeholder="{{ $placeholder }}" {{ $required == true ? 'required' : '' }}>
    @endif
</label>