<?php

require_once '../bootloader.php';

use Core\View;

if (!App\App::$session->getUser()) {
    header('Location: /login.php');
}

$wall = [
    'attr' => [
        'class' => 'pixel-wall',
    ],
    'pixels' => App\App::$db->getRowsWhere('pixels', [])
];

$view_wall = new View($wall);
$pixels_template = $view_wall->render(ROOT . '/app/templates/pixels.tpl.php');

?>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Pixel Wall</title>
		<link rel="stylesheet" href="assets/css/style.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css">
		<script src="assets/js/ecma.js" defer></script>
	</head>
	<body>
        <?php require_once ROOT . '/app/templates/navigation.tpl.php'; ?>
		<main>
            <?php print $pixels_template; ?>
			<button id="btn">Check</button>
		</main>
	</body>
</html>
