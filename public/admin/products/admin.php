<?php

require_once '../../../bootloader.php';

use App\Views\Navigation;
use App\App;
use App\Views\Forms\Hero;
use App\Users\User;

if (!App::$session->getUser() || App::$session->getUser()->role === User::ROLE_USER) {
    header('HTTP/1.0 401 Unauthorized');
    exit();
}

$navigationView = new Navigation();
$navigation_html = $navigationView->render();
$heroView = new Hero();
$hero_html = $heroView->render();
?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Admin</title>
        <link rel="stylesheet" href="../../assets/css/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css">
        <script src="../../assets/js/main.js" defer></script>
    </head>
    <body>
        <?php print $navigation_html; ?>
        <?php print $hero_html; ?>
        <main id="admin" class="animate__animated animate__slideInRight">

        </main>
    </body>
</html>
