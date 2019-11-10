<?php
namespace db;

use \traits\Multiton;

class Db extends \PDO
{
    use Multiton;
}
