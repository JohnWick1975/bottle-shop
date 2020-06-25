<?php

define('ROOT', __DIR__);
define('DB_FILE', ROOT . '/app/data/db.json');

session_start();

// Core Functions
require_once ROOT . '/core/functions/html.php';
require_once ROOT . '/core/functions/form.php';

//App functions
require_once ROOT . '/app/functions/validators.php';

//Autoload all classes
require_once ROOT . '/vendor/autoload.php';

$app = new App\App(DB_FILE);


