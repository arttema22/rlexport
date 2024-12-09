@if($editForm)
<x-dialog-modal wire:model="editForm">
    <x-slot name="title">
        {{$createOrUpdate ? __('Edit') : __('Create')}}
    </x-slot>
    <x-slot name="content">
        <div>
            <x-label for="event_date" value="{{ __('Date') }}" />
            <x-input id="event_date"
                class="block mt-1 w-full {{ $errors->has('event_date') ? 'border-red-600' : 'border-gray-300' }}"
                type="date" name="event_date" wire:model="event_date" required autofocus autocomplete="event_date" />
            <div class="text-red-600">@error('event_date') {{ $message }} @enderror</div>
        </div>
        <div class="mt-4">
            <x-label for="sum" value="{{ __('Sum') }}" />
            <x-input id="sum" class="block mt-1 w-full {{ $errors->has('sum') ? 'border-red-600' : 'border-gray-300' }}"
                type="number" min="10" max="1000000" step=".01" name="sum" wire:model="sum" required />
            <div class="text-red-600">@error('sum') {{ $message }} @enderror</div>
        </div>
        <div class="mt-4">
            <x-label for="comment" value="{{ __('Comment') }}" />
            <x-input id="comment"
                class="block mt-1 w-full {{ $errors->has('comment') ? 'border-red-600' : 'border-gray-300' }}"
                type="text" name="comment" wire:model="comment" />
            <div class="text-red-600">@error('comment') {{ $message }} @enderror</div>
        </div>
    </x-slot>
    <x-slot name="footer">
        <x-secondary-button wire:click="$toggle('editForm')" wire:loading.attr="disabled">
            {{__('Cancel')}}
        </x-secondary-button>
        <x-danger-button class="ml-2" wire:click="store" wire:loading.attr="disabled">
            {{__('Save')}}
        </x-danger-button>
    </x-slot>
</x-dialog-modal>
@endif