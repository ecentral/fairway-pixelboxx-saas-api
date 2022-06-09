<?php

declare(strict_types=1);

namespace Fairway\PixelboxxSaasApi\Request\Assets;

use Fairway\PixelboxxSaasApi\Request\AbstractBasicRequest;
use Fairway\PixelboxxSaasApi\Response\ResponseObject;

final class DownloadAsset extends AbstractBasicRequest
{
    private string $prn;

    public function __construct(string $prn)
    {
        $this->prn = $prn;
    }

    public function getPathParams(): array
    {
        return [
            'prn' => $this->prn,
        ];
    }

    public function getMethod(): string
    {
        return AbstractBasicRequest::GET;
    }

    public function getUriPart(): string
    {
        return 'assets/{prn}/download';
    }

    public function getResponseObject(): ?ResponseObject
    {
        return null;
    }
}
