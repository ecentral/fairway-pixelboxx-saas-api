<?php

declare(strict_types=1);

namespace Fairway\PixelboxxSaasApi\Response;

use Fairway\PixelboxxSaasApi\Model\Folder;

final class FolderResponseObject implements ResponseObject
{
    private array $data;
    private Folder $folder;

    public function getResponseType(): string
    {
        return 'array';
    }

    public function fromArray(array $response): ResponseObject
    {
        $this->data = $response;
        $this->folder = Folder::createFromArray($response);
        return $this;
    }

    public function fromContents(string $contents): ResponseObject
    {
        throw new \Exception(sprintf('Use %s::fromArray', self::class));
    }

    public function getFolder(): Folder
    {
        return $this->folder;
    }

    public function getCount(): int
    {
        if (isset($this->data['_paging'], $this->data['_paging']['total'])) {
            return (int)$this->data['_paging']['total'];
        }
        return count($this->folder->getChildFolders());
    }
}
