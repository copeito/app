<?php
/**
 *    Implements in user class multiton pattern
 *    @author David Rey
 */
namespace copeito\multiton;

trait Multiton
{
    private static $instances = array();

    /**
     *    Retrieves an user class unique instance for the parameters
     *    @method getInstance
     *    @author David Rey
     *    @since  2020-02-23T16:45:07+010
     *    @param  mixed                  $args [description]
     *    @return object
     */
    final public static function getInstance(...$args) : object
    {
        $id = null;

        $class = static::class;

        $id = json_encode($args);

        if (!@static::$instances[$class]){
            static::$instances[$class] = array();
        }

        if (!@static::$instances[$class][$id]){
            static::$instances[$class][$id] = new $class(...$args);

            if (method_exists($class, 'init')){
                static::$instances[$class][$id]->init();
            }
        }

        return static::$instances[$class][$id];
    }

    /**
     *    Empty constructor which forces to user class to create protected constructors
     *    to prevent create instances from user class with the classic object
     *    creation instruction: $b = new B();
     *    @method __construct
     *    @author David Rey
     *    @since  2020-02-23T16:46:52+010
     *    @param  void
     */
    protected function __construct($id = null)
    {
        if (method_exists($this, 'init')){
            $this->init();
        }
    }
}
