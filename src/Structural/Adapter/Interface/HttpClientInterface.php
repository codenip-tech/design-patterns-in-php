<?php

declare(strict_types=1);

namespace Codenip\Structural\Adapter\Interface;

interface HttpClientInterface
{
    public function sendRequest(RequestInterface $request): ResponseInterface;
}
