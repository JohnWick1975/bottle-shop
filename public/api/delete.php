<?php
require_once '../../bootloader.php';

use App\Views\Forms\DeleteForm;
use App\Drinks\Drink;
use App\Drinks\Model;
use App\App;
use App\Users\User;

if (!App::$session->getUser() || App::$session->getUser()->role === User::ROLE_USER) {
    header('HTTP/1.0 401 Unauthorized');
    exit();
}

function delete_success(&$form, $input)
{
  $drink = new Drink($input);
  print json_encode(Model::delete($drink));
}

$delete = new DeleteForm();
$delete->validate();
