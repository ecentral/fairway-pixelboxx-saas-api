<?php

test('Get Folder Structure', function () {
    $client = authenticate();
    var_dump($client->folders()->getFolderStructure());
})->group('Folders');
