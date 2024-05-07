<?php

declare(strict_types=1);

namespace Codenip\Structural\Facade;

readonly class VideoConverter
{
    public function __construct(
        private Ffmpeg $ffmpeg,
    ) {}

    public function convert(string $source, string $destination, string $format): void
    {
        $videoFile = new VideoFile($source);

        $this->ffmpeg->convert($videoFile->getFilePath(), $destination, $format);
    }
}
