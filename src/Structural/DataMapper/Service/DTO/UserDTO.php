<?php

declare(strict_types=1);

namespace Codenip\Structural\DataMapper\Service\DTO;

readonly class UserDTO
{
    public function __construct(
        public string $id,
        public string $name,
        public string $email,
        public bool $active,
    ) {}
}
