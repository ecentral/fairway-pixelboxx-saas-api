<?php

declare(strict_types=1);

/*
 * This file is part of the "fairway_pixelboxx_saas_api" library by eCentral GmbH.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

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
