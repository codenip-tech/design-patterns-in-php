<?php

declare(strict_types=1);

namespace Codenip\Creational\Singleton\Logger;

interface LoggerInterface
{
    public function log(string $message): void;
}
