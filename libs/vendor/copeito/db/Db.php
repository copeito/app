<?php
namespace copeito\db;

class Db extends \PDO
{
    public static $Table = Table::class;

    protected $dbname;

    public function __construct(array $args = null)
    {
        if (!$args){
            $args = (include 'config.php');
        }

        try{
            parent::__construct(
                strtolower($args['server']['type']).':'.
                    'host='.$args['server']['host'].';'.
                    'dbname='.$args['db']['name'],
                $args['user']['name'],
                $args['user']['password'],
                array(
                  \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
                )
            );

            $this->dbname = $args['db']['name'];

        }catch (PDOException $e){
            echo $e->getMessage();
        }
    }

    public function __get($name) : string
    {
        $return = null;

        if ($name == 'dbname'){
            $return = $this->query('select database()')->fetchColumn();
        }

        return $return;
    }

    public function query(string $stmt)
    {
        return parent::query($stmt);
    }
}
