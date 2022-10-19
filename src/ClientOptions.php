<?php

declare(strict_types=1);

/*
 * This file is part of the "fairway_pixelboxx_saas_api" library by eCentral GmbH.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace Fairway\PixelboxxSaasApi;

use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;

/**
 * @internal
 */
final class ClientOptions
{
    private string $domain = '';
    private string $userAgent = 'Fairway Pixelboxx SaaS API Client';
    private bool $debug = false;
    private int $timeout = 300;
    private string $serverId = 'pboxx-pixelboxx';
    private string $tenant = 'default';

    private ?LoggerInterface $logger = null;

    public function __construct(string $domain)
    {
        $this->setDomain($domain);
    }

    public function setDomain(string $domain): self
    {
        $this->domain = $domain;

        return $this;
    }

    public function setLogger(LoggerInterface $logger): self
    {
        $this->logger = $logger;

        return $this;
    }

    public function getDomain(): string
    {
        return $this->domain;
    }

    public function getLogger(): LoggerInterface
    {
        return $this->logger ?? new NullLogger();
    }

    public function getTimeout(): int
    {
        return $this->timeout;
    }

    public function getUserAgent(): string
    {
        return $this->userAgent;
    }

    public function setUserAgent(string $userAgent): self
    {
        $this->userAgent = $userAgent;

        return $this;
    }

    public function isDebug(): bool
    {
        return $this->debug;
    }

    public function setDebug(bool $debug): self
    {
        $this->debug = $debug;

        return $this;
    }

    public function setTimeout(int $timeout): self
    {
        $this->timeout = $timeout;

        return $this;
    }

    public function setTenant(string $tenant): self
    {
        $this->tenant = $tenant;
        return $this;
    }

    public function getTenant(): string
    {
        return $this->tenant;
    }

    public function setServerId(string $serverId): self
    {
        $this->serverId = $serverId;
        return $this;
    }

    public function getServerId(): string
    {
        return $this->serverId;
    }
}
