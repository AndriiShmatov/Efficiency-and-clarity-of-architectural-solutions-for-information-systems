<?php

interface Downloader
{
    public function download(string $url): string;
}

class SimpleDownloader implements Downloader
{
    public function download(string $url): string {}
}

final class CachingDownloader implements Downloader
{
    private array $cache = [];

    public function __construct(private Downloader $downloader) {}

    public function download(string $url): string {}
}

$downloader = new CachingDownloader(new SimpleDownloader());

$first = $downloader->download('https://example.com/file.zip');
$second = $downloader->download('https://example.com/file.zip');