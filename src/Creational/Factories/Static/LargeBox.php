<?php

declare(strict_types=1);

namespace Codenip\Creational\Factories\Static;

class LargeBox implements Box
{
    public function size(): string
    {
        return 'Large';
    }
}
