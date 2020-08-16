<?php
/**
 *    App framework class
 *    @author David Rey
 */
class App
{
    use Singleton;

    use LazyLoader {
        init as lazyLoaderInitializer;
    }

    protected function init()
    {
        $this->lazyLoaderInitializer(
            array(
                'db' => function(){
                    $db = new db\Db;

                    db\Table::$db = $db;

                    return new $db;
                }
            )
        );
    }

    /*public function __get($name)
    {
        switch($name){
            case 'config':
                $result = (include '../config/config.php');
                break;
        }

        return $this->{$name} = $result;
    }*/

    public function run()
    {
        /*foreach($this->db->query('show tables') as $table){
            echo $table['Tables_in_app']."<br>";
        }*/

        foreach($this->db::$Table::list() as $table){
            echo "Elem es ".$table."<br>";
        }
        echo "Run <br>";
    }
}
