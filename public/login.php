<?php

require_once '../bootloader.php';

use App\Views\Forms\Auth\Login;
use App\Views\Navigation;
use App\Users\Model;
use App\Views\Forms\Hero;

if (App\App::$session->getUser()) {
    header('Location: /index.php');
}

function form_success(&$form, $input)
{
    $user_data = Model::getWhere(['email' => $input['email']]);

    $user = $user_data[0];
    App\App::$session->login($user->email, $user->password);

    header('Location: index.php');
}

function form_fail(&$form, $input)
{
    $form['message'] = 'Failed to log in';
}

$viewLogin = new Login();

$viewLogin->validate();

$login_html = $viewLogin->render();
$navigationView = new Navigation();
$navigation_html = $navigationView->render();
$heroView = new Hero();
$hero_html = $heroView->render();

?>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Login</title>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css">
		<link rel="stylesheet" href="assets/css/style.css">
	</head>
	<body>
        <?php print $navigation_html; ?>
        <?php print $hero_html; ?>
		<main class="main-login">
			<div class="wrapper animate__animated animate__slideInRight">
                <?php print $login_html; ?>
			</div>
		</main>
	</body>
</html>