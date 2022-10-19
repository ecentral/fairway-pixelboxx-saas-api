<?php

declare(strict_types = 1);

namespace Fairway\PixelboxxSaasApi\Utility;

use DateTime;

final class PixelboxxUtility
{
    public static function buildTimestamp(string $pixelboxxDate): int
    {
        $date = new DateTime($pixelboxxDate);

        return $date->getTimestamp();
    }
}
