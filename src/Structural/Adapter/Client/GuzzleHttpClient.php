<?php

declare(strict_types=1);

namespace Codenip\Structural\Adapter\Client;

use Codenip\Structural\Adapter\Interface\HttpClientInterface;
use Codenip\Structural\Adapter\Interface\RequestInterface;
use Codenip\Structural\Adapter\Interface\ResponseInterface;
use Codenip\Structural\Adapter\Response\SimpleResponse;
use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class GuzzleHttpClient implements HttpClientInterface
{
    private readonly Client $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    public function sendRequest(RequestInterface $request): ResponseInterface
    {
        $options = [
            'method' => $request->getMethod(),
            'headers' => $request->getHeaders(),
            'body' => $request->getBody(),
        ];

        try {
            $response = $this->client->request($request->getUrl(), $options);
            $statusCode = $response->getStatusCode();
            $headers = $response->getHeaders();
            $body = $response->getBody();
        } catch (RequestException $e) {
            // Handle exception (e.g., network errors)
            throw new Exception('Request failed: ' . $e->getMessage());
        }

        return new SimpleResponse($statusCode, $headers, $body->getContents());
    }
}
