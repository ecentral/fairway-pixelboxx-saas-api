<?php

declare(strict_types=1);

namespace Fairway\PixelboxxSaasApi\Response;

use Fairway\CantoSaasApi\Http\ResponseInterface;

final class AuthResponseObject implements ResponseObject
{
    public string $accessToken;
    public int $expiresIn;
    public string $type;
    public string $refreshToken;
    public array $data;

    public function fromArray(array $response): ResponseObject
    {
        $this->data = $response;
        $this->accessToken = $response['access_token'];
        $this->expiresIn = (int)$response['expires_in'];
        $this->type = $response['token_type'];
        $this->refreshToken = $response['refresh_token'];
        return $this;
    }

    public function fromResponse(ResponseInterface $response)
    {
    }
}
