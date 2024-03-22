<?php

declare(strict_types=1);

namespace Codenip\Creational\Singleton\Logger;

use function sprintf;

class FileLogger implements LoggerInterface
{
    public function log(string $message): void
    {
        echo sprintf('Writing log message to file: %s', $message);
    }
}
