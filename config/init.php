<?php

//start Session

session_start();

//Config File
require_once 'config.php';

//Include Helpers
require_once 'helpers/system_helper.php';

//AutoLoader
spl_autoload_register(function ($class_name) {

    require_once 'lib/' . $class_name . '.php';
});

//echo 'test';
  