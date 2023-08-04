<?php

declare(strict_types=1);

/*
 * This file is part of the "fairway_pixelboxx_saas_api" library by eCentral GmbH.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace Fairway\PixelboxxSaasApi\Request\Assets;

use Fairway\PixelboxxSaasApi\PixelboxxResourceName;
use Fairway\PixelboxxSaasApi\Request\AbstractBasicRequest;
use Fairway\PixelboxxSaasApi\Response\AssetThumbnailResponseObject;
use Fairway\PixelboxxSaasApi\Response\ResponseObject;

final class AssetThumbnail extends AbstractBasicRequest
{
    private PixelboxxResourceName $assetId;
    public function __construct(PixelboxxResourceName $assetId)
    {
        $this->assetId = $assetId;
    }

    public function getMethod(): string
    {
        return self::GET;
    }

    public function getUriPart(): string
    {
        return 'thumbnails/{assetId}/url';
    }

    public function getPathParams(): array
    {
        return [
            'assetId' => (string)$this->assetId,
        ];
    }

    public function getResponseObject(): ?ResponseObject
    {
        return new AssetThumbnailResponseObject();
    }
}
