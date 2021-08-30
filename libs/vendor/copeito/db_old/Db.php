<?php
namespace copeito\db;

class Db implements \core\interfaces\db\Db
{
    public static $Table = Table::class;

    protected $PDO;

    public function __construct(array $args = null)
    {
        if (!$args){
            $args = (include 'config.php');
        }

        $this->PDO = new \PDO(
            strtolower($args['server']['type']).':'.
                'host='.$args['server']['host'].';'.
                'dbname='.$args['db']['name'],
            $args['user']['name'],
            $args['user']['password'],
            array(
              \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
            )
        );
    }

    public function filter(string $filter = null) : array
    {
        $tables = array();

        foreach($this->query('show tables '.($filter ? 'like '.$filter : '')) as $row){
            $tables[] = new Table(
                $row[0]
            );
        }

        return $tables;
    }

    public function filterOne(string $filter = null) : Table
    {
        return array_pop(
            $this->filter($filter)
        );
    }

    public function query(string $stmt)
    {
        return $this->PDO->query($stmt);
    }
}
