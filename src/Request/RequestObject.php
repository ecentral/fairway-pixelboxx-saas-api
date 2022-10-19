<?php

declare(strict_types = 1);

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
