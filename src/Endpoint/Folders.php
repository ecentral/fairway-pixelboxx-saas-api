<?php
declare(strict_types=1);

namespace Fairway\PixelboxxSaasApi\Endpoint;


use Fairway\PixelboxxSaasApi\Client;
use Fairway\PixelboxxSaasApi\Request\Folders\FolderStructure;
use Fairway\PixelboxxSaasApi\Response\FolderStructureResponseObject;

final class Folders
{
    private Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function getFolderStructureByIdWithNestedFolders(string $folderId, array $parameters = []): FolderStructureResponseObject
    {
        $request = new FolderStructure($folderId);
        return $this->client->request($request);
    }

    public function getFolderStructure(array $parameters = []): FolderStructureResponseObject
    {
        $request = new FolderStructure(null);
        return $this->client->request($request);
    }
}
