<?php

declare(strict_types = 1);

namespace Fairway\PixelboxxSaasApi\Request;

abstract class AbstractBasicRequest implements RequestObject
{
    public const GET = 'GET';
    public const POST = 'POST';
    public const PUT = 'PUT';
    public const DELETE = 'DELETE';
    public const PATCH = 'PATCH';

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
        return [];
    }
}
