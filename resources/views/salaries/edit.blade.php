<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit salary') }}
        </h2>
    </x-slot>

    <x-card-main-white>
        test
    </x-card-main-white>

    <x-new-data-card>

        <x-validation-errors class="mb-4" />

        <form method="PUT" action="{{ route('salary.update', $salary->id) }}">
            @csrf

            <div>
                <x-label for="date" value="{{ __('Date') }}" />
                <x-input id="date" class="block mt-1 w-full" type="date" name="date" :value="old('date', $salary->date)"
                    required autofocus autocomplete="date" />
            </div>

            <div class="mt-4">
                <x-label for="sum" value="{{ __('Sum') }}" />
                <x-input id="sum" class="block mt-1 w-full" type="number" min="10" max="1000000" step=".01" name="sum"
                    :value="old('sum', $salary->sum)" required />
            </div>

            <div class="mt-4">
                <x-label for="comment" value="{{ __('Comment') }}" />
                <x-input id="comment" class="block mt-1 w-full" type="text" name="comment"
                    :value="old('comment', $salary->comment)" />
            </div>

            <x-buttons-group>
                <x-link href="{{ route('salary.index') }}">
                    {{ __('Cancel') }}
                </x-link>
                <x-button class="ms-4">
                    {{ __('Save') }}
                </x-button>
            </x-buttons-group>
        </form>
    </x-new-data-card>
</x-app-layout>

{{--
<div class="form-group">
    <label for="title">Title</label>
    <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $post->title) }}" required>
</div>

<div class="form-group">
    <label for="content">Content</label>
    <textarea name="content" id="content" class="form-control" required>{{ old('content', $post->content) }}</textarea>
</div>

<button type="submit" class="btn btn-primary">Update Post</button> --}}