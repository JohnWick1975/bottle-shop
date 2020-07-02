<?php
require_once '../../bootloader.php';

use App\Views\Forms\DeleteForm;
use App\Drinks\Drink;
use App\Drinks\Model;

function delete_success(&$form, $input)
{
  $drink = new Drink($input);
  print Model::delete($drink);
}

$delete = new DeleteForm();
$delete->validate();
