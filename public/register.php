<?php

require_once '../bootloader.php';

use App\App;
use App\Users\User;
use App\Views\Forms\Auth\Register;
use App\Views\Navigation;
use App\Users\Model;
use App\Views\Forms\Hero;


if (App::$session->getUser()) {
    header('Location: /index.php');
}

function form_success(&$form, $input)
{
    $input['password'] = password_hash($input['password'], PASSWORD_BCRYPT);
    $user = new User($input);
    $user->role = User::ROLE_USER;

    Model::insert($user);

    header('Location: login.php');
}


function form_fail(&$form, $input)
{
    $form['message'] = 'Failed to Register';
}

$registerView = new Register();

$registerView->validate();

$register_html = $registerView->render();
$navigationView = new Navigation();
$navigation_html = $navigationView->render();
$heroView = new Hero();
$hero_html = $heroView->render();
?>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Register</title>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css">
		<link rel="stylesheet" href="assets/css/style.css">
	</head>
	<body>
        <?php print $navigation_html; ?>
        <?php print $hero_html; ?>
		<main class="main-register">
			<div class="wrapper animate__animated animate__slideInRight">
                <?php print $register_html; ?>
			</div>
		</main>
	</body>
</html>