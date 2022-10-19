<?php

declare(strict_types=1);

namespace Fairway\PixelboxxSaasApi\Model;

use Fairway\PixelboxxSaasApi\PixelboxxResourceName;

interface PixelboxxObjectInterface
{
    public function getName(): string;
    public function getId(): PixelboxxResourceName;
}
