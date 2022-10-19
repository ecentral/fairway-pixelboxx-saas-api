<?php

declare(strict_types = 1);

use Fairway\PixelboxxSaasApi\Request\Folders\FolderStructure;

test('Get Root Folder Structure', function () {
    $client = authenticate();

    $folderStructure = $client->folders()->getFolderStructure();
    expect($folderStructure->getFolder()->getId()->getResourceId())->toBe('0');
    expect($folderStructure->getFolder()->isRootFolder())->toBeTrue();
    expect($folderStructure->getFolder()->hasChildFolders())->toBeTrue();
})->group('Folders');

test('Get Root Folder Structure limit page items to 1', function () {
    $client = authenticate();

    $folderStructure = $client->folders()->getFolderStructure(null, function (FolderStructure $request) {
        $request->setItemsPerPage(1);
    });
    expect($folderStructure->getFolder()->getId()->getResourceId())->toBe('0');
    expect($folderStructure->getFolder()->hasChildFolders())->toBeTrue();
    expect(count($folderStructure->getFolder()->getChildFolders()))->toBe(1);
})->group('Folders');

test('Get Folder Structure with specific ID', function () {
    $client = authenticate();

    $folderStructure = $client->folders()->getFolderStructure();
    expect($folderStructure->getFolder()->hasChildFolders())->toBeTrue();
    $childFolder = $folderStructure->getFolder()->getChildFolders()[0];

    $subFolder = $client->folders()->getFolderStructure($childFolder->getId());
    expect((string)$subFolder->getFolder()->getId())->toBe((string)$childFolder->getId());
})->group('Folders');
