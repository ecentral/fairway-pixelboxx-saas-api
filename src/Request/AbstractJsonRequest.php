<?php

declare(strict_types = 1);

namespace Fairway\PixelboxxSaasApi\Request;

abstract class AbstractJsonRequest implements RequestObject
{
    public function getQueryParams(): array
    {
        return [];
    }

    public function getPathParams(): array
    {
        return [];
    }

    public function getOptions(): array
    {
        return [
            'json' => $this->getJson(),
        ];
    }

    abstract public function getJson(): array;
}
