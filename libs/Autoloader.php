<?php
/**
 *    Autoloading classes loading class with suport to aliasses
 *    @author David Rey
 */
class Autoloader
{
    protected static $instance;

    protected $Libs;

    /**
     *    Protected constructor to force to use "init" method to instantiate
     *    an object (part of singleton pattern implementation)
     *    @method __construct
     *    @author David Rey
     *    @since  2020-02-23T16:40:30+010
     */
    protected function __construct()
    {
        $this->Libs = json_decode(
            file_get_contents('../config/Autoloader/libs.json'),
        );
    }

    /**
     *    Initialices autoloader
     *    @method init
     *    @author David Rey
     *    @since  2020-02-23T16:41:35+010
     *    @return void
     */
    public static function init()
    {
        if (!static::$instance){
            static::$instance = new static();
        }

        spl_autoload_register(
            array(
                static::$instance,
                'load'
            )
        );
    }

    /**
     *    Loading class method
     *    @method load
     *    @author David Rey
     *    @since  2020-02-23T16:42:10+010
     *    @param  string
     *    @return void
     */
    public function load(string $class)
    {
        if (@$this->Libs->$class){
            include_once $this->Libs->$class->path;

            class_alias(
                $this->Libs->$class->name,
                $class
            );
        }else{
            include_once '../libs/'.str_replace('\\', '/', $class).'.php';
        }
    }
}
