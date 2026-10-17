<?php

interface Renderer
{
    public function renderTitle(string $title): string;
    public function renderText(string $text): string;
    public function renderImage(string $url): string;
    public function renderField(string $name, string $value): string;
}

final class HTMLRenderer implements Renderer
{
    public function renderTitle(string $title): string {}
    public function renderText(string $text): string {}
    public function renderImage(string $url): string {}
    public function renderField(string $name, string $value): string {}
}

final class JsonRenderer implements Renderer
{
    public function renderTitle(string $title): string {}
    public function renderText(string $text): string {}
    public function renderImage(string $url): string {}
    public function renderField(string $name, string $value): string {}
}

final class XmlRenderer implements Renderer
{
    public function renderTitle(string $title): string {}
    public function renderText(string $text): string {}
    public function renderImage(string $url): string {}
    public function renderField(string $name, string $value): string {}
}

abstract class Page
{
    public function __construct(protected Renderer $renderer) {}

    abstract public function view(): string;
}

final class SimplePage extends Page
{
    public function __construct(Renderer $renderer, private string $title, private string $content) {}

    public function view(): string {}
}

final class Product
{
    public function __construct(
        private string $id,
        private string $name,
        private string $description,
        private string $image
    ) {}

    public function getId(): string {}
    public function getName(): string {}
    public function getDescription(): string {}
    public function getImage(): string {}
}

final class ProductPage extends Page
{
    public function __construct(Renderer $renderer, private Product $product) {}

    public function view(): string {}
}

$product = new Product('1', 'Ноутбук', 'Потужний ноутбук для роботи', 'laptop.jpg');

$renderers = [new HTMLRenderer(), new JsonRenderer(), new XmlRenderer()];

foreach ($renderers as $renderer) {
    $simplePage = new SimplePage($renderer, 'Про нас', 'Текст сторінки');
    echo $simplePage->view();

    $productPage = new ProductPage($renderer, $product);
    echo $productPage->view();
}