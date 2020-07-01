<?php

require_once '../../../bootloader.php';

use App\Views\Navigation;
use App\App;
use App\Drinks\Model;
use App\Drinks\Drink;
use App\Views\Forms\Drinks\DrinkEditForm;
use App\Users\User;
use App\Views\Forms\Hero;

if (!App::$session->getUser() || App::$session->getUser()->role === User::ROLE_USER) {
    header('HTTP/1.0 401 Unauthorized');
    exit();
}

function form_success(&$form, $input)
{
    $drink = new Drink($input);

    $drink->id = $_GET['id'];

    Model::update($drink);

    $form['message'] = 'Success update';
}


function form_fail(&$form, $input)
{
    $form['message'] = 'Failed to update';
}

function fill_Form(&$form, Drink $drink)
{
    $drink_data = $drink->_getData();
    foreach ($form['fields'] as $field_id => &$field) {
        $field['value'] = $drink_data[$field_id];
    }
}

$drink = Model::find($_GET['id']);

$editView = new DrinkEditForm();
fill_Form($editView->getData(), $drink);

$editView->validate();

$navigationView = new Navigation();
$navigation_html = $navigationView->render();
$heroView = new Hero();
$hero_html = $heroView->render();
$edit_html = $editView->render();
?>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Edit</title>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css">
		<link rel="stylesheet" href="../../assets/css/style.css">
	</head>
	<body>
        <?php print $navigation_html; ?>
        <?php print $hero_html; ?>
		<main class="main-edit">
			<div class="wrapper animate__animated animate__slideInRight">
                <?php print $edit_html; ?>
			</div>
		</main>
	</body>
</html>
