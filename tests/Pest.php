<?php

declare(strict_types=1);

/*
 * This file is part of the "fairway_pixelboxx_saas_api" library by eCentral GmbH.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

// uses(Tests\TestCase::class)->in('Feature');

/*
|--------------------------------------------------------------------------
| Expectations
|--------------------------------------------------------------------------
|
| When you're writing tests, you often need to check that values meet certain conditions. The
| "expect()" function gives you access to a set of "expectations" methods that you can use
| to assert different things. Of course, you may extend the Expectation API at any time.
|
*/

use Fairway\PixelboxxSaasApi\Client;

expect()->extend('toBeOne', function () {
    return $this->toBe(1);
});

/*
|--------------------------------------------------------------------------
| Functions
|--------------------------------------------------------------------------
|
| While Pest is very powerful out-of-the-box, you may have some testing code specific to your
| project that you don't want to repeat in every file. Here you can also expose helpers as
| global functions to help you to reduce the number of lines of code in your test files.
|
*/

function withClient(): Client
{
    $domain = getenv('PIXELBOXX_DOMAIN') ?: '';
    if ($domain === '') {
        throw new \Exception('PIXELBOXX_DOMAIN not given');
    }
    return Client::createWithDomain($domain);
}

function authenticate(): Client
{
    $username = getenv('PIXELBOXX_USER') ?: '';
    if ($username === '') {
        throw new \Exception('PIXELBOXX_USER not given');
    }
    $password = getenv('PIXELBOXX_PASSWORD') ?: '';
    if ($password === '') {
        throw new \Exception('PIXELBOXX_PASSWORD not given');
    }

    return withClient()->authenticate($username, $password);
}
