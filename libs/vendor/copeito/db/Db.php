<?php
namespace db;

use \traits\Singleton;

class Db extends \PDO
{
    use Singleton;
}
