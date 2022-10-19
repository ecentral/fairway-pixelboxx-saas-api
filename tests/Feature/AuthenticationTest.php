<?php

declare(strict_types = 1);

test('Access Token is given', function () {
    expect(authenticate()->getAccessToken())->not()->toBeEmpty();
})->group('Authentication');
