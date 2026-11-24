<?php

interface Mediator
{
    public function notify(FormComponent $sender, string $event): void;
}

class FormComponent
{
    protected $mediator;

    protected $enabled;

    public function setMediator(Mediator $mediator): void {}
    public function setEnabled(bool $enabled): void {}
    public function isEnabled(): bool {}
}

class DatePicker extends FormComponent
{
    private $date;

    public function setDate(string $date): void {}
    public function getDate(): string {}
}

class TimeSlotSelect extends FormComponent
{
    private $slots;

    public function setSlots(array $slots): void {}
    public function getSlots(): array {}
}

class Checkbox extends FormComponent
{
    private $checked;

    public function setChecked(bool $checked): void {}
    public function isChecked(): bool {}
}

class TextField extends FormComponent
{
    private $value;

    private $required;

    private $visible;

    public function setValue(string $value): void {}
    public function getValue(): string {}
    public function setRequired(bool $required): void {}
    public function isRequired(): bool {}
    public function setVisible(bool $visible): void {}
    public function isVisible(): bool {}
}

class OrderFormMediator implements Mediator
{
    private $datePicker;

    private $timeSlotSelect;

    private $otherRecipientCheckbox;

    private $pickupCheckbox;

    private $nameField;

    private $phoneField;

    public function setDatePicker(DatePicker $datePicker): void {}
    public function setTimeSlotSelect(TimeSlotSelect $timeSlotSelect): void {}
    public function setOtherRecipientCheckbox(Checkbox $checkbox): void {}
    public function setPickupCheckbox(Checkbox $checkbox): void {}
    public function setNameField(TextField $nameField): void {}
    public function setPhoneField(TextField $phoneField): void {}

    public function notify(FormComponent $sender, string $event): void {}

    private function updateTimeSlots(): void {}
    private function toggleRecipientFields(): void {}
    private function toggleDeliveryFields(): void {}
}

$datePicker = new DatePicker();
$timeSlotSelect = new TimeSlotSelect();
$otherRecipientCheckbox = new Checkbox();
$pickupCheckbox = new Checkbox();
$nameField = new TextField();
$phoneField = new TextField();

$mediator = new OrderFormMediator();
$mediator->setDatePicker($datePicker);
$mediator->setTimeSlotSelect($timeSlotSelect);
$mediator->setOtherRecipientCheckbox($otherRecipientCheckbox);
$mediator->setPickupCheckbox($pickupCheckbox);
$mediator->setNameField($nameField);
$mediator->setPhoneField($phoneField);

$datePicker->setMediator($mediator);
$timeSlotSelect->setMediator($mediator);
$otherRecipientCheckbox->setMediator($mediator);
$pickupCheckbox->setMediator($mediator);
$nameField->setMediator($mediator);
$phoneField->setMediator($mediator);

$datePicker->setDate('2026-12-01');
$otherRecipientCheckbox->setChecked(true);
$pickupCheckbox->setChecked(true);
