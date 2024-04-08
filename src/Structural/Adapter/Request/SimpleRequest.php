<?php

declare(strict_types=1);

namespace Codenip\Structural\Adapter\Request;

use Codenip\Structural\Adapter\Interface\RequestInterface;

readonly class SimpleRequest implements RequestInterface
{
    public function __construct(
        private string $method,
        private string $url,
        /** @var array<string, mixed> */
        private array $headers,
        private string $body,
    ) {}

    public function getMethod(): string
    {
        return $this->method;
    }

    public function getUrl(): string
    {
        return $this->url;
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
