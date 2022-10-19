<?php

declare(strict_types = 1);

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
