<?php

require_once '../../bootloader.php';

use App\Views\Forms\Drinks\DrinkCreateForm;
use App\Drinks\Drink;
use App\Drinks\Model;
use App\App;
use App\Users\User;

if (!App::$session->getUser() || App::$session->getUser()->role === User::ROLE_USER) {
    header('HTTP/1.0 401 Unauthorized');
    exit();
}

$form = new DrinkCreateForm();
$form->validate();

function form_success(&$form, $input)
{
    $drink = new Drink($input);
    $drink->id = Model::insert($drink);
    print json_encode($drink);
}