<?php
namespace core;

include_once '../libs/core/Autoloader.php';

Autoloader::init();

App::getInstance()->run();
