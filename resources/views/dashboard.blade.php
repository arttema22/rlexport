<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                    <h1 class="mt-8 text-2xl font-medium text-gray-900">
                        {{__('Welcome to your Logist application!')}}
                    </h1>

                    <div class="mt-6 text-gray-500 leading-relaxed">
                        <div class="flex gap-4">
                            <!-- Salaries -->
                            <div class="bg-white shadow-md rounded-lg p-6 flex flex-col items-center">
                                <h2 class="text-gray-500 font-medium text-sm">{{__('Salaries')}}</h2>
                                <p class="text-2xl font-bold">{{$SalariesCount}} / {{$SalariesSum}}</p>
                                <span class="text-gray-400 text-sm mt-1">{{__('Count / Sum of Salaries.')}}</span>
                            </div>
                            <!-- Refillings -->
                            <div class="bg-white shadow-md rounded-lg p-6 flex flex-col items-center">
                                <h2 class="text-gray-500 font-medium text-sm">{{__('Refillings')}}</h2>
                                <p class="text-2xl font-bold">{{$RefillingsCount}} / {{$RefillingsSum}}</p>
                                <span class="text-gray-400 text-sm mt-1">{{__('Count / Sum of Refillings.')}}</span>
                            </div>
                            <!-- Business Trips -->
                            <div class="bg-white shadow-md rounded-lg p-6 flex flex-col items-center">
                                <h2 class="text-gray-500 font-medium text-sm">{{ __('Business Trips') }}</h2>
                                <p class="text-2xl font-bold">{{$BtripsCount}} / {{$BtripsSum}}</p>
                                <span class="text-gray-400 text-sm mt-1">{{__('Count / Sum of Business Trips.')}}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <x-welcome />
            </div>
        </div>
    </div>
</x-app-layout>