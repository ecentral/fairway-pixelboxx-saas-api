<?php

declare(strict_types=1);

/*
 * This file is part of the "fairway_pixelboxx_saas_api" library by eCentral GmbH.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace Fairway\PixelboxxSaasApi\Request\Folders;

use Fairway\PixelboxxSaasApi\PixelboxxResourceName;
use Fairway\PixelboxxSaasApi\Request\AbstractBasicRequest;
use Fairway\PixelboxxSaasApi\Response\FolderResponseObject;

final class FolderAssets extends AbstractBasicRequest
{
    public const ACCESS_TYPE_VIEW = 'View';
    public const ACCESS_TYPE_IMPORT = 'Import';

    private ?PixelboxxResourceName $folderId = null;
    private int $page = 1;
    private int $itemsPerPage = 10;
    private int $depth = 100;
    private bool $withChildren = false;
    private string $accessType = self::ACCESS_TYPE_VIEW;

    public function __construct(PixelboxxResourceName $folderId = null)
    {
        $this->folderId = $folderId;
    }

    public function getMethod(): string
    {
        return self::POST;
    }

    public function getUriPart(): string
    {
        return 'folders/{folderId}/content';
    }

    public function getQueryParams(): array
    {
        return [
            'page' => $this->page,
            'per_page' => $this->itemsPerPage,
            'depth' => $this->depth,
            'with_children' => $this->withChildren,
        ];
    }

    public function getOptions(): array
    {
        return [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'body' => json_encode([
                'sort' => [
                    'key' => 'oid',
                    'direction' => 'asc',
                ],
            ]),
        ];
    }

    public function getPathParams(): array
    {
        return [
            'folderId' => (string)$this->folderId,
        ];
    }

    public function getResponseObject(): ?FolderResponseObject
    {
        return new FolderResponseObject();
    }

    public function getFolderId(): ?PixelboxxResourceName
    {
        return $this->folderId;
    }

    public function setFolderId(?PixelboxxResourceName $folderId): self
    {
        $this->folderId = $folderId;

        return $this;
    }

    public function getAccessType(): string
    {
        return $this->accessType;
    }

    public function setAccessType(string $accessType): FolderAssets
    {
        $this->accessType = $accessType;

        return $this;
    }

    public function getDepth(): int
    {
        return $this->depth;
    }

    public function setDepth(int $depth): self
    {
        $this->depth = $depth;

        return $this;
    }

    public function getItemsPerPage(): int
    {
        return $this->itemsPerPage;
    }

    public function setItemsPerPage(int $itemsPerPage): self
    {
        $this->itemsPerPage = $itemsPerPage;

        return $this;
    }

    public function getPage(): int
    {
        return $this->page;
    }

    public function setPage(int $page): self
    {
        $this->page = $page;

        return $this;
    }
}
