<?php
namespace copeito\db;

class Table implements \core\interfaces\db\Table
{
    protected $name;

    protected static $db;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public static function setDb(\core\interfaces\db\Db $db)
    {
        static::$db = $db;
    }

    public function __toString() : string
    {
        return $this->name;
    }
}
