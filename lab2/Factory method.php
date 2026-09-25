<?php

interface SocialNetwork
{
    public function login(): void;
    public function publish(string $message): bool;
}

final class Facebook implements SocialNetwork
{
    public function __construct(private string $login, private string $password) {}

    public function login(): void {}
    public function publish(string $message): bool {}
}

final class LinkedIn implements SocialNetwork
{
    public function __construct(private string $email, private string $password) {}

    public function login(): void {}
    public function publish(string $message): bool {}
}

abstract class SocialNetworkConnector
{
    abstract public function createNetwork(): SocialNetwork;

    public function publishPost(string $message): bool {}
}

final class FacebookConnector extends SocialNetworkConnector
{
    public function __construct(private string $login, private string $password) {}

    public function createNetwork(): SocialNetwork {}
}

final class LinkedInConnector extends SocialNetworkConnector
{
    public function __construct(private string $email, private string $password) {}

    public function createNetwork(): SocialNetwork {}
}

$facebookConnector = new FacebookConnector('user_login', 'user_password');
$facebookConnector->publishPost('Hello');

$linkedInConnector = new LinkedInConnector('user@example.com', 'user_password');
$linkedInConnector->publishPost('Hello!');