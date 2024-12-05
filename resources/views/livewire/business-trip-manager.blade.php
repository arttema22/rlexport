<div class="max-w-6xl mx-auto my-4 p-4 overflow-hidden border sm:rounded-lg bg-white">
    <x-blocks.list>
        <x-slot name="title">
            <x-blocks.title>
                {{__('Business Trips')}}
            </x-blocks.title>
            <x-blocks.btn-round-new wire:click="create" title="{{__('New business trip')}}" />
        </x-slot>
        <x-slot name="header">
            <div class="w-1/3">{{__('Date')}}</div>
            <div class="w-1/3">{{__('Sum')}}</div>
            <div class="w-1/3">{{__('Comment')}}</div>
        </x-slot>
        <x-slot name="content">
            @foreach ( $btrips as $trip )
            <x-blocks.accordion>
                <x-blocks.btn-accordion>
                    <div class="w-1/3">{{$trip->event_date->format(config('app.date_format'))}}</div>
                    <div class="w-1/3">{{$trip->sum}}</div>
                    <div class="w-1/3">{{$trip->comment}}</div>
                </x-blocks.btn-accordion>
                <x-blocks.content-accordion>
                    <div class="mr-2 text-xs text-gray-600 leading-relaxed">
                        {{__('Created')}} {{$trip->created_at}}
                        {{__('Updated')}} {{$trip->updated_at}}
                        {{__('Owner')}} {{$trip->owner->name}}
                        {{__('Driver')}} {{$trip->driver->name}}
                    </div>
                    <div class="flex">
                        <x-blocks.btn-edit wire:click="edit({{ $trip->id }})" />
                        <x-blocks.btn-delete wire:click="confirmDelete({{ $trip->id }})" />
                    </div>
                </x-blocks.content-accordion>
            </x-blocks.accordion>
            @endforeach
        </x-slot>
    </x-blocks.list>

    @if($editForm)
    <x-dialog-modal wire:model="editForm">
        <x-slot name="title">
            @if ( $createOrUpdate )
            {{__('Edit')}}
            @else
            {{__('Create')}}
            @endif
            <x-validation-errors class="mb-4" />
        </x-slot>
        <x-slot name="content">
            <div>
                <x-label for="event_date" value="{{ __('Date') }}" />
                <x-input id="event_date" class="block mt-1 w-full" type="date" name="event_date" wire:model="event_date"
                    required autofocus autocomplete="event_date" />
            </div>
            <div class="mt-4">
                <x-label for="sum" value="{{ __('Sum') }}" />
                <x-input id="sum" class="block mt-1 w-full" type="number" min="10" max="1000000" step=".01" name="sum"
                    wire:model="sum" required />
            </div>
            <div class="mt-4">
                <x-label for="comment" value="{{ __('Comment') }}" />
                <x-input id="comment" class="block mt-1 w-full" type="text" name="comment" wire:model="comment" />
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

</div>
