<?php

declare(strict_types=1);

namespace Codenip\Tests\Behavioral\Observer;

use Codenip\Behavioral\Observer\Display;
use Codenip\Behavioral\Observer\WeatherStation;
use PHPUnit\Framework\TestCase;

use function ob_get_clean;
use function ob_start;

class ObserverTest extends TestCase
{
    public function testObserver(): void
    {
        $weatherStation = new WeatherStation();

        $display1 = new Display();
        $display2 = new Display();

        $weatherStation->registerObserver($display1);
        $weatherStation->registerObserver($display2);

        ob_start();
        $weatherStation->setTemperature(10);
        $output = ob_get_clean();
        $expectedOutput = "Temperature has changed: 10°C\nTemperature has changed: 10°C\n";

        self::assertEquals($expectedOutput, $output);

        $weatherStation->removeObserver($display2);

        ob_start();
        $weatherStation->setTemperature(12);
        $output = ob_get_clean();
        $expectedOutput = "Temperature has changed: 12°C\n";

        self::assertEquals($expectedOutput, $output);
    }
}
