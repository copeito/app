<?php
namespace copeito\db;

class Query
{
    /*public static $db;

    protected $stmt;

    public function __construct(string $stmt)
    {
        $this->stmt = $stmt;

    }

    public function run()
    {
        return static::$db->query($this->stmt);
    }*/

    /*use LazyLoader {
        init as lazyLoaderInitializer
    }*/

    /*protected $db;*/

    /*protected function init()
    {
        $this->lazyLoaderInitializer(
            array(
                'db' => function(){
                    return Db::getInstance();
                }
            )
        );
    }*/

    /*public function run(string $stmt) : Statement
    {
        $this->db->query($stmt);
    }*/

    /*protected function compileSet(array $fields) : string
    {
        $set = '';

        foreach($fields as $field => $value){
            $set = ($set ? 'set' : ',').' '.$field.' = :'.$field
        }
    }

    public function __construct()
    {

    }

    public static function insert(Table $table, array $fields) : void
    {
        $db = Db::getInstance();

        $db->prepare(
            'insert into '.$table.' '.$this->compileSet($fields)
        )
    }*/
}
