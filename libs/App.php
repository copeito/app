<?php
use \db\Db;
use \db\Table;
use traits\Singleton;

class App
{
    use Singleton;

    public function __get($name)
    {
        switch($name){
            case 'config':
                $result = (include '../config/config.php');
                break;
            case 'db':
                $result = Db::getInstance(
                    'mysql:host='.$this->config['db']['host'].
                        ';dbname='.$this->config['db']['name'],
                    $this->config['db']['user'],
                    $this->config['db']['password']
                );
                break;
        }

        return $this->{$name} = $result;
    }

    public function run()
    {
        echo "Run ".$this->config['db']['user'];

        Table::$db = $this->db;
    }
}
