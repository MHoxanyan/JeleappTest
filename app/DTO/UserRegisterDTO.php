<?php

namespace App\DTO;

use App\Enum\GenderType;

readonly class UserRegisterDTO
{
    public function __construct(
        public string $email,
        public string $password,
        public GenderType $gender,
        public ?string $name = null,
    ) {}
}
