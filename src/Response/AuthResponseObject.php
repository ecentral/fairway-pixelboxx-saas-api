<?php

declare(strict_types = 1);

namespace Fairway\PixelboxxSaasApi\Response;

final class AuthResponseObject extends ResponseObjectAbstract
{
    public string $accessToken;
    public int $expiresIn;
    public string $type;
    public string $refreshToken;
    public array $data;

    public function getResponseType(): string
    {
        return 'array';
    }

    public function fromArray(array $response): ResponseObject
    {
        $this->data = $response;
        $this->accessToken = $response['access_token'];
        $this->expiresIn = (int)$response['expires_in'];
        $this->type = $response['token_type'];
        $this->refreshToken = $response['refresh_token'];

        return $this;
    }
}
