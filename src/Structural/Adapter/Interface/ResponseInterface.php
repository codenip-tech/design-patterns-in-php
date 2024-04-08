<?php

declare(strict_types=1);

namespace Codenip\Structural\Adapter\Interface;

interface ResponseInterface
{
    public function getStatusCode(): int;

    /**
     * @return array<string, mixed>
     */
    public function getHeaders(): array;

    public function getBody(): string;
}
