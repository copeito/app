<?php
namespace copeito\db;

class Db implements \core\interfaces\db\Db
{
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

    public function tables(string $filter = null) : array
    {
        $tables = array();

        foreach($this->query('show tables '.($filter ? 'like '.$filter : '')) as $row){
            $tables[] = new Table(
                $row[0]
            );
        }

        return $tables;
    }

    public function table(string $filter = null) : Table
    {
        return $this->tables($filter)[0];
    }

    public function query(string $stmt) : \PDOStatement
    {
        return $this->PDO->query($stmt);
    }
}
