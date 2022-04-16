<?php

namespace TrovComponents\Filament;

use Filament\Pages\Actions\Action;
use Filament\Pages\Actions\Concerns;

class MultiActionButton extends Action
{
    use Concerns\CanSubmitForm;

    protected string $view = 'trov-components::filament.multi-action-button';

    protected Closure | array $actions = [];

    public function actions(Closure | array $actions): static
    {
        $this->actions = $actions;

        return $this;
    }

    public function getActions(): Closure | array
    {
        return $this->actions;
    }
}
