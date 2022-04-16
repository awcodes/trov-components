<?php

namespace TrovComponents;

use Livewire\Livewire;
use Filament\Facades\Filament;
use Filament\PluginServiceProvider;
use Spatie\LaravelPackageTools\Package;

class TrovComponentsServiceProvider extends PluginServiceProvider
{
    protected array $styles = [
        'trov-components-styles' => __DIR__ . '/../resources/dist/trov-components.css',
    ];

    public function configurePackage(Package $package): void
    {
        $package
            ->name('trov-components')
            ->hasAssets()
            ->hasViews();
    }

    public function boot()
    {
        parent::boot();
    }
}
