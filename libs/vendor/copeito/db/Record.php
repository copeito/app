<?php
namespace copeito\db;

class Record
{
    protected $data = array();

    protected $table;

    public static $Table = Table::class;

    public function __construct(object $table, array $data)
    {
        $this->table = $table;
        $this->data = $data;
    }
}
