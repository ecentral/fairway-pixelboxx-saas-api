<?php

declare(strict_types = 1);

//test('Get Root Folder Assets', function () {
//    $client = authenticate();
//
//    $rootFolder = $client->folders()->getFolderStructure()->getFolder();
//    expect($rootFolder->isRootFolder())->toBeTrue();
//    it('throws an exception when trying to get assets from root', function () use($client, $rootFolder) {
//        $client->folders()->getFolderAssets((string)$rootFolder->getId());
//    })->throws(\Exception::class, 'Assets cannot be uploaded or retrieved from root folder');
//})->group('Folders');

test('Get first child folder assets', function () {
    $client = authenticate();

    $rootFolder = $client->folders()->getFolderStructure()->getFolder();
    expect($rootFolder->hasChildFolders())->toBeTrue();
    $childFolder = $rootFolder->getChildFolders()[0];
    expect($client->folders()->getFolderAssets($childFolder->getId())->getFolder()->hasAssets())->toBeTrue();
})->group('Folders');
