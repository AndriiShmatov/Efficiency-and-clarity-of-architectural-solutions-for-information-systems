<?php

interface StorageInterface
{
    public function connect(): void;
    public function uploadFile(string $userId, string $filePath): bool;
    public function downloadFile(string $userId, string $fileName): string;
    public function deleteFile(string $userId, string $fileName): bool;
    public function listFiles(string $userId): array;
}

final class LocalStorage implements StorageInterface
{
    private static ?LocalStorage $instance = null;

    private function __construct() {}
    private function __clone() {}
    public function __wakeup() {}

    public static function getInstance(): LocalStorage {}

    public function connect(): void {}
    public function uploadFile(string $userId, string $filePath): bool {}
    public function downloadFile(string $userId, string $fileName): string {}
    public function deleteFile(string $userId, string $fileName): bool {}
    public function listFiles(string $userId): array {}
}

final class S3Storage implements StorageInterface
{
    private static ?S3Storage $instance = null;

    private function __construct() {}
    private function __clone() {}
    public function __wakeup() {}

    public static function getInstance(): S3Storage {}

    public function connect(): void {}
    public function uploadFile(string $userId, string $filePath): bool {}
    public function downloadFile(string $userId, string $fileName): string {}
    public function deleteFile(string $userId, string $fileName): bool {}
    public function listFiles(string $userId): array {}
}

enum StorageType: string
{
    case LOCAL = 'local';
    case S3    = 's3';
}

final class StorageManager
{
    private static ?StorageManager $instance = null;
    private array $userStorageMap = [];

    private function __construct() {}
    private function __clone() {}
    public function __wakeup() {}

    public static function getInstance(): StorageManager {}

    public function setUserStorage(string $userId, StorageType $storageType): void {}
    public function getUserStorage(string $userId): StorageInterface {}
    private function resolveStorage(StorageType $storageType): StorageInterface {}
}

final class User
{
    private string $id;
    private string $name;

    public function __construct(string $id, string $name) {}

    public function getId(): string {}
    public function chooseStorage(StorageType $storageType): void {}
    public function uploadFile(string $filePath): bool {}
}