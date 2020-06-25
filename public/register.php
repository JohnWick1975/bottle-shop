<?php

require_once '../bootloader.php';

use App\App;
use App\Users\User;
use Core\Views\Form;
use App\Views\Navigation;

if (App::$session->getUser()) {
    header('Location: /index.php');
}

$form = [
    'attr' => [
        'method' => 'POST'
    ],
    'title' => 'Register',
    'fields' => [
        'email' => [
            'type' => 'text',
            'label' => 'Email:',
            'validators' => [
                'validate_field_not_empty'
            ],
            'extra' => [
                'attr' => [
                    'placeholder' => 'user@email.com',
                ]
            ]
        ],
        'password' => [
            'type' => 'password',
            'label' => 'Password:',
            'validators' => [
                'validate_field_not_empty'
            ],
            'extra' => [
                'attr' => [
                    'placeholder' => 'Password'
                ]
            ],
        ],
        'password_repeat' => [
            'type' => 'password',
            'label' => 'Password repeat:',
            'validators' => [
                'validate_field_not_empty'
            ],
            'extra' => [
                'attr' => [
                    'placeholder' => 'Password'
                ]
            ],
        ]
    ],
    'validators' => [
        'validate_fields_match' => [
            'password',
            'password_repeat'
        ],
        'validate_field_unique' => [
            'field' => 'email'
        ]
    ],
    'buttons' => [
        'submit' => [
            'title' => 'Register'
        ]
    ],
    'callbacks' => [
        'success' => 'form_success',
        'fail' => 'form_fail'
    ]
];

function form_success(&$form, $input)
{
    $input['password'] = password_hash($input['password'], PASSWORD_BCRYPT);
    $user = new User($input);

    $table_name = 'users';

    App::$db->createTable($table_name);
    App::$db->insertRow($table_name, $user->_getData());


    header('Location: login.php');
}


function form_fail(&$form, $input)
{
    $form['message'] = 'Failed to Register';
}

$registerView = new Form($form);
$navigationView = new Navigation();

$form_values = sanitize_form_values($registerView->getData());

if ($form_values) {
    $result = validate_form($registerView->getData(), $form_values);
}

$register_html = $registerView->render();
$navigation_html = $navigationView->render();
?>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Register</title>
		<link rel="stylesheet" href="assets/css/style.css">
	</head>
	<body>
        <?php print $navigation_html; ?>
		<main>
			<div class="wrapper">
                <?php print $register_html; ?>
			</div>
		</main>
	</body>
</html>