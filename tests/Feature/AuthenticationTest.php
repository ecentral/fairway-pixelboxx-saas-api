<?php

test('Access Token is given', function () {
    expect(authenticate()->getAccessToken())->not()->toBeEmpty();
})->group('Authentication');
