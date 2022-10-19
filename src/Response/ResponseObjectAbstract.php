<?php

declare(strict_types = 1);

namespace Fairway\PixelboxxSaasApi\Response;

abstract class ResponseObjectAbstract implements ResponseObject
{
    public function getResponseType(): string
    {
        return 'array';
    }

    public function fromArray(array $response): ResponseObject
    {
        throw new \Exception('Not implemented yet.', 1655828478);
    }

    public function fromContents(string $contents): ResponseObject
    {
        throw new \Exception('Not implemented yet.', 1655828478);
    }
}
