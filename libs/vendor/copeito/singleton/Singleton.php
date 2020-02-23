<?php
/**
 *    Implements in user class the singleton pattern
 *    @author David Rey
 */
namespace copeito\singleton;

trait Singleton
{
    public static $instance;

    /**
     *    Retrieves an user class unique instance creating it if it not exist
     *    @method getInstance
     *    @author David Rey
     *    @since  2020-02-23T16:32:34+010
     *    @param  mixed                  $id [description]
     *    @return object
     */
    public static function getInstance($id = null) : object
    {
        if (!static::$instance){
            static::$instance = new static($id);

            if (method_exists(static::$instance, 'init')){
                static::$instance->init();
            }
        }

        return static::$instance;
    }

    /**
     *    Empty constructor which forces to user class to create protected constructors
     *    to prevent create instances from user class with the classic object
     *    creation instruction: $b = new B();
     *    @method __construct
     *    @author David Rey
     *    @since  2020-02-23T16:35:15+010
     *    @param  void
     */
    protected function __construct($id = null)
    {
    }
}
