<?php

declare(strict_types=1);

/*
 * This file is part of the "fairway_pixelboxx_saas_api" library by eCentral GmbH.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace Fairway\PixelboxxSaasApi\Request;

use Fairway\PixelboxxSaasApi\Response\AuthResponseObject;
use Fairway\PixelboxxSaasApi\Response\ResponseObject;

final class AuthRequest implements RequestObject
{
    private string $username;
    private string $password;

    public function __construct(string $username, string $password)
    {
        $this->username = $username;
        $this->password = $password;
    }

    public function getMethod(): string
    {
        return 'POST';
    }

    public function getUriPart(): string
    {
        return 'authenticate/login';
    }

    public function getQueryParams(): array
    {
        return [];
    }

    public function getPathParams(): array
    {
        return [];
    }

    public function getOptions(): array
    {
        return [
            'auth' => [$this->username, $this->password],
        ];
    }

    /**
     * @return ResponseObject<AuthResponseObject>
     */
    public function getResponseObject(): ResponseObject
    {
        return new AuthResponseObject();
    }
}
