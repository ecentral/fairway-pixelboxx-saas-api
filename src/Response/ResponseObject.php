<?php

declare(strict_types = 1);

namespace Fairway\PixelboxxSaasApi\Response;

interface ResponseObject
{
    public function getResponseType(): string;

    public function fromArray(array $response): ResponseObject;

    public function fromContents(string $contents): ResponseObject;
}
