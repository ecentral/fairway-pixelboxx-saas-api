<?php

declare(strict_types = 1);

namespace Fairway\PixelboxxSaasApi\Endpoint;

use Fairway\PixelboxxSaasApi\Client;
use Fairway\PixelboxxSaasApi\PixelboxxResourceName;
use Fairway\PixelboxxSaasApi\Request\Assets\AssetMetadata;
use Fairway\PixelboxxSaasApi\Request\Assets\AssetThumbnail;
use Fairway\PixelboxxSaasApi\Request\Assets\DownloadAsset;
use Fairway\PixelboxxSaasApi\Response\AssetResponseObject;
use Fairway\PixelboxxSaasApi\Response\AssetThumbnailResponseObject;
use Fairway\PixelboxxSaasApi\Response\DownloadResponseObject;

final class Assets
{
    private Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @param PixelboxxResourceName|string|null $assetId
     * @param callable(AssetMetadata $structure): void|null $applyParameters
     * @return null|AssetResponseObject
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getAsset($assetId = null, callable $applyParameters = null): ?AssetResponseObject
    {
        if (is_string($assetId)) {
            $assetId = new PixelboxxResourceName($assetId);
        }
        $request = new AssetMetadata($assetId);
        if ($applyParameters) {
            $applyParameters($request);
        }

        /** @var AssetResponseObject */
        return $this->client->request($request);
    }

    /**
     * @param PixelboxxResourceName|string|null $assetId
     * @return DownloadResponseObject
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function downloadAsset($assetId = null): DownloadResponseObject
    {
        if (is_string($assetId)) {
            $assetId = new PixelboxxResourceName($assetId);
        }
        $request = new DownloadAsset($assetId);

        /** @var DownloadResponseObject */
        return $this->client->request($request);
    }

    /**
     * @param PixelboxxResourceName|string $assetId
     * @return AssetThumbnailResponseObject
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getThumbnail($assetId): AssetThumbnailResponseObject
    {
        if (is_string($assetId)) {
            $assetId = new PixelboxxResourceName($assetId);
        }
        if (!($assetId instanceof PixelboxxResourceName)) {
            throw new \Exception('AssetId is required and needs to be either string or a PixelboxxResourceName-Object');
        }
        /** @var AssetThumbnailResponseObject */
        return $this->client->request(new AssetThumbnail($assetId));
    }
}
