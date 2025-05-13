<div class="w-full display flex flex-row items-center justify-center h-screen bg-gray-100 py-5 pt-10">
    <div class="w-full p-3 lg:w-1/2 lg:p-0 h-full">
        <h1 class="font-bold uppercase underline text-2xl text-center">{{ $title }} </h1>
        <div class="overflow-y-auto h-full">
            {{ $slot }}
        </div>
    </div>


</div>