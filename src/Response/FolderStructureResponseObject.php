<?php

declare(strict_types=1);

/*
 * This file is part of the "fairway_pixelboxx_saas_api" library by eCentral GmbH.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

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
