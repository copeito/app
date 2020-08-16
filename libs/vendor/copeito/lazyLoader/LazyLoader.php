<?php
namespace copeito\lazyLoader;

class LazyLoaderException extends \Exception {};

trait LazyLoader
{
    protected $definitions = array();
    protected $cache = array();

    protected function init(array $args) : void
    {
        $this->definitions = $args;

        foreach($this->definitions as $var => $func){
            unset($this->{$var});
        }
    }

    protected function defined(string $var)
    {
        return ($this->definitions[$var] ? true : false);
    }

    protected function cached(string $var)
    {
        return ($this->cache[$var] ? true : false);
    }

    protected function cache($var) : void
    {
        $this->cache[$var] = $this->definitions[$var]($this);
    }

    protected function getCachedValue(string $var)
    {
        return $this->cache[$var];
    }

    protected function getValue(string $var)
    {
        if (!$this->defined($var)){
            throw new LazyLoaderException(
                'Property '.$var.' required not defined',
                1
            );
        }

        if (!$this->cached($var)){
            $this->cache($var);
        }

        return $this->getCachedValue($var);
    }

    public function __get(string $var)
    {
        return $this->getValue($var);
    }
}
