<div class="grid md:grid-cols-3 gap-4">
    <div class="md:col-span-2 p-4 border rounded-md">
        {{ $slot }}
    </div>
    <div class="p-4 border rounded-md bg-gray-100 shadow-inner">
        {{ $additional }}
    </div>
</div>