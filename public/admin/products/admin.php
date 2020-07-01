<?php

require_once '../../../bootloader.php';

use App\Views\Navigation;

use App\Views\Forms\Hero;


$navigationView = new Navigation();
$navigation_html = $navigationView->render();
$heroView = new Hero();
$hero_html = $heroView->render();
?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Pixel Wall</title>
        <link rel="stylesheet" href="../../assets/css/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css">
        <script src="../../assets/js/app.js" defer></script>
    </head>
    <body>
        <?php print $navigation_html; ?>
        <?php print $hero_html; ?>
        <main>
            <div class="wrapper-admin animate__animated animate__slideInRight">

            </div>
        </main>
    </body>
</html>
