<?php
/**
 *    Autoloading classes loading class with suport to aliasses
 *    @author David Rey
 */

class AutoloaderException extends Exception {}

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
        $Class = @$this->Libs->$class;

        if ($Class){
            include_once $Class->path;

            class_alias(
                $Class->name,
                $class
            );
        }else{
            include_once '../libs/'.str_replace('\\', '/', $class).'.php';
        }

        if (@$Class->interface){
            if (!class_implements($class, $Class->interface)){
                throw new AutoloaderException(
                    'La clase '.$class.' debe implementar la interfaz '.$Class->interface
                );
            }
        }
    }
}
