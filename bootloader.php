<?php

define('ROOT', __DIR__);
define('DB_FILE', ROOT . '/app/data/db.json');

// Core Functions
require_once ROOT . '/core/functions/html.php';
require_once ROOT . '/core/functions/validators.php';

//App functions
require_once ROOT . '/app/functions/validators.php';

//Autoload all classes
require_once ROOT . '/vendor/autoload.php';

$app = new App\App(DB_FILE);


