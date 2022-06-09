<?php

declare(strict_types=1);

namespace Fairway\PixelboxxSaasApi\Request;

use Fairway\PixelboxxSaasApi\Response\ResponseObject;

interface RequestObject
{
    public function getMethod(): string;

    public function getUriPart(): string;

    public function getQueryParams(): array;

    public function getPathParams(): array;

    public function getOptions(): array;

    public function getResponseObject(): ?ResponseObject;
}
