<?php

namespace TrovComponents\Tables\Columns;

use TrovComponents\Enums\Status;
use Illuminate\Support\HtmlString;
use Filament\Tables\Columns\TextColumn;

class TitleWithStatus extends TextColumn
{
    protected function setUp(): void
    {
        $this->formatStateUsing(function ($record, $state) {
            if ($record->front_page) {
                return new HtmlString($state . ' — <strong class="px-2 py-1 text-xs text-white rounded-md bg-success-600">Front Page</strong>');
            }

            if ($record->deleted_at) {
                return new HtmlString($state . ' — <strong class="px-2 py-1 text-xs text-white rounded-md bg-danger-600 dark:bg-danger-600/50">Trashed</strong>');
            }

            if ($record->status == Status::Draft->name) {
                return new HtmlString($state . ' — <strong class="px-2 py-1 text-xs text-white rounded-md bg-black/50">Draft</strong>');
            }

            if ($record->status == Status::Review->name) {
                return new HtmlString($state . ' — <strong class="px-2 py-1 text-xs text-white rounded-md bg-warning-600 dark:bg-warning-600/50">In Review</strong>');
            }

            return $state;
        });
    }
}
