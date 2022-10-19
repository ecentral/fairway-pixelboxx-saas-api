<?php

declare(strict_types=1);

namespace Fairway\PixelboxxSaasApi\Model;

use Fairway\PixelboxxSaasApi\PixelboxxResourceName;

final class Folder implements PixelboxxObjectInterface
{
    private string $viewTag;
    private string $name;
    private bool $readOnly;
    private PixelboxxResourceName $owner;
    private PixelboxxResourceName $id;
    private string $icon;

    /**
     * @var array<string, string>
     */
    private array $localizedNames = [];

    /**
     * @var Folder[]
     */
    private array $childFolders = [];

    /**
     * @var Asset[]
     */
    private array $assets = [];

    /**
     * @see self::createFromArray()
     */
    private function __construct()
    {
    }

    public static function createFromArray(array $data): self
    {
        if (!isset($data['name'], $data['owner'], $data['_id'])) {
            throw new \Exception('Name, Id and/or Owner missing in data');
        }
        $self = new self();
        $self->viewTag = $data['viewtag'] ?? '';
        $self->name = $data['name'] ?? '';
        $self->icon = $data['icon'] ?? '';
        $self->readOnly = (bool)($data['readonly'] ?? false);
        $self->owner = new PixelboxxResourceName($data['owner']);
        $self->id = new PixelboxxResourceName($data['_id']);
        $self->localizedNames = $data['localized_names'] ?? [];

        if (isset($data['assets']) && is_array($data['assets'])) {
            foreach ($data['assets'] as $asset) {
                $self->assets[] = Asset::createFromArray($asset);
            }
        }

        if (isset($data['child_folders']) && is_array($data['child_folders'])) {
            foreach ($data['child_folders'] as $childFolder) {
                $self->childFolders[] = self::createFromArray($childFolder);
            }
        }

        return $self;
    }

    public function isRootFolder(): bool
    {
        return $this->id->getResourceType() === PixelboxxResourceName::FOLDER && $this->id->getResourceId() === '0';
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getId(): PixelboxxResourceName
    {
        return $this->id;
    }

    public function getViewTag(): string
    {
        return $this->viewTag;
    }

    public function isReadOnly(): bool
    {
        return $this->readOnly;
    }

    public function getOwner(): PixelboxxResourceName
    {
        return $this->owner;
    }

    public function getIcon(): string
    {
        return $this->icon;
    }

    public function getLocalizedName(string $locale): ?string
    {
        return $this->localizedNames[$locale] ?? null;
    }

    /**
     * @return Folder[]
     */
    public function getChildFolders(): array
    {
        return $this->childFolders ?? [];
    }

    /**
     * @return Asset[]
     */
    public function getAssets(): array
    {
        return $this->assets ?? [];
    }

    public function hasChildFolders(): bool
    {
        return count($this->getChildFolders()) > 0;
    }

    public function hasAssets(): bool
    {
        return count($this->getAssets()) > 0;
    }
}
