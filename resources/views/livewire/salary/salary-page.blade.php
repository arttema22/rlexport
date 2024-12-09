<div class="grid grid-cols-1 md:grid-cols-3 gap-4">
    <div class="md:col-span-2">
        @foreach ( $salaries as $salary )
        <div class="relative pl-8 sm:pl-32 py-6 group">
            <div
                class="flex flex-col sm:flex-row items-start mb-1 group-last:before:hidden before:absolute before:left-2 sm:before:left-0 before:h-full before:px-px before:bg-slate-300 sm:before:ml-[6.5rem] before:self-start before:-translate-x-1/2 before:translate-y-3 after:absolute after:left-2 sm:after:left-0 after:w-2 after:h-2 after:bg-green-900 after:border-4 after:box-content after:border-slate-50 after:rounded-full sm:after:ml-[6.5rem] after:-translate-x-1/2 after:translate-y-1.5">
                <time
                    class="sm:absolute left-0 translate-y-0.5 inline-flex items-center justify-center uppercase text-sm w-22 h-6 mb-3 sm:mb-0 bg-gray-100 rounded-full">
                    {{$salary->event_date->format(config('app.date_format'))}}
                </time>
                <div class="w-full flex justify-between items-center">
                    <div class="text-xl font-bold text-gray-800">
                        {{$salary->sum . ' ' . __('rub')}}
                    </div>
                    <div>
                        {{$salary->comment}}
                    </div>
                    <div class="flex">
                        <x-blocks.btn-edit wire:click="edit({{ $salary->id }})" />
                        <x-blocks.btn-delete wire:click="confirmDelete({{ $salary->id }})" />
                    </div>
                </div>
            </div>
            <div class="text-gray-400 text-sm">
                {{__('Created')}} {{$salary->created_at}}
                {{__('Updated')}} {{$salary->updated_at}}
                {{__('Owner')}} {{$salary->owner->name}}
                {{__('Driver')}} {{$salary->driver->name}}
            </div>
        </div>
        @endforeach
        {{$salaries->links()}}
    </div>
    <div>
        @livewire('Salary.SalaryCard')
    </div>
</div>