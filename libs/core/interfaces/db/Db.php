<?php
namespace core\interfaces\db;

interface Db
{
    public function tables(string $filter = null) : array;

    public function table(string $filter = null) : \db\Table;

    public function query(string $stmt) : \PDOStatement;
}
