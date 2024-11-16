<?php

namespace App\Enum;

enum GenderType: int
{
    case Male = 1;
    case Female = 2;

    public function getName(): string
    {
        return match ($this) {
            self::Male => 'Male',
            default => 'Female',
        };
    }
}
