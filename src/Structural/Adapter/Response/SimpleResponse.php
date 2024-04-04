<?php

declare(strict_types=1);

namespace Codenip\Structural\Adapter\Response;

use Codenip\Structural\Adapter\Interface\ResponseInterface;

readonly class SimpleResponse implements ResponseInterface
{
    public function __construct(
        private int $statusCode,
        /** @var array<string, mixed> */
        private array $headers,
        private string $body,
    ) {}

    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    /**
     * @return array<string, mixed>
     */
    public function getHeaders(): array
    {
        return $this->headers;
    }

    public function getBody(): string
    {
        return $this->body;
    }
}
