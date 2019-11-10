<?php
spl_autoload_register(function($class)
{
    include_once '../libs/'.str_replace('\\', '/', $class).'.php';
});

App::getInstance()->run();
