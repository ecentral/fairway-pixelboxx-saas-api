<?php

declare(strict_types=1);

/*
 * This file is part of the "fairway_pixelboxx_saas_api" library by eCentral GmbH.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace Fairway\PixelboxxSaasApi\Endpoint;

use Fairway\PixelboxxSaasApi\Client;
use Fairway\PixelboxxSaasApi\PixelboxxResourceName;
use Fairway\PixelboxxSaasApi\Request\Folders\FolderAssets;
use Fairway\PixelboxxSaasApi\Request\Folders\FolderStructure;
use Fairway\PixelboxxSaasApi\Response\FolderResponseObject;

final class Folders
{
    private Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @param PixelboxxResourceName|string|null $folderId
     * @param callable(FolderStructure $structure): void|null $applyParameters
     * @return FolderResponseObject
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getFolderStructure($folderId = null, callable $applyParameters = null): ?FolderResponseObject
    {
        if (is_string($folderId)) {
            $folderId = new PixelboxxResourceName($folderId);
        }
        $request = new FolderStructure($folderId);
        if ($applyParameters) {
            $applyParameters($request);
        }

        /** @var FolderResponseObject */
        return $this->client->request($request);
    }

    /**
     * @param PixelboxxResourceName|string|null $folderId
     * @param callable(FolderAssets $structure): void|null $applyParameters
     * @return FolderResponseObject|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getFolderAssets($folderId = null, callable $applyParameters = null): ?FolderResponseObject
    {
        if (is_string($folderId)) {
            $folderId = new PixelboxxResourceName($folderId);
        }
        $request = new FolderAssets($folderId);
        if ($applyParameters) {
            $applyParameters($request);
        }

        /** @var FolderResponseObject */
        return $this->client->request($request);
    }
}
