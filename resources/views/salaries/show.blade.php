<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('View') }}
        </h2>
    </x-slot>

    <x-card-main-white>
        test
    </x-card-main-white>

    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <div class="md:grid md:grid-cols-3 md:gap-6">

            <div class="mt-5 md:mt-0 md:col-span-2">
                <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
                    <div class="grid grid-cols-6 gap-6">

                        <div class="col-span-6 sm:col-span-4">
                            <h3 class="text-lg font-medium text-gray-900">{{ __('Main information') }}</h3>
                        </div>

                        <div class="flex justify-between items-end col-span-6 sm:col-span-4">
                            <span class="font-medium text-gray-900">{{ __('Date') }}</span>
                            <span class="text-2xl">{{ $Salary->date }}</span>
                        </div>

                        <div class="flex justify-between items-end col-span-6 sm:col-span-4">
                            <span class="font-medium text-gray-900">{{ __('Sum') }}</span>
                            <span class="text-2xl">{{ $Salary->sum }}</span>
                        </div>

                        <div class="col-span-6 sm:col-span-4">
                            <span class="font-medium text-gray-900">{{ __('Comment') }}</span>
                            <p class="text-2xl">{{ $Salary->comment }}</p>
                        </div>
                    </div>
                    <x-buttons-group>
                        <x-link-button href="{{ route('salary.index') }}">
                            {{ __('Back') }}
                        </x-link-button>

                        <x-link href="{{ route('salary.edit', $Salary) }}">
                            {{ __('Edit') }}
                        </x-link>
                    </x-buttons-group>
                </div>
            </div>

            <div class=" md:col-span-1 flex justify-between">
                <div class="px-4 sm:px-0">
                    <h3 class="text-lg font-medium text-gray-900">{{ __('Additional information') }}</h3>

                    <div class="flex justify-between">
                        <span>{{ __('Owner') }}</span>
                        <span>{{ $Salary->owner_id }}</span>
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

                </div>
            </div>

        </div>
    </div>

</x-app-layout>