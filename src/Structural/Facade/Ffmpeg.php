<?php

declare(strict_types=1);

namespace Codenip\Structural\Facade;

use function sprintf;

class Ffmpeg
{
    public function convert(string $source, string $destination, string $format): void
    {
        // more complex logic to convert videos
        echo sprintf('Using Ffmpeg to convert %s to %s (%s)', $source, $destination, $format);
    }
}
