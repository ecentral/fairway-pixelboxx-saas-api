<?php

declare(strict_types=1);

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
