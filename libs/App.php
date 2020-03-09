<?php
/**
 *    App framework class
 *    @author David Rey
 */
class App
{
    use Singleton;

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
        $Db = Db::getInstance();
        echo "Run <br>";
    }
}
