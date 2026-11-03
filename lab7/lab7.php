<?php

class Order
{
    private float $distance;
    private float $weight;

    public function setDistance(float $distance): void {}
    public function setWeight(float $weight): void {}

    public function getDistance(): float {}
    public function getWeight(): float {}
}

interface DeliveryStrategy
{
    public function calculateCost(Order $order): float;
}

class PickupStrategy implements DeliveryStrategy
{
    public function calculateCost(Order $order): float {}
}

class ExternalDeliveryStrategy implements DeliveryStrategy
{
    public function calculateCost(Order $order): float {}
}

class OwnDeliveryStrategy implements DeliveryStrategy
{
    public function calculateCost(Order $order): float {}
}

class DeliveryCalculator
{
    private DeliveryStrategy $strategy;

    public function setStrategy(DeliveryStrategy $strategy): void {}

    public function calculate(Order $order): float {}
}

$order = new Order();
$order->setDistance(5.5);
$order->setWeight(2.0);

$calculator = new DeliveryCalculator();

$calculator->setStrategy(new PickupStrategy());
$pickupCost = $calculator->calculate($order);

$calculator->setStrategy(new ExternalDeliveryStrategy());
$externalCost = $calculator->calculate($order);

$calculator->setStrategy(new OwnDeliveryStrategy());
$ownCost = $calculator->calculate($order);