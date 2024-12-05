@if ($errors->any())
<div {{ $attributes }}>
    @foreach ($errors->all() as $error)
    <div class="bg-red-100 text-red-700 px-2 py-1 mt-1 rounded-lg" role="alert">
        <span class="block text-sm sm:inline max-sm:mt-2">{{ $error }}</span>
    </div>
    @endforeach
</div>
@endif