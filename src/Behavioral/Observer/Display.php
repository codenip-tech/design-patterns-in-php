<?php

declare(strict_types=1);

namespace Codenip\Behavioral\Observer;

use function sprintf;

use const PHP_EOL;

class Display implements Observer
{
    public function update(float $temperature): void
    {
        echo sprintf('Temperature has changed: %s°C', $temperature) . PHP_EOL;
    }
}
