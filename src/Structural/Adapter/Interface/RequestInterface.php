<?php

declare(strict_types=1);

namespace Codenip\Structural\Adapter\Interface;

interface RequestInterface
{
    public function getMethod(): string;

    public function getUrl(): string;

    /**
     * @return array<string, mixed>
     */
    public function getHeaders(): array;

    public function getBody(): string;
}
