<?php

require_once '../bootloader.php';

use App\Views\Navigation;
use App\Views\Forms\Carts\CatalogData;
use App\Cart\Items\Item;
use App\Views\Forms\Carts\AddItem;
use App\App;
use App\Cart\Items\Model;
use App\Views\Forms\Hero;

function add_success(&$form, $input)
{
    $item = new Item([
        'drink_id' => $input['id'],
        'user_id' => App::$session->getUser()->id
    ]);

    Model::insert($item);
}

$add_item = new AddItem();

$add_item->validate();

$catalogView = new CatalogData();
$catalog_html = $catalogView->render();
$navigationView = new Navigation();
$navigation_html = $navigationView->render();
$heroView = new Hero();
$hero_html = $heroView->render();
?>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Bottle-shop</title>
		<link rel="stylesheet" href="assets/css/style.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css">
		<script src="assets/js/app.js" defer></script>
	</head>
	<body>
        <?php print $navigation_html; ?>
        <?php print $hero_html; ?>
		<main>
			<div class="wrapper-catalog animate__animated animate__slideInRight">
                <?php print $catalog_html; ?>
			</div>
		</main>
	</body>
</html>
