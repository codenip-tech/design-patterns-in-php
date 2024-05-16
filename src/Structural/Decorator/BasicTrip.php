<?php

declare(strict_types=1);

namespace Codenip\Structural\Decorator;

class BasicTrip implements Trip
{
    public function cost(): int
    {
        return 100;
    }

    public function description(): string
    {
        return 'Basic trip';
    }
}
