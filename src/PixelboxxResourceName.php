<?php

declare(strict_types=1);

namespace Fairway\PixelboxxSaasApi;

/**
 * @see https://pixelboxx.pages.pixelboxx.io/docs/rest/docs/rest-api/prn/
 *
 * Every ID can be transformed into and from this format
 *
 * Format:
 * prn:serverId:tenant:reserved:service:reserved:reserved:resource-type,resource-id
 */
final class PixelboxxResourceName
{
    public const ASSET = 'asset';
    public const FOLDER = 'folder';
    public const USER = 'user';
    public const TYPE_GROUP = 'type-group';

    private ?string $tenant;
    private ?string $serverId;
    private ?string $service;
    private ?string $resourceType;
    private ?string $resourceId;
    /** @var string[] */
    private array $reserved = [];

    public function __construct(string $identifier)
    {
        if (!str_starts_with($identifier, 'prn')) {
            throw new \Exception(sprintf('The provided identifier (%s) is not a valid PRN string', $identifier));
        }
        $chunks = explode(':', $identifier);
        if (count($chunks) !== 8) {
            throw new \Exception('Identifier does not follow the defined PRN Format - it must consist of 8 colon-seperated chunks');
        }
        if (str_contains($chunks[7] ?? '', ',')) {
            $data = explode(',', $chunks[7], 2);
            $this->resourceType = $data[0];
            $this->resourceId = $data[1];
        }
        $this->serverId = $chunks[1];
        $this->tenant = $chunks[2];
        $this->service = $chunks[4];
        $this->reserved = [
            $chunks[3] ?? '',
            $chunks[5] ?? '',
            $chunks[6] ?? '',
        ];
    }

    public function getResourceType(): ?string
    {
        return $this->resourceType;
    }

    public function getResourceId(): ?string
    {
        return $this->resourceId;
    }

    public static function prnFromResource(Client $client, string $resourceType, string $resourceId): self
    {
        if ($resourceId === '') {
            $resourceId = '0';
        }
        $self = new self('prn:pboxx-pixelboxx::::::'); // prn:pboxx-pixelboxx:default:::::folder,0
        $self->resourceType = $resourceType;
        $self->resourceId = $resourceId;
        $self->serverId = $client->getOptions()->getServerId();
        $self->tenant = $client->getOptions()->getTenant();
        return $self;
    }

    public function isForRootFolder(): bool
    {
        return $this->getResourceType() === self::FOLDER && $this->getResourceId() === '0';
    }

    public function __toString(): string
    {
        return sprintf(
            'prn:%s:%s:%s:%s:%s:%s:%s,%s',
            $this->serverId,
            $this->tenant,
            $this->reserved[0] ?? '',
            $this->service,
            $this->reserved[1] ?? '',
            $this->reserved[2] ?? '',
            $this->resourceType,
            $this->resourceId,
        );
    }
}
