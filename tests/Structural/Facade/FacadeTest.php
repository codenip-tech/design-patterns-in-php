<?php

declare(strict_types=1);

namespace Codenip\Tests\Structural\Facade;

use Codenip\Structural\Facade\Ffmpeg;
use Codenip\Structural\Facade\VideoConverter;
use PHPUnit\Framework\TestCase;

use function ob_get_clean;
use function ob_start;

class FacadeTest extends TestCase
{
    public function testVideoConverter(): void
    {
        $converter = new VideoConverter(new Ffmpeg());

        ob_start();

        $converter->convert('video1', 'video2', 'mp4');

        $output = ob_get_clean();
        $expectedOutput = 'Using Ffmpeg to convert video1 to video2 (mp4)';

        self::assertEquals($expectedOutput, $output);
    }
}
