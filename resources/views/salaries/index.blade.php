<x-app-layout>

    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Salaries') }}&nbsp;({{$SalariesCount}}&nbsp;/&nbsp;{{$SalariesSum}})
            </h2>
            <x-link-button href="{{ route('salary.new') }}">
                {{ __('New') }}
            </x-link-button>
        </div>
        @if(session('success'))
        <x-alerts.success></x-alerts.success>
        @endif
        @if(session('info'))
        <x-alerts.info></x-alerts.info>
        @endif
    </x-slot>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-2">
        <div class="md:col-span-2">
            @livewire('Salary.SalaryManager')
        </div>
        <div>
            @livewire('Salary.SalaryCard')
        </div>
        <div class="">
            @livewire('Salary.SalaryArchive')
        </div>
    </div>

</x-app-layout>