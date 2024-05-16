<?php

declare(strict_types=1);

namespace Codenip\Structural\Decorator;

abstract class TripDecorator implements Trip
{
    public function __construct(
        protected readonly Trip $trip,
    ) {}

    public function cost(): int
    {
        return $this->trip->cost();
    }

    public function description(): string
    {
        return $this->trip->description();
    }
}
