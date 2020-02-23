<?php
/**
 *    App framework class
 *    @author David Rey
 */
use \db\Db;
use \db\Table;

class App
{
    use Singleton;

    public function __get($name)
    {
        switch($name){
            case 'config':
                $result = (include '../config/config.php');
                break;
        }

        return $this->{$name} = $result;
    }

    public function run()
    {
        echo "Run ".$this->config['db']['user'];
    }
}
