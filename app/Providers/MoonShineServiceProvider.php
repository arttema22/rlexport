<?php

declare(strict_types=1);

namespace App\Providers;

use Closure;
use MoonShine\Pages\Page;
use MoonShine\Menu\MenuItem;
use MoonShine\Menu\MenuGroup;
use MoonShine\Menu\MenuDivider;
use MoonShine\Menu\MenuElement;
use App\MoonShine\Pages\Sys\Settings;
use App\MoonShine\Resources\UserResource;
use App\MoonShine\Resources\RouteResource;
use App\MoonShine\Resources\ProfitResource;
use App\MoonShine\Resources\SalaryResource;
use App\MoonShine\Resources\ServiceResource;
use App\MoonShine\Resources\RefillingResource;
use App\MoonShine\Resources\Sys\TruckResource;
use App\MoonShine\Resources\BusinessTripResource;
use App\MoonShine\Resources\Dir\DirCargoResource;
use MoonShine\Contracts\Resources\ResourceContract;
use App\MoonShine\Resources\Dir\DirFuelTypeResource;
use App\MoonShine\Resources\Dir\DirTruckTypeResource;
use App\MoonShine\Resources\Dir\DirTruckBrandResource;
use App\MoonShine\Resources\Sys\MoonShineUserResource;
use App\MoonShine\Resources\Tariff\TariffRouteResource;
use App\MoonShine\Resources\Dir\DirFuelCategoryResource;
use App\MoonShine\Resources\Dir\DirRouteAddressResource;
use App\MoonShine\Resources\Dir\DirPetrolStationResource;
use App\MoonShine\Resources\Sys\SetupIntegrationResource;
use App\MoonShine\Resources\Tariff\TariffServiceResource;
use App\MoonShine\Resources\Sys\MoonShineUserRoleResource;
use App\MoonShine\Resources\Tariff\TariffDistanceResource;
use MoonShine\Providers\MoonShineApplicationServiceProvider;
use App\MoonShine\Resources\Dir\DirPetrolStationBrandResource;

class MoonShineServiceProvider extends MoonShineApplicationServiceProvider
{
    /**
     * @return list<ResourceContract>
     */
    protected function resources(): array
    {
        return [];
    }

    /**
     * @return list<Page>
     */
    protected function pages(): array
    {
        return [];
    }

    /**
     * @return Closure|list<MenuElement>
     */
    protected function menu(): array
    {
        return [
            MenuItem::make(__('Profits'), new ProfitResource()),
            MenuItem::make(__('Routes'), new RouteResource()),
            MenuItem::make(__('Refillings'), new RefillingResource()),
            MenuItem::make(__('Salaries'), new SalaryResource()),
            MenuItem::make(__('Business Trips'), new BusinessTripResource()),
            MenuItem::make(__('Services'), new ServiceResource()),

            // MenuGroup::make('1c', [
            //     MenuItem::make('users_1c', new users1cPage())->translatable('moonshine::menu'),
            //     MenuItem::make('nomenclature_1c', new nomenclature1cPage())->translatable('moonshine::menu'),
            //     MenuItem::make('contract_1c', new contract1cPage())->translatable('moonshine::menu'),
            // ]),

            // MenuItem::make('test', new DirFuelCategoryFormPage()),

            // MenuItem::make('profit', new Profit())
            //     ->translatable('moonshine::profit'),


            MenuGroup::make(static fn() => __('System'), [
                MenuItem::make(__('Drivers'), new UserResource()),
                MenuItem::make(__('Trucks'), new TruckResource()),
                MenuItem::make(__('Integrations'), new SetupIntegrationResource()),
                MenuItem::make(__('Administrators'), new MoonShineUserResource()),
                MenuItem::make(__('Roles'), new MoonShineUserRoleResource()),
                MenuItem::make(__('Settings'), new Settings())->icon('heroicons.cog-6-tooth'),
            ]),

            MenuGroup::make(__('Directories'), [
                MenuItem::make(__('Cargos'), new DirCargoResource()),
                MenuItem::make(__('Addresses'), new DirRouteAddressResource()),
                MenuDivider::make(__('Trucks')),
                MenuItem::make(__('Truck types'), new DirTruckTypeResource()),
                MenuItem::make(__('Brands'), new DirTruckBrandResource()),
                MenuDivider::make(__('Petrol stations')),
                MenuItem::make(__('Petrol stations'), new DirPetrolStationResource()),
                MenuItem::make(__('Petrol station brands'), new DirPetrolStationBrandResource()),
                MenuItem::make(__('Fuels'), new DirFuelTypeResource()),
                MenuItem::make(__('Fuel categories'), new DirFuelCategoryResource()),
            ])->icon('heroicons.bars-3'),


            //MenuItem::make('services', new DirServiceResource())
            //    ->translatable('moonshine::directory'),
            // MenuGroup::make('trucks', [
            //     MenuItem::make('brands', new DirTruckBrandResource())
            //         ->translatable('moonshine::directory'),
            // ])->translatable('moonshine::directory'),



            MenuGroup::make(__('Tariffs'), [
                MenuItem::make(__('Distance'), new TariffDistanceResource()),
                MenuItem::make(__('Routes'), new TariffRouteResource()),
                MenuItem::make(__('Services'), new TariffServiceResource()),
            ])->icon('heroicons.circle-stack'),

            // MenuItem::make('help', 'https://github.com/arttema22/LogistRLE2/wiki', blank: true)
            //     ->icon('heroicons.outline.lifebuoy')
            //     ->translatable('moonshine::ui'),
        ];
    }

    /**
     * @return Closure|array{css: string, colors: array, darkColors: array}
     */
    protected function theme(): array
    {
        return [
            'colors' => [
                'primary' => 'rgb(42, 69, 35)', // темно зеленый
                //'secondary' => 'rgb(42, 69, 35)', // темно зеленый
                //'body' => 'rgb(27, 37, 59)',
                //'body' => 'rgb(93, 160, 53)', // светло зеленый
            ],
        ];
    }
}
