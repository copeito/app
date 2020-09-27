<?php
namespace core\interfaces;

abstract class Db
{
    abstract public function query(string $stmt);
}
