<?php
declare(strict_types=1);

namespace Fairway\PixelboxxSaasApi\Response;


use Fairway\CantoSaasApi\Http\ResponseInterface;

final class FolderStructureResponseObject implements ResponseObject
{
    public function fromArray(array $response): ResponseObject
    {
        var_dump($response);
        die();
        $self = new self();
        return $self;
    }

    public function fromResponse(ResponseInterface $response)
    {
        // TODO: Implement fromResponse() method.
    }
}
