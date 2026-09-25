<?php

interface QueryBuilder
{
    public function select(string $table, array $columns): self;
    public function where(string $condition): self;
    public function limit(int $limit): self;
    public function getSQL(): string;
}

final class PostgreSqlQueryBuilder implements QueryBuilder
{
    private string $table;
    private array $columns = [];
    private array $conditions = [];
    private ?int $limit = null;

    public function select(string $table, array $columns): self {}
    public function where(string $condition): self {}
    public function limit(int $limit): self {}
    public function getSQL(): string {}
}

final class MySqlQueryBuilder implements QueryBuilder
{
    private string $table;
    private array $columns = [];
    private array $conditions = [];
    private ?int $limit = null;

    public function select(string $table, array $columns): self {}
    public function where(string $condition): self {}
    public function limit(int $limit): self {}
    public function getSQL(): string {}
}

$postgresQuery = (new PostgreSqlQueryBuilder())
    ->select('users', ['id', 'name', 'email'])
    ->where('age > 18')
    ->limit(10)
    ->getSQL();

$mysqlQuery = (new MySqlQueryBuilder())
    ->select('orders', ['id', 'total'])
    ->where('status = "paid"')
    ->limit(5)
    ->getSQL();

echo $postgresQuery . PHP_EOL;
echo $mysqlQuery . PHP_EOL;