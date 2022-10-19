<?php

declare(strict_types=1);

namespace Fairway\PixelboxxSaasApi\Model;

final class MetadataGroup
{
    private string $groupName;
    private string $groupId;

    /**
     * @var Metadata[]
     */
    private array $properties = [];

    public static function createFromArray(array $data): self
    {
        $self = new self();

        if (!isset($data['group_name'], $data['group_id'])) {
            throw new \Exception('Missing group_name and/or group_id in data');
        }

        $self->groupId = $data['group_id'];
        $self->groupName = $data['group_name'];
        foreach ($data['properties'] ?? [] as $property) {
            $self->properties[] = Metadata::createFromArray($property);
        }

        return $self;
    }

    /**
     * @return Metadata[]
     */
    public function getProperties(): array
    {
        return $this->properties;
    }

    public function getGroupName(): string
    {
        return $this->groupName;
    }

    public function getGroupId(): string
    {
        return $this->groupId;
    }

    public function getMetadataByPropertyId(string $propertyId): ?Metadata
    {
        foreach ($this->properties as $property) {
            if ($property->getPropertyId() === $propertyId) {
                return $property;
            }
        }
        return null;
    }
}
