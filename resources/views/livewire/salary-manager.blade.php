<div class="m-4 p-4 bg-white overflow-hidden shadow-xl sm:rounded-lg">
    <div class="font-sans overflow-x-auto">
        <div class="flex justify-between p-4">
            <h2 class="text-xl font-bold border-b-2 inline-block border-[#2A4523] pb-1 capitalize">{{__('Salaries')}}
            </h2>
            <button wire:click="create" type="button"
                class="w-10 h-10 inline-flex items-center justify-center rounded-full border-none outline-none bg-[#2A4523] hover:bg-[#5DA035] active:bg-[#2A4523]">
                <svg xmlns="http://www.w3.org/2000/svg" width="14px" fill="#fff" class="inline" viewBox="0 0 512 512">
                    <path
                        d="M467 211H301V45c0-24.853-20.147-45-45-45s-45 20.147-45 45v166H45c-24.853 0-45 20.147-45 45s20.147 45 45 45h166v166c0 24.853 20.147 45 45 45s45-20.147 45-45V301h166c24.853 0 45-20.147 45-45s-20.147-45-45-45z"
                        data-original="#000000" />
                </svg>
            </button>
        </div>
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-100 whitespace-nowrap">
                <tr>
                    <th class="px-4 py-2 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                        {{__('Num')}}
                    </th>
                    <th class="px-4 py-2 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                        {{__('Date')}}
                    </th>
                    <th class="px-4 py-2 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                        {{__('Sum')}}
                    </th>
                    <th class="px-4 py-2 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                        {{__('Comment')}}
                    </th>
                    <th class="px-4 py-2 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                        {{__('Actions')}}
                    </th>
                </tr>
            </thead>

            <tbody class="bg-white divide-y divide-gray-200 whitespace-nowrap">
                @foreach ( $salaries as $salary )
                <tr>
                    <td class="px-4 py-2 text-sm text-gray-800">
                        {{$loop->iteration}}
                    </td>
                    <td class="px-4 py-2 text-sm text-gray-800">
                        {{$salary->event_date->format(config('app.date_format'))}}
                    </td>
                    <td class="px-4 py- text-sm text-gray-800">
                        {{$salary->sum}}
                    </td>
                    <td class="px-4 py-2 text-sm text-gray-800">
                        {{$salary->comment}}
                    </td>
                    <td class="px-4 py-2 text-sm text-gray-800">
                        <div class="inline-flex items-center rounded-md shadow-sm">
                            <button wire:click="edit({{ $salary->id }})" class="mr-4" title="Edit">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 fill-blue-500 hover:fill-blue-700"
                                    viewBox="0 0 348.882 348.882">
                                    <path
                                        d="m333.988 11.758-.42-.383A43.363 43.363 0 0 0 304.258 0a43.579 43.579 0 0 0-32.104 14.153L116.803 184.231a14.993 14.993 0 0 0-3.154 5.37l-18.267 54.762c-2.112 6.331-1.052 13.333 2.835 18.729 3.918 5.438 10.23 8.685 16.886 8.685h.001c2.879 0 5.693-.592 8.362-1.76l52.89-23.138a14.985 14.985 0 0 0 5.063-3.626L336.771 73.176c16.166-17.697 14.919-45.247-2.783-61.418zM130.381 234.247l10.719-32.134.904-.99 20.316 18.556-.904.99-31.035 13.578zm184.24-181.304L182.553 197.53l-20.316-18.556L294.305 34.386c2.583-2.828 6.118-4.386 9.954-4.386 3.365 0 6.588 1.252 9.082 3.53l.419.383c5.484 5.009 5.87 13.546.861 19.03z"
                                        data-original="#000000" />
                                    <path
                                        d="M303.85 138.388c-8.284 0-15 6.716-15 15v127.347c0 21.034-17.113 38.147-38.147 38.147H68.904c-21.035 0-38.147-17.113-38.147-38.147V100.413c0-21.034 17.113-38.147 38.147-38.147h131.587c8.284 0 15-6.716 15-15s-6.716-15-15-15H68.904C31.327 32.266.757 62.837.757 100.413v180.321c0 37.576 30.571 68.147 68.147 68.147h181.798c37.576 0 68.147-30.571 68.147-68.147V153.388c.001-8.284-6.715-15-14.999-15z"
                                        data-original="#000000" />
                                </svg>
                            </button>
                            <button wire:click="confirmDelete({{ $salary->id }})" class="mr-4" title="Delete">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 fill-red-500 hover:fill-red-700"
                                    viewBox="0 0 24 24">
                                    <path
                                        d="M19 7a1 1 0 0 0-1 1v11.191A1.92 1.92 0 0 1 15.99 21H8.01A1.92 1.92 0 0 1 6 19.191V8a1 1 0 0 0-2 0v11.191A3.918 3.918 0 0 0 8.01 23h7.98A3.918 3.918 0 0 0 20 19.191V8a1 1 0 0 0-1-1Zm1-3h-4V2a1 1 0 0 0-1-1H9a1 1 0 0 0-1 1v2H4a1 1 0 0 0 0 2h16a1 1 0 0 0 0-2ZM10 4V3h4v1Z"
                                        data-original="#000000" />
                                    <path
                                        d="M11 17v-7a1 1 0 0 0-2 0v7a1 1 0 0 0 2 0Zm4 0v-7a1 1 0 0 0-2 0v7a1 1 0 0 0 2 0Z"
                                        data-original="#000000" />
                                </svg>
                            </button>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

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
            Delete
        </x-slot>

        <x-slot name="content">
            Are you sure you want to delete company?
            Once company is deleted,
            all of its resources and
            data will
            be permanently deleted.
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$toggle('confirmingDeletion')" wire:loading.attr="disabled">
                Cancel
            </x-secondary-button>

            <x-danger-button class="ml-2" wire:click="delete" wire:loading.attr="disabled">
                Delete
            </x-danger-button>
        </x-slot>
    </x-confirmation-modal>
    @endif

</div>