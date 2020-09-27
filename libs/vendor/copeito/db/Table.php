<?php
namespace copeito\db;

class Table
{
    protected $name;

    public static $db;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public static function list() : array
    {
        $tables = [];

        foreach (static::$db->query('show tables') as $row){
            $tables[] = new table(
                $row[0]
            );
        }

        return $tables;
    }

    public function filter() : array
    {
        $records = [];

        foreach (static::$db->query('select * from '.$this->name) as $row){
            $records = new Record($this, $row);
        }

        return $records;
    }

    public function getFields() : array
    {
        return array(
            'uno',
            'dos'
        );
    }

    public function getRecords() : array
    {

    }

    public function getData() : array
    {

    }

    public function __toString() : string
    {
        return $this->name;
    }
}
