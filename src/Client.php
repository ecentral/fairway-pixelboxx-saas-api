<?php

declare(strict_types=1);

/*
 * This file is part of the "fairway_pixelboxx_saas_api" library by eCentral GmbH.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace Fairway\PixelboxxSaasApi;

use Fairway\PixelboxxSaasApi\Endpoint\Assets;
use Fairway\PixelboxxSaasApi\Endpoint\Folders;
use Fairway\PixelboxxSaasApi\Request\AuthRequest;
use Fairway\PixelboxxSaasApi\Request\RequestObject;
use Fairway\PixelboxxSaasApi\Response\AuthResponseObject;
use Fairway\PixelboxxSaasApi\Response\ResponseObject;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\ClientException;
use JsonException;
use Psr\Http\Message\ResponseInterface;

final class Client
{
    private ClientOptions $options;
    private ClientInterface $client;
    private string $accessToken = '';
    private AuthResponseObject $authObject;

    public function __construct(ClientOptions $options, ClientInterface $client = null)
    {
        $this->options = $options;
        $this->createGuzzleClient($client);
    }

    public function getOptions(): ClientOptions
    {
        return $this->options;
    }

    public function authenticate(string $username, string $password): self
    {
        $request = new AuthRequest($username, $password);
        $this->authObject = $this->request($request);
        $this->accessToken = $this->authObject->accessToken;

        return $this;
    }

    /**
     * @template T
     * @param RequestObject<T> $requestObject
     * @return ResponseObject
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function request(RequestObject $requestObject): ?ResponseObject
    {
        $options = array_merge_recursive(
            [
                'headers' => ['Authorization' => sprintf('Bearer %s', $this->accessToken)],
            ],
            $requestObject->getOptions(),
        );

        try {
            $response = $this->client->request(
                $requestObject->getMethod(),
                $this->getUri(
                    $requestObject->getUriPart(),
                    $requestObject->getPathParams(),
                    $requestObject->getQueryParams(),
                ),
                $options,
            );
        } catch (ClientException $exception) {
            if ($exception->getResponse()->getStatusCode() === 404) {
                return null;
            }
            throw $exception;
        }

        return $this->responseToObject($response, $requestObject->getResponseObject());
    }

    public function folders(): Folders
    {
        return new Folders($this);
    }

    public function assets(): Assets
    {
        return new Assets($this);
    }

    private function createGuzzleClient(?ClientInterface $client): void
    {
        if ($client === null) {
            $headers = [
                'userAgent' => $this->options->getUserAgent(),
            ];
            if ($this->accessToken) {
                $headers['Authorization'] = sprintf('Bearer %s', $this->accessToken);
            }
            $client = new \GuzzleHttp\Client([
                'allow_redirects' => true,
                'connect_timeout' => $this->options->getTimeout(),
                'debug' => $this->options->isDebug(),
                'headers' => $headers,
            ]);
        }
        $this->client = $client;
    }

    public function getUri(string $part, array $pathVariables = [], array $queryParams = []): string
    {
        $url = $part;
        foreach ($pathVariables as $key => $value) {
            $url = str_replace(sprintf('{%s}', $key), $value, $url);
        }
        if ($queryParams !== []) {
            $url .= '?' . http_build_query($queryParams);
        }

        return sprintf('https://%s/servlet/api/v1.0/%s', $this->options->getDomain(), $url);
    }

    public static function createWithDomain(string $domain): self
    {
        return new self(new ClientOptions($domain));
    }

    public function getAccessToken(): string
    {
        return $this->accessToken;
    }

    /**
     * @template T
     * @phpstan-param class-string<T> $className
     * @phpstan-return T|null
     */
    public function responseToObject(ResponseInterface $response, ResponseObject $responseObject): ?ResponseObject
    {
        $contents = $response->getBody()->getContents();
        $responseType = $responseObject->getResponseType();
        try {
            switch ($responseType) {
                case 'array':
                    $result = json_decode($contents, true, 512, JSON_THROW_ON_ERROR);

                    return $responseObject->fromArray($result);
                case 'contents':
                    return $responseObject->fromContents($contents);
            }
        } catch (JsonException $exception) {
            $this->options->getLogger()->debug('Response is not an array: ' . $exception->getMessage());
        }

        return null;
    }
}
