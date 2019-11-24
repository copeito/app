<?php
spl_autoload_register(function($class)
{
    $libs = (include '../config/libs.php');

    if ($libs[$class]){
        include_once $libs[$class];
    }else{
        include_once '../libs/'.str_replace('\\', '/', $class).'.php';
    }
});

class_alias('\copeito\singleton\Singleton', 'burri\Baralloco');

use \db\Db;
use \db\Table;
use burri\Baralloco;

class App
{
    use Baralloco;

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

        /*foreach(Table::getInstance('user')->getFields() as $field){
            echo $field."<br>";
        }*/

        //Table::$db = $this->db;
    }
}
