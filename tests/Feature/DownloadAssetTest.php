<?php

declare(strict_types=1);

/*
 * This file is part of the "fairway_pixelboxx_saas_api" library by eCentral GmbH.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

test('Download Asset', function () {
    $client = authenticate();

    $folderStructure = $client->folders()->getFolderStructure();
    expect($folderStructure->getFolder()->hasChildFolders())->toBeGreaterThan(0);

    $folder = $folderStructure->getFolder()->getChildFolders()[0];
    $folder = $client->folders()->getFolderAssets($folder->getId())->getFolder();
    expect($folder->hasAssets())->toBeTrue();

    $asset = $folder->getAssets()[0];
    $content = $client->assets()->downloadAsset($asset->getId())->getContent();
    expect($content)->not()->toBeEmpty();
})->group('Assets');
