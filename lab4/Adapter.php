<?php

interface Notification
{
    public function send(string $title, string $message);
}

class EmailNotification implements Notification
{
    private $adminEmail;

    public function __construct(string $adminEmail)
    {
        $this->adminEmail = $adminEmail;
    }

    public function send(string $title, string $message): void
    {
        mail($this->adminEmail, $title, $message);
        echo "Sent email with title '$title' to '{$this->adminEmail}' that says '$message'.";
    }
}

class SlackApi
{
    public function __construct(private string $login, private string $apiKey) {}

    public function logIn(): void {}
    public function sendMessage(string $chatId, string $message): void {}
}

final class SlackNotificationAdapter implements Notification
{
    public function __construct(private SlackApi $slackApi, private string $chatId) {}

    public function send(string $title, string $message): void
    {
        $this->slackApi->sendMessage($this->chatId, $message);
    }
}

class SmsApi
{
    public function sendSms(string $phone, string $sender, string $text): void {}
}

final class SmsNotificationAdapter implements Notification
{
    public function __construct(private SmsApi $smsApi, private string $phone, private string $sender) {}

    public function send(string $title, string $message): void
    {
        $this->smsApi->sendSms($this->phone, $this->sender, $message);
    }
}

function notifyAll(Notification $notification, string $title, string $message): void
{
    $notification->send($title, $message);
}

$email = new EmailNotification('admin@example.com');
notifyAll($email, 'Заголовок', 'Повідомлення на email');

$slack = new SlackNotificationAdapter(new SlackApi('slack_login', 'slack_api_key'), 'chat_id_123');
notifyAll($slack, 'Заголовок', 'Повідомлення у Slack');

$sms = new SmsNotificationAdapter(new SmsApi(), '+380501234567', 'MyCompany');
notifyAll($sms, 'Заголовок', 'Повідомлення по SMS');