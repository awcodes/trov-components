@props([
    'actions' => null,
    'heading',
])

<header
    {{ $attributes->class('space-y-2 items-start justify-between sm:flex sm:space-y-0 sm:space-x-4  sm:rtl:space-x-reverse sm:py-4 filament-header') }}>
    <x-filament::header.heading>
        {{ $heading }}
    </x-filament::header.heading>

    @if (property_exists($this, 'hasMultiActionButton') && $this->hasMultiActionButton && count($actions) > 1)
        <x-trov-components::multi-action-button :actions="$actions"
            class="shrink-0" />
    @else
        <x-filament::pages.actions :actions="$actions"
            class="shrink-0" />
    @endif
</header>
