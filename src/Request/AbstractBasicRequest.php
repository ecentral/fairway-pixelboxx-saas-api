<?php

declare(strict_types=1);

/*
 * This file is part of the "fairway_pixelboxx_saas_api" library by eCentral GmbH.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace Fairway\PixelboxxSaasApi\Request;

abstract class AbstractBasicRequest implements RequestObject
{
    public const GET = 'GET';
    public const POST = 'POST';
    public const PUT = 'PUT';
    public const DELETE = 'DELETE';
    public const PATCH = 'PATCH';

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
        return [];
    }
}
