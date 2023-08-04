<?php

declare(strict_types=1);

/*
 * This file is part of the "fairway_pixelboxx_saas_api" library by eCentral GmbH.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace Fairway\PixelboxxSaasApi\Request\Assets;

use Fairway\PixelboxxSaasApi\PixelboxxResourceName;
use Fairway\PixelboxxSaasApi\Request\AbstractBasicRequest;
use Fairway\PixelboxxSaasApi\Response\AssetResponseObject;

final class AssetMetadata extends AbstractBasicRequest
{
    private ?PixelboxxResourceName $assetId;
    private bool $full = false;
    private bool $localizedValues = false;
    private bool $allMeta = false;
    private bool $localizedNames = false;

    public function __construct(PixelboxxResourceName $assetId = null)
    {
        $this->assetId = $assetId;
    }

    public function getMethod(): string
    {
        return self::GET;
    }

    public function getQueryParams(): array
    {
        return [
            'full' => $this->full,
            'localized_names' => $this->localizedNames,
            'allmeta' => $this->allMeta,
            'localized_values' => $this->localizedValues,
        ];
    }

    public function getUriPart(): string
    {
        return 'assets/{assetId}';
    }

    public function getPathParams(): array
    {
        return [
            'assetId' => (string)$this->getAssetId(),
        ];
    }

    public function getResponseObject(): ?AssetResponseObject
    {
        return new AssetResponseObject();
    }

    public function getAssetId(): ?PixelboxxResourceName
    {
        return $this->assetId;
    }

    public function setAssetId(?PixelboxxResourceName $assetId): self
    {
        $this->assetId = $assetId;
        return $this;
    }

    public function setFull(bool $full): self
    {
        $this->full = $full;
        return $this;
    }

    public function setAllMeta(bool $allMeta): self
    {
        $this->allMeta = $allMeta;
        return $this;
    }

    public function setLocalizedValues(bool $localizedValues): self
    {
        $this->localizedValues = $localizedValues;
        return $this;
    }

    public function setLocalizedNames(bool $localizedNames): self
    {
        $this->localizedNames = $localizedNames;
        return $this;
    }
}
