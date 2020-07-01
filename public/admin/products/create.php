<?php
require_once '../../../bootloader.php';

use App\Views\Navigation;
use App\Users\User;
use App\App;
use App\Drinks\Drink;
use App\Views\Forms\Drinks\DrinkCreateForm;
use App\Drinks\Model;
use App\Views\Forms\Hero;

if (!App::$session->getUser() || App::$session->getUser()->role === User::ROLE_USER) {
    header('HTTP/1.0 401 Unauthorized');
    exit();
}

function form_success(&$form, $input)
{
    $drink = new Drink($input);

    Model::insert($drink);

    $form['message'] = 'Success';
}


function form_fail(&$form, $input)
{
    $form['message'] = 'Failed to Register';
}

$createView = new DrinkCreateForm();

$createView->validate();

$create_html = $createView->render();
$navigationView = new Navigation();
$navigation_html = $navigationView->render();
$heroView = new Hero();
$hero_html = $heroView->render();
?>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Create</title>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css">
		<link rel="stylesheet" href="../../assets/css/style.css">
	</head>
	<body>
        <?php print $navigation_html; ?>
        <?php print $hero_html; ?>
		<main class="main-create">
			<div class="wrapper animate__animated animate__slideInRight">
                <?php print $create_html; ?>
			</div>
		</main>
	</body>
</html>
