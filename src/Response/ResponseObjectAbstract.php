<?php

declare(strict_types=1);

/*
 * This file is part of the "fairway_pixelboxx_saas_api" library by eCentral GmbH.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace Fairway\PixelboxxSaasApi\Response;

abstract class ResponseObjectAbstract implements ResponseObject
{
    public function getResponseType(): string
    {
        return 'array';
    }

    public function fromArray(array $response): ResponseObject
    {
        throw new \Exception('Not implemented yet.', 1655828478);
    }

    public function fromContents(string $contents): ResponseObject
    {
        throw new \Exception('Not implemented yet.', 1655828478);
    }
}
