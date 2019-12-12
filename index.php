<?php

//	echo$_SERVER['REQUEST_URI'];
ini_set('display_errors','On');
//autoload
require __DIR__.'/vendor/autoload.php';

use Rentit\App;

App::run();
