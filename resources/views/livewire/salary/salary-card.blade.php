<x-dashboard.card-dashboard>
    <x-dashboard.card-dashboard-title>
        <a href="{{route('salary.index')}}">{{__('Salaries')}}</a>
    </x-dashboard.card-dashboard-title>
    <x-dashboard.card-dashboard-data>
        {{$SalariesCount}} / {{$SalariesSum}}
    </x-dashboard.card-dashboard-data>
    <span class="text-gray-400 text-sm mt-1">{{__('Count')}} / {{__('Sum')}}</span>
    <x-dashboard.card-dashboard-link href="{{route('salary.index')}}">
        {{__('To list')}}
        <x-dashboard.card-dashboard-link-img />
    </x-dashboard.card-dashboard-link>
</x-dashboard.card-dashboard>
