<?php

declare(strict_types = 1);

namespace Fairway\PixelboxxSaasApi\Request\Assets;

use Fairway\PixelboxxSaasApi\PixelboxxResourceName;
use Fairway\PixelboxxSaasApi\Request\AbstractBasicRequest;
use Fairway\PixelboxxSaasApi\Response\DownloadResponseObject;
use Fairway\PixelboxxSaasApi\Response\ResponseObject;

final class DownloadAsset extends AbstractBasicRequest
{
    private PixelboxxResourceName $prn;

    public function __construct(PixelboxxResourceName $prn)
    {
        $this->prn = $prn;
    }

    public function getPathParams(): array
    {
        return [
            'prn' => (string)$this->prn,
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
        return new DownloadResponseObject();
    }
}
