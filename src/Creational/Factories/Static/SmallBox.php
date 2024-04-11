<?php

declare(strict_types=1);

namespace Codenip\Creational\Factories\Static;

class SmallBox implements Box
{
    public function size(): string
    {
        return 'Small';
    }
}
