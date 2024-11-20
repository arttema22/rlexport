<div class="grid md:grid-cols-2 gap-4">
    <div class="p-4 border rounded-md">
        {{ $slot }}
    </div>
    <div class="p-4 border rounded-md bg-gray-100 shadow-inner">
        {{ $additional }}
    </div>
</div>