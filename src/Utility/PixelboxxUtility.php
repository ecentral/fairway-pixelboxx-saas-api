<?php

declare(strict_types=1);

/*
 * This file is part of the "fairway_pixelboxx_saas_api" library by eCentral GmbH.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

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
