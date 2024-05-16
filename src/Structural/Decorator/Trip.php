<?php

declare(strict_types=1);

namespace Codenip\Structural\Decorator;

interface Trip
{
    public function cost(): int;

    public function description(): string;
}
