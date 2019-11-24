<?php
namespace db;

use \traits\Multiton;
use \traits\LazyLoader;

class Table
{
    use Multiton;
    use LazyLoader {
        init as traitInitializer;
    }

    public $db;

    protected function init()
    {
        $this->traitInitializer(
            array(
                'db' => function(){
                    print "cacheando...<br>";
                    return Db::getInstance();
                }
            )
        );

        echo 'db es '.get_class($this->db).'<br>';
        echo 'ins '.static::$instances.'<br>';
    }

    public function getFields() : array
    {
        return array(
            'uno',
            'dos'
        );
    }

    public function getRecords() : array
    {

    }

    public function getData() : array
    {

    }
}
