<?php

interface Downloader
{
    public function download(string $url): string;
}

class SimpleDownloader implements Downloader
{
    public function download(string $url): string {}
}

class CachingDownloader implements Downloader
{
    private array $cache = [];
    private Downloader $downloader;

    public function setDownloader(Downloader $downloader): void {}

    public function download(string $url): string {}
}

$downloader = new CachingDownloader();
$downloader->setDownloader(new SimpleDownloader());

$first = $downloader->download('https://example.com/file.zip');
$second = $downloader->download('https://example.com/file.zip');
