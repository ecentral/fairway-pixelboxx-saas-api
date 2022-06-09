<?php

declare(strict_types=1);

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
}
