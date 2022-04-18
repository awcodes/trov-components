<?php

namespace TrovComponents\Enums;

enum Status
{
    case Draft;
    case Review;
    case Published;

    public function color(): string
    {
        return match ($this) {
            Status::Draft => 'danger',
            Status::Review => 'warning',
            Status::Published => 'success',
        };
    }
}
