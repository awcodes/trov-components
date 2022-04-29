<?php

namespace TrovComponents\Commands;

use Illuminate\Support\Str;
use Filament\Facades\Filament;
use Illuminate\Console\Command;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Artisan;

class MakeMultiActionButton extends Command
{
    use Concerns\CanManipulateFiles;

    public $signature = 'trov-components:make-multi-action-button';

    public $description = "One Command to Rule them All 🔥";

    public function handle(): int
    {
        $baseViewPath = resource_path('views/vendor/filament/components/header');

        if ($this->checkForCollision([$baseViewPath])) {
            $confirmed = $this->confirm('View already exists. Overwrite?', true);
            if (!$confirmed) {
                return self::INVALID;
            }
        }

        (new Filesystem())->ensureDirectoryExists($baseViewPath);
        (new Filesystem())->copyDirectory(__DIR__ . '/../../stubs/header', $baseViewPath);

        $this->info('Multi Action Button is now installed.');

        return self::SUCCESS;
    }
}
