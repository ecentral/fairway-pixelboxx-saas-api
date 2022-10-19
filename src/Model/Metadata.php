<?php

declare(strict_types=1);

namespace Fairway\PixelboxxSaasApi\Model;

final class Metadata
{
    private string $propertyId;
    private string $namespaceId = '';
    private string $displayName;
    private bool $readOnly;
    private string $type;
    private string $maxValue = '';
    private string $minValue = '';

    /**
     * @var array<string, string>
     */
    private array $localizedNames = [];
    /**
     * @var array<string, string>
     */
    private array $localizedValues = [];
    private string $value = '';
    private string $uiPresentation = '';

    public static function createFromArray(array $data): self
    {
        $self = new self();

        if (!isset($data['property_id'], $data['display_name'], $data['type'])) {
            throw new \Exception('Missing property_id, display_name, and/or type in data');
        }

        $self->propertyId = $data['property_id'];
        $self->displayName = $data['display_name'];
        $self->type = $data['type'];

        $self->maxValue = $data['max_value'] ?? '';
        $self->minValue = $data['min_value'] ?? '';
        $self->readOnly = $data['readonly'] ?? false;
        $self->value = $data['value'] ?? '';
        $self->namespaceId = $data['namespace_id'] ?? '';
        $self->uiPresentation = $data['ui_presentation'] ?? '';

        $self->localizedNames = $data['localized_names'] ?? [];
        $self->localizedValues = $data['localized_values'] ?? [];

        return $self;
    }

    public function getPropertyId(): string
    {
        return $this->propertyId;
    }

    public function getNamespaceId(): string
    {
        return $this->namespaceId;
    }

    public function getDisplayName(): string
    {
        return $this->displayName;
    }

    public function isReadOnly(): bool
    {
        return $this->readOnly;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getMaxValue(): string
    {
        return $this->maxValue;
    }

    public function getMinValue(): string
    {
        return $this->minValue;
    }

    public function getLocalizedName(string $locale): ?string
    {
        return $this->localizedNames[$locale] ?? null;
    }

    public function getLocalizedValue(string $locale): ?string
    {
        return $this->localizedValues[$locale] ?? null;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function getUiPresentation(): string
    {
        return $this->uiPresentation;
    }
}
