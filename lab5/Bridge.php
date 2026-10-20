<?php

interface Renderer
{
    public function renderTitle(string $title): string;
    public function renderText(string $text): string;
    public function renderImage(string $url): string;
    public function renderField(string $name, string $value): string;
}

class HTMLRenderer implements Renderer
{
    public function renderTitle(string $title): string {}
    public function renderText(string $text): string {}
    public function renderImage(string $url): string {}
    public function renderField(string $name, string $value): string {}
}

class JsonRenderer implements Renderer
{
    public function renderTitle(string $title): string {}
    public function renderText(string $text): string {}
    public function renderImage(string $url): string {}
    public function renderField(string $name, string $value): string {}
}

class XmlRenderer implements Renderer
{
    public function renderTitle(string $title): string {}
    public function renderText(string $text): string {}
    public function renderImage(string $url): string {}
    public function renderField(string $name, string $value): string {}
}

abstract class Page
{
    protected Renderer $renderer;

    public function setRenderer(Renderer $renderer): void {}

    abstract public function view(): string;
}

class SimplePage extends Page
{
    private string $title;
    private string $content;

    public function setTitle(string $title): void {}
    public function setContent(string $content): void {}

    public function view(): string {}
}

class Product
{
    private string $id;
    private string $name;
    private string $description;
    private string $image;

    public function setId(string $id): void {}
    public function setName(string $name): void {}
    public function setDescription(string $description): void {}
    public function setImage(string $image): void {}

    public function getId(): string {}
    public function getName(): string {}
    public function getDescription(): string {}
    public function getImage(): string {}
}

class ProductPage extends Page
{
    private Product $product;

    public function setProduct(Product $product): void {}

    public function view(): string {}
}

$product = new Product();
$product->setId('1');
$product->setName('Ноутбук');
$product->setDescription('Потужний ноутбук для роботи');
$product->setImage('laptop.jpg');

$renderers = [new HTMLRenderer(), new JsonRenderer(), new XmlRenderer()];

foreach ($renderers as $renderer) {
    $simplePage = new SimplePage();
    $simplePage->setRenderer($renderer);
    $simplePage->setTitle('Про нас');
    $simplePage->setContent('Текст сторінки');
    echo $simplePage->view();

    $productPage = new ProductPage();
    $productPage->setRenderer($renderer);
    $productPage->setProduct($product);
    echo $productPage->view();
}
