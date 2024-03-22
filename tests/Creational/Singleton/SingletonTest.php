<?php

declare(strict_types=1);

namespace Codenip\Tests\Creational\Singleton;

use Codenip\Creational\Singleton\Factory\LoggerFactory;
use Codenip\Creational\Singleton\Logger\FileLogger;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class SingletonTest extends TestCase
{
    public function testSingletonInstance(): void
    {
        $instance1 = LoggerFactory::getInstance();
        $instance2 = LoggerFactory::getInstance();

        self::assertSame($instance1, $instance2);

        $instance1::resetInstance();
    }

    public function testCreateFileLoggerInstance(): void
    {
        $factory = LoggerFactory::getInstance();
        $logger = $factory->createLogger();

        self::assertInstanceOf(FileLogger::class, $logger);

        $factory::resetInstance();
    }

    public function testCreateInvalidLoggerInstance(): void
    {
        self::expectException(InvalidArgumentException::class);

        $factory = LoggerFactory::getInstance('invalid');
        $factory->createLogger();
    }
}
