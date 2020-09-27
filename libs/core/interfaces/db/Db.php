<?php
namespace core\interfaces\db;

interface Db
{
    public function query(string $stmt);
}
