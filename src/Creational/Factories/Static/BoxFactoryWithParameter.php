<?php

declare(strict_types=1);

namespace Codenip\Creational\Factories\Static;

use InvalidArgumentException;

class BoxFactoryWithParameter
{
    public static function fromSize(string $size): Box
    {
        return match ($size) {
            'small' => new SmallBox(),
            'medium' => new MediumBox(),
            'large' => new LargeBox(),
            default => throw new InvalidArgumentException('Invalid box size')
        };
    }
}
