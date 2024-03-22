<?php

declare(strict_types=1);

namespace Codenip\Creational\Singleton\Factory;

use Codenip\Creational\Singleton\Logger\FileLogger;
use Codenip\Creational\Singleton\Logger\LoggerInterface;
use InvalidArgumentException;

use function sprintf;

class LoggerFactory
{
    private static ?LoggerFactory $instance = null;
    private string $loggerType;

    private function __construct(string $loggerType)
    {
        $this->loggerType = $loggerType;
    }

    private function __clone() {}

    public function __wakeup(): void {}

    public static function getInstance(string $loggerType = 'file'): LoggerFactory
    {
        if (self::$instance === null) {
            self::$instance = new self($loggerType);
        }

        return self::$instance;
    }

    public function createLogger(): LoggerInterface
    {
        if ($this->loggerType === 'file') {
            return new FileLogger();
        }

        throw new InvalidArgumentException(sprintf('Unsupported logger type: %s', $this->loggerType));
    }

    public static function resetInstance(): void
    {
        self::$instance = null;
    }
}
