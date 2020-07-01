<?php

require_once '../../../bootloader.php';

use App\Views\Navigation;
use App\App;
use App\Users\User;
use App\Drinks\Model;
use App\Views\Forms\Tables\TableData;
use App\Drinks\Drink;
use App\Views\Forms\DeleteForm;
use App\Views\Forms\Hero;

if (!App::$session->getUser() || App::$session->getUser()->role === User::ROLE_USER) {
    header('HTTP/1.0 401 Unauthorized');
    exit();
}

function delete_success(&$form, $input)
{
    $drink = new Drink($input);
    Model::delete($drink);
}

$delete_form = new DeleteForm();

$delete_form->validate();

$tableData = new TableData();
$view_template = $tableData->render();

$navigationView = new Navigation();
$navigation_html = $navigationView->render();
$heroView = new Hero();
$hero_html = $heroView->render();
?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>View</title>
        <link rel="stylesheet" href="../../assets/css/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css">
        <script src="../../assets/js/app.js" defer></script>
    </head>
    <body>
        <?php print $navigation_html; ?>
        <?php print $hero_html; ?>
        <main class="main-view">
            <div class="wrapper animate__animated animate__slideInRight">
                <?php print $view_template; ?>
            </div>
        </main>
    </body>
</html>
