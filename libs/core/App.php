<?php
/**
 *    App framework class
 *    @author David Rey
 */
namespace core;

class App
{
    use \Singleton;

    use \LazyLoader {
        init as lazyLoaderInitializer;
    }

    protected function init()
    {
        $this->lazyLoaderInitializer(
            array(
                'db' => function(){
                    return new \db\Db;
                }
            )
        );
    }

    public function run()
    {
        echo "Tabla es ".$this->db->table();
    }
}
