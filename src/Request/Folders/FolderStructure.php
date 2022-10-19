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

final class FolderStructure extends AbstractBasicRequest
{
    public const ACCESS_TYPE_VIEW = 'View';
    public const ACCESS_TYPE_IMPORT = 'Import';

    private ?PixelboxxResourceName $folderId;
    private int $page = 1;
    private int $itemsPerPage = 10;
    private int $depth = 10;
    private string $accessType = self::ACCESS_TYPE_VIEW;

    public function __construct(PixelboxxResourceName $folderId = null)
    {
        $this->folderId = $folderId;
    }

    public function getMethod(): string
    {
        return self::GET;
    }

    public function getUriPart(): string
    {
        if ($this->folderId !== null && !$this->folderId->isForRootFolder()) {
            return 'folders/{folderId}';
        }

        return 'folders';
    }

    public function getPathParams(): array
    {
        if ($this->folderId !== null) {
            return [
                'folderId' => (string)$this->folderId,
            ];
        }

        return [];
    }

    public function getQueryParams(): array
    {
        return [
            'page' => $this->getPage(),
            'per_page' => $this->getItemsPerPage(),
            'depth' => $this->getDepth(),
            'accessType' => $this->getAccessType(),
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

    public function setAccessType(string $accessType): FolderStructure
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
