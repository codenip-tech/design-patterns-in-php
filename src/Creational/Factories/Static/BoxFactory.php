<?php

declare(strict_types=1);

namespace Codenip\Creational\Factories\Static;

class BoxFactory
{
    public static function createSmallBox(): Box
    {
        return new SmallBox();
    }

    public static function createMediumBox(): Box
    {
        return new MediumBox();
    }

    public static function createLargeBox(): Box
    {
        return new LargeBox();
    }
}
