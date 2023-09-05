<?php

declare(strict_types=1);

/*
 * This file is part of the "fairway_pixelboxx_saas_api" library by eCentral GmbH.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

use Fairway\PixelboxxSaasApi\PixelboxxResourceName;

test('Parse owner identifier into Object', function () {
    $identifier = 'prn::default::iam:::user,pbox';
    $prn = new PixelboxxResourceName($identifier);
    expect($prn->getResourceType())->toBe(PixelboxxResourceName::USER);
    expect($prn->getResourceId())->toBe('pbox');
});

test('Parse folder identifier into Object', function () {
    $identifier = 'prn:pboxx-pixelboxx:default:::::folder,315';
    $prn = new PixelboxxResourceName($identifier);
    expect($prn->getResourceType())->toBe(PixelboxxResourceName::FOLDER);
    expect($prn->getResourceId())->toBe('315');
});

test('Parse asset identifier into Object', function () {
    $identifier = 'prn:pbox-pixelboxx:default::collectioning:::asset,532';
    $prn = new PixelboxxResourceName($identifier);
    expect($prn->getResourceType())->toBe(PixelboxxResourceName::ASSET);
    expect($prn->getResourceId())->toBe('532');
});

test('Parse PRN into Object and back into PRN', function () {
    $identifier = 'prn:pboxx-pixelboxx:default:::::folder,315';
    $prn = new PixelboxxResourceName($identifier);
    expect((string)$prn)->toBe($identifier);
});

test('Create PRN from resourceType and resourceId', function () {
    $client = authenticate();
    $prn = PixelboxxResourceName::prnFromResource($client, PixelboxxResourceName::ASSET, '123');
    expect((string)$prn)->toBe('prn:pboxx-pixelboxx:default:::::asset,123');
});
