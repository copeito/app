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

        try{
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
        }catch (PDOException $e){
            echo $e->getMessage();
        }
    }

    public function query(string $stmt)
    {
        return $this->PDO->query($stmt);
    }
}
