<?php

class Product
{
    public function getId(): int {}
}

class User
{
    public function getId(): int {}
    public function getEmail(): string {}
}

class Order
{
    public function getId(): int {}
    public function toJson(): string {}
}

class MessengerNotifier
{
    public function send(string $message): void {}
}

abstract class EntityUpdater
{
    public function update(int $id, array $data): array {}

    abstract protected function getEntity(int $id);

    protected function validate($entity, array $data): bool {}
    protected function buildSaveRequest($entity, array $data): array {}
    protected function buildResponse($entity, bool $isValid): array {}

    protected function prepareData(array $data): array {}
    protected function onValidationFailed($entity, array $data): void {}
    protected function getExtraResponseData($entity): array {}
}

class ProductUpdater extends EntityUpdater
{
    private $notifier;

    public function setNotifier(MessengerNotifier $notifier): void {}

    protected function getEntity(int $id) {}
    protected function onValidationFailed($entity, array $data): void {}
}

class UserUpdater extends EntityUpdater
{
    protected function getEntity(int $id) {}
    protected function prepareData(array $data): array {}
}

class OrderUpdater extends EntityUpdater
{
    protected function getEntity(int $id) {}
    protected function getExtraResponseData($entity): array {}
}

$productUpdater = new ProductUpdater();
$productUpdater->setNotifier(new MessengerNotifier());
$productResponse = $productUpdater->update(1, array('name' => 'Піца', 'price' => 150));

$userUpdater = new UserUpdater();
$userResponse = $userUpdater->update(2, array('name' => 'Іван', 'email' => 'new@example.com'));

$orderUpdater = new OrderUpdater();
$orderResponse = $orderUpdater->update(3, array('status' => 'paid'));
