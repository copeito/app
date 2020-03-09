<?php
namespace copeito\db;

use Singleton;

class Db extends \PDO
{
    use Singleton{
        getInstance as protected singletonGetInstance;
    }

    protected function __construct(array $args)
    {
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
        }catch (PDOException $e){
            echo $e->getMessage();
        }
    }

    public static function getInstance(...$args) : Db
    {
        if (!$args){
            $args = (include 'config.php');
        }

        return static::singletonGetInstance($args);
    }
}
