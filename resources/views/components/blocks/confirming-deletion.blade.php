@if($confirmingDeletion)
<x-confirmation-modal wire:model="confirmingDeletion">
    <x-slot name="title">
        {{__('Delete')}}
    </x-slot>
    <x-slot name="content">
        {{__('Are you sure you want to delete this entry?')}}
    </x-slot>
    <x-slot name="footer">
        <x-secondary-button wire:click="$toggle('confirmingDeletion')" wire:loading.attr="disabled">
            {{__('Cancel')}}
        </x-secondary-button>
        <x-danger-button class="ml-2" wire:click="delete" wire:loading.attr="disabled">
            {{__('Delete')}}
        </x-danger-button>
    </x-slot>
</x-confirmation-modal>
@endif
