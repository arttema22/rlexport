<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('View') }}
        </h2>
    </x-slot>

    <x-section>
        <x-covers.cover-medium>
            <x-2-column-section>

                <h3 class="mb-2 text-lg font-medium text-gray-900">{{ __('Main information') }}</h3>
                <table class="table-fixed">
                    <tr>
                        <x-index.table-td>{{ __('Date') }}:</x-index.table-td>
                        <x-index.table-td>{{ $Salary->event_date->format(config('app.date_format')) }}
                        </x-index.table-td>
                    </tr>
                    <tr>
                        <x-index.table-td>{{ __('Sum') }}:</x-index.table-td>
                        <x-index.table-td>{{ $Salary->sum }}</x-index.table-td>
                    </tr>
                </table>
                @if ($Salary->comment)
                <span>{{ __('Comment') }}:</span>
                <p>{{ $Salary->comment }}</p>
                @endif

                <x-slot name="additional">
                    <h3 class="mb-2 text-lg font-medium text-gray-900">{{ __('Additional information') }}</h3>

                    <div class="flex justify-between">
                        <span>{{ __('Owner') }}</span>
                        @if ($Salary->owner_id == 0)
                        <span>{{ $Salary->driver->name }}</span>
                        @else
                        <span>{{ $Salary->owner->name }}</span>
                        @endif
                    </div>

                    <div class="flex justify-between">
                        <span>{{ __('Driver') }}</span>
                        <span>{{ $Salary->driver->name }}</span>
                    </div>

                    <div class="flex justify-between">
                        <span>{{ __('Created') }}</span>
                        <span>{{ $Salary->created_at }}</span>
                    </div>

                    <div class="flex justify-between">
                        <span>{{ __('Updated') }}</span>
                        <span>{{ $Salary->updated_at }}</span>
                    </div>

                </x-slot>

            </x-2-column-section>

            <x-buttons-group>
                <x-link-button href="{{ route('salary.index') }}">
                    {{ __('Back') }}
                </x-link-button>

                <x-link href="{{ route('salary.edit', $Salary) }}">
                    {{ __('Edit') }}
                </x-link>
            </x-buttons-group>

        </x-covers.cover-medium>
    </x-section>

</x-app-layout>