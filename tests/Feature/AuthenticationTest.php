<?php

declare(strict_types=1);

/*
 * This file is part of the "fairway_pixelboxx_saas_api" library by eCentral GmbH.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

test('Access Token is given', function () {
    expect(authenticate()->getAccessToken())->not()->toBeEmpty();
})->group('Authentication');
