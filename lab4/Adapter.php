<?php

interface Notification
{
    public function send(string $title, string $message);
}

class EmailNotification implements Notification
{
    private string $adminEmail;

    public function setAdminEmail(string $adminEmail): void {}

    public function send(string $title, string $message): void {}
}

class SlackApi
{
    private string $login;
    private string $apiKey;

    public function setLogin(string $login): void {}
    public function setApiKey(string $apiKey): void {}

    public function logIn(): void {}
    public function sendMessage(string $chatId, string $message): void {}
}

final class SlackNotificationAdapter implements Notification
{
    private SlackApi $slackApi;
    private string $chatId;

    public function setSlackApi(SlackApi $slackApi): void {}
    public function setChatId(string $chatId): void {}

    public function send(string $title, string $message): void {}
}

class SmsApi
{
    public function sendSms(string $phone, string $sender, string $text): void {}
}

final class SmsNotificationAdapter implements Notification
{
    private SmsApi $smsApi;
    private string $phone;
    private string $sender;

    public function setSmsApi(SmsApi $smsApi): void {}
    public function setPhone(string $phone): void {}
    public function setSender(string $sender): void {}

    public function send(string $title, string $message): void {}
}

function notifyAll(Notification $notification, string $title, string $message): void {}

$email = new EmailNotification();
$email->setAdminEmail('admin@example.com');
notifyAll($email, 'Заголовок', 'Повідомлення на email');

$slackApi = new SlackApi();
$slackApi->setLogin('slack_login');
$slackApi->setApiKey('slack_api_key');

$slack = new SlackNotificationAdapter();
$slack->setSlackApi($slackApi);
$slack->setChatId('chat_id_123');
notifyAll($slack, 'Заголовок', 'Повідомлення у Slack');

$sms = new SmsNotificationAdapter();
$sms->setSmsApi(new SmsApi());
$sms->setPhone('+380501234567');
$sms->setSender('MyCompany');
notifyAll($sms, 'Заголовок', 'Повідомлення по SMS');
