<?php

/*
 * This file is part of the "fairway_pixelboxx_saas_api" library by eCentral GmbH.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

use Fairway\PixelboxxSaasApi\PixelboxxResourceName;
use Fairway\PixelboxxSaasApi\Request\Assets\AssetMetadata;

test('Get Asset with Metadata', function () {
    $client = authenticate();

    $folderStructure = $client->folders()->getFolderStructure();
    expect($folderStructure->getFolder()->hasChildFolders())->toBeGreaterThan(0);

    $folder = $folderStructure->getFolder()->getChildFolders()[0];
    $folder = $client->folders()->getFolderAssets($folder->getId())->getFolder();
    expect($folder->hasAssets())->toBeTrue();

    $asset = $folder->getAssets()[0];
    $assetMetadata = $client->assets()->getAsset($asset->getId(), function (AssetMetadata $metadata) {
        $metadata->setFull(true);
        $metadata->setAllMeta(true);
    });
    expect(count($assetMetadata->getAsset()->getMetadata()))->toBeGreaterThan(0);
})->group('Assets');

test('Get a non-existing file', function () {
    $client = authenticate();

    $asset = $client->assets()->getAsset(PixelboxxResourceName::prnFromResource($client, PixelboxxResourceName::ASSET, '99999'));
    expect($asset)->toBeNull();
})->group('Assets');
