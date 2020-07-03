<?php

require_once '../../bootloader.php';

use App\Drinks\Drink;
use App\Drinks\Model;
use App\Views\Forms\Drinks\DrinkEditForm;
use App\App;
use App\Users\User;

if (!App::$session->getUser() || App::$session->getUser()->role === User::ROLE_USER) {
    header('HTTP/1.0 401 Unauthorized');
    exit();
}

function form_success(&$form, $input)
{
    $drink = new Drink($input);
    Model::update($drink);
    print json_encode($drink);
}


$update = new DrinkEditForm();
$update->validate();
