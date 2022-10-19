<?php

declare(strict_types=1);

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
