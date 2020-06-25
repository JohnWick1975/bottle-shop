<?php

require_once '../bootloader.php';

use App\App;
use App\Pixels\Pixel;
use Core\View;
use App\Views\Navigation;
use Core\Views\Form;
use App\Pixels\Model;


if (!App::$session->getUser()) {
    header('Location: /login.php');
}

$form = [
    'attr' => [
        'method' => 'POST'
    ],
    'title' => 'Add Pixel',
    'fields' => [
        'x' => [
            'type' => 'text',
            'validators' => [
                'validate_field_not_empty',
                'validate_field_is_numeric',
                'validate_field_range' => [
                    'min' => 0,
                    'max' => 500
                ]
            ],
            'extra' => [
                'attr' => [
                    'placeholder' => 'X coordinate',
                ]
            ]
        ],
        'y' => [
            'type' => 'text',
            'validators' => [
                'validate_field_not_empty',
                'validate_field_is_numeric',
                'validate_field_range' => [
                    'min' => 0,
                    'max' => 500
                ]
            ],
            'extra' => [
                'attr' => [
                    'placeholder' => 'Y coordinate'
                ]
            ],
        ],
        'color' => [
            'type' => 'select',
            'validators' => [
                'validate_field_not_empty',
            ],
            'options' => [
                'brown' => 'Ruda',
                'red' => 'Raudona',
                'green' => 'Zalia',
                'yellow' => 'Geltona'
            ],
            'extra' => [
                'attr' => [
                    'placeholder' => 'Spalva'
                ]
            ],
        ]
    ],
    'validators' => [
        'validate_pixel_modifiable'
    ],
    'buttons' => [
        'submit' => [
            'title' => 'Add pixel'
        ]
    ],
    'callbacks' => [
        'success' => 'form_success'
    ]
];

function form_success(&$form, $input)
{
    $table_name = 'pixels';
    App::$db->createTable($table_name);

    $pixel = new Pixel($input);


    $pixel->email = App::$session->getUser()->email;


    $pixels = Model::getWhere([
        'x' => $pixel->x,
        'y' => $pixel->y
    ]);

    if (isset($pixels[key($pixels)])) {
    	$pixel->id = $pixels[0]->id;
        Model::update($pixel);
        /*var_dump('cant update');*/
    } else {
        Model::insert($pixel);
    }


    /*header('Location: index.php');*/
}

$viewAdd = new Form($form);
$viewNavigation = new Navigation();

$form_values = sanitize_form_values($viewAdd->getData());

if ($form_values) {
    $result = validate_form($viewAdd->getData(), $form_values);
}

$add_html = $viewAdd->render();
$navigation_html = $viewNavigation->render();

?>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Add Pixel</title>
		<link rel="stylesheet" href="assets/css/style.css">
	</head>
	<body>
        <?php print $navigation_html; ?>
		<main>
			<div class="wrapper">
                <?php print $add_html; ?>
			</div>
		</main>
	</body>
</html>