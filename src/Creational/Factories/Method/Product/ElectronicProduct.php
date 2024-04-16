<?php

declare(strict_types=1);

namespace Codenip\Creational\Factories\Method\Product;

class ElectronicProduct implements Product
{
    public function type(): string
    {
        return 'electronic';
    }
}
