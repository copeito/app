<?php
namespace traits;

trait Multiton
{
    protected static $instances = array();

    final public static function getInstance(...$args)
    {
        $class = static::class;

        $id = implode('.', func_get_args());

        if (!static::$instances[$class][$id]){
            static::$instances[$class][$id] = new $class(...$args);

            if (method_exists($class, 'init')){
                static::$instances[$class][$id]->init();
            }
        }

        return static::$instances[$class][$id];
    }

    protected function __construct($id = null)
    {
    }
}
