<?php

require_once '../bootloader.php';

use App\Views\Forms\Carts\CartData;
use App\Views\Navigation;
use App\Cart\Items\Item;
use App\Cart\Items\Model;
use App\Views\Forms\DeleteForm;
use App\Views\Forms\Hero;

if (!App\App::$session->getUser()) {
    header('Location: /login.php');
}

function delete_success(&$form, $input)
{
    $item = new Item($input);
    Model::delete($item);
}

$delete_form = new DeleteForm();

$delete_form->validate();

$navigationView = new Navigation();
$navigation_html = $navigationView->render();
$heroViev = new Hero();
$hero_html = $heroViev->render();
$cartView = new CartData();
$cart_html = $cartView->render();
?>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Pixel Wall</title>
		<link rel="stylesheet" href="assets/css/style.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css">
		<script src="assets/js/app.js" defer></script>
	</head>
	<body>
        <?php print $navigation_html; ?>
        <?php print $hero_html; ?>
		<main>
			<div class="wrapper animate__animated animate__slideInRight">
                <?php print $cart_html; ?>
			</div>
		</main>
	</body>
</html>
