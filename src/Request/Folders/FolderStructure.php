<?php

declare(strict_types=1);

namespace Fairway\PixelboxxSaasApi\Request\Folders;

use Fairway\PixelboxxSaasApi\Request\AbstractBasicRequest;
use Fairway\PixelboxxSaasApi\Response\FolderStructureResponseObject;
use Fairway\PixelboxxSaasApi\Response\ResponseObject;

final class FolderStructure extends AbstractBasicRequest
{
    public const ACCESS_TYPE_VIEW = 'View';
    public const ACCESS_TYPE_IMPORT = 'Import';

    private ?string $folderId;
    private int $page;
    private int $itemsPerPage;
    private int $depth;
    private string $accessType = self::ACCESS_TYPE_VIEW;

    public function __construct(string $folderId = null)
    {
        $this->folderId = $folderId;
    }

    public function getMethod(): string
    {
        return self::GET;
    }

    public function getUriPart(): string
    {
        if ($this->folderId !== null) {
            return 'folders/{folderId}';
        }
        return 'folders';
    }

    public function getPathParams(): array
    {
        if ($this->folderId !== null) {
            return [
                'folderId' => $this->folderId,
            ];
        }
        return [];
    }

    public function getResponseObject(): ?ResponseObject
    {
        return new FolderStructureResponseObject();
    }

    public function getFolderId(): ?string
    {
        return $this->folderId;
    }

    public function setFolderId(?string $folderId): self
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
