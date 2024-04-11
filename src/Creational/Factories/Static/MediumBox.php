<?php

declare(strict_types=1);

namespace Codenip\Creational\Factories\Static;

class MediumBox implements Box
{
    public function size(): string
    {
        return 'Medium';
    }
}
