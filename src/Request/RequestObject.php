<?php

declare(strict_types=1);

/*
 * This file is part of the "fairway_pixelboxx_saas_api" library by eCentral GmbH.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace Fairway\PixelboxxSaasApi\Request;

use Fairway\PixelboxxSaasApi\Response\ResponseObject;

/**
 * @template T of ResponseObject
 */
interface RequestObject
{
    public function getMethod(): string;

    public function getUriPart(): string;

    public function getQueryParams(): array;

    public function getPathParams(): array;

    public function getOptions(): array;

    /**
     * @return T|null
     */
    public function getResponseObject(): ?ResponseObject;
}
