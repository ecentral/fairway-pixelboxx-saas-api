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
