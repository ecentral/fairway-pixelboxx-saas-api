<?php
declare(strict_types=1);

namespace Fairway\PixelboxxSaasApi\Response;

use Fairway\CantoSaasApi\Http\ResponseInterface;

interface ResponseObject
{
    public function fromArray(array $response): ResponseObject;

    public function fromResponse(ResponseInterface $response);
}
