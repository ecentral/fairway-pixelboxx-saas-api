<?php

declare(strict_types = 1);

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
