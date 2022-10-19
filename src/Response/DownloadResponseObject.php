<?php

declare(strict_types = 1);

namespace Fairway\PixelboxxSaasApi\Response;

final class DownloadResponseObject extends ResponseObjectAbstract
{
    public string $data;

    public function getResponseType(): string
    {
        return 'contents';
    }

    public function fromContents(string $contents): ResponseObject
    {
        $this->data = $contents;

        return $this;
    }

    public function getContent(): string
    {
        return $this->data;
    }
}
