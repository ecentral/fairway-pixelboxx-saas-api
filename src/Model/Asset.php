<?php

declare(strict_types=1);

/*
 * This file is part of the "fairway_pixelboxx_saas_api" library by eCentral GmbH.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace Fairway\PixelboxxSaasApi\Model;

use Fairway\PixelboxxSaasApi\PixelboxxResourceName;

final class Asset implements PixelboxxObjectInterface
{
    private string $name;
    private PixelboxxResourceName $id;
    private ?string $assetType;
    private ?string $thumbnailUrl;
    private string $created;
    /**
     * @var MetadataGroup[]
     */
    private array $metadata = [];
    /**
     * @var PixelboxxResourceName[]
     */
    private array $containingFolders = [];

    /**
     * @see self::createFromArray()
     */
    private function __construct()
    {
    }

    public static function createFromArray(array $data): self
    {
        $self = new self();
        if (!isset($data['name'], $data['_id'])) {
            throw new \Exception('Name and/or Id missing in data');
        }

        $self->id = new PixelboxxResourceName($data['_id']);
        $self->name = $data['name'];
        $self->assetType = $data['asset_type'] ?? null;
        $self->thumbnailUrl = $data['thumbnail_url'] ?? null;
        $self->created = $data['created'] ?? '';

        foreach ($data['containingFolders'] ?? [] as $containingFolderPrn) {
            $self->containingFolders[] = new PixelboxxResourceName($containingFolderPrn);
        }

        foreach ($data['metadata'] ?? [] as $metadata) {
            $self->metadata[] = MetadataGroup::createFromArray($metadata);
        }

        return $self;
    }

    public function getAssetType(): ?string
    {
        return $this->assetType;
    }

    /**
     * @return PixelboxxResourceName[]
     */
    public function getContainingFolders(): array
    {
        return $this->containingFolders;
    }

    public function getCreated(): string
    {
        return $this->created;
    }

    public function getMetadata(): array
    {
        return $this->metadata;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getId(): PixelboxxResourceName
    {
        return $this->id;
    }

    public function getThumbnailUrl(): ?string
    {
        return $this->thumbnailUrl;
    }

    public function getMetadataByPropertyId(string $propertyId, string $groupId = null): ?Metadata
    {
        foreach ($this->metadata as $item) {
            if ($groupId !== null && $item->getGroupId() !== $groupId) {
                continue;
            }
            $result = $item->getMetadataByPropertyId($propertyId);
            if ($result !== null) {
                return $result;
            }
        }
        return null;
    }
}
