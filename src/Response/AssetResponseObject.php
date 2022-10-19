<?php

declare(strict_types=1);

/*
 * This file is part of the "fairway_pixelboxx_saas_api" library by eCentral GmbH.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace Fairway\PixelboxxSaasApi\Response;

use Fairway\PixelboxxSaasApi\Model\Asset;

final class AssetResponseObject extends ResponseObjectAbstract
{
    public array $data;
    private Asset $asset;

    public function getResponseType(): string
    {
        return 'array';
    }

    public function fromArray(array $response): ResponseObject
    {
        $this->data = $response;
        $this->asset = Asset::createFromArray($response);
        return $this;
    }

    public function getAsset(): Asset
    {
        return $this->asset;
    }
}
