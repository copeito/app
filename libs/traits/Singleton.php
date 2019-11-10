<?php
namespace traits;

trait Singleton
{
    protected static $instance;

    final public static function getInstance($id = null)
    {
        if (!static::$instance){
            static::$instance = new static($id);

            if (method_exists(static::$instance, 'init')){
                static::$instance->init();
            }
        }

        return static::$instance;
    }

    protected function __construct($id = null)
    {
    }
}
