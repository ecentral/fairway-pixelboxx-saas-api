<?php

declare(strict_types=1);

/*
 * This file is part of the "fairway_pixelboxx_saas_api" library by eCentral GmbH.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace Fairway\PixelboxxSaasApi\Response;

final class DownloadResponseObject extends ResponseObjectAbstract
{
    public string $data;

    public function getResponseType(): string
    {
        return 'contents';
    }

    public function fromContents(string $contents): ResponseObject
    {
        $this->data = $contents;

        return $this;
    }

    public function getContent(): string
    {
        return $this->data;
    }
}
