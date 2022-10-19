<?php

declare(strict_types=1);

/*
 * This file is part of the "fairway_pixelboxx_saas_api" library by eCentral GmbH.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace Fairway\PixelboxxSaasApi\Response;

final class AssetThumbnailResponseObject extends ResponseObjectAbstract
{
    private array $data;
    public function fromArray(array $response): ResponseObject
    {
        $this->data = $response;
        return $this;
    }

    public function getUrl(): string
    {
        return $this->data['href'] ?? '';
    }
}
