<?php

declare(strict_types=1);

namespace Codenip\Structural\Adapter\Client;

use Codenip\Structural\Adapter\Interface\HttpClientInterface;
use Codenip\Structural\Adapter\Interface\RequestInterface;
use Codenip\Structural\Adapter\Interface\ResponseInterface;
use Codenip\Structural\Adapter\Response\SimpleResponse;

use function curl_close;
use function curl_exec;
use function curl_getinfo;
use function curl_init;
use function curl_setopt;
use function explode;
use function mb_strlen;
use function mb_substr;
use function str_contains;
use function trim;

use const CURLINFO_HTTP_CODE;
use const CURLOPT_CUSTOMREQUEST;
use const CURLOPT_HTTPHEADER;
use const CURLOPT_POSTFIELDS;
use const CURLOPT_RETURNTRANSFER;

class CurlHttpClient implements HttpClientInterface
{
    public function sendRequest(RequestInterface $request): ResponseInterface
    {
        // Use curl functions to build and execute the request
        $ch = curl_init($request->getUrl());
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $request->getMethod());
        curl_setopt($ch, CURLOPT_HTTPHEADER, $request->getHeaders());
        curl_setopt($ch, CURLOPT_POSTFIELDS, $request->getBody());
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);
        $statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        // Parse response headers and body
        $headers = [];
        $responseBody = $response;
        $lines = explode("\r\n", $response);

        foreach ($lines as $line) {
            if (str_contains($line, ':')) {
                [$header, $value] = explode(':', $line, 2);
                $headers[trim($header)] = trim($value);
            } elseif ($responseBody) {
                $responseBody = mb_substr($response, mb_strlen($line) + 2);
            }
        }

        return new SimpleResponse($statusCode, $headers, $responseBody);
    }
}
