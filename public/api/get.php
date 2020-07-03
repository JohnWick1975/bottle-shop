<?php

 require_once '../../bootloader.php';

 use App\Drinks\Model;
use App\App;
use App\Users\User;

if (!App::$session->getUser() || App::$session->getUser()->role === User::ROLE_USER) {
    header('HTTP/1.0 401 Unauthorized');
    exit();
}

 $drinks = Model::getWhere([]);

 print json_encode($drinks);
