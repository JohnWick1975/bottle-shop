<?php

require_once '../bootloader.php';

use App\Users\User;
use Core\View;
use Core\Views\Form;
use App\Views\Navigation;

if (App\App::$session->getUser()) {
    header('Location: /index.php');
}

$form = [
    'attr' => [
        'method' => 'POST'
    ],
    'title' => 'Login',
    'fields' => [
        'email' => [
            'type' => 'text',
            'label' => 'Username:',
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
        ]
    ],
    'validators' => [
        'validate_login'
    ],
    'buttons' => [
        'submit' => [
            'title' => 'Log in'
        ]
    ],
    'callbacks' => [
        'success' => 'form_success',
        'fail' => 'form_fail'
    ]
];

function form_success(&$form, $input)
{
    $userData = App\App::$db->getRowWhere('users', ['email' => $input['email']]);

	$user = new User($userData);
    App\App::$session->login($user->email, $user->password);

    header('Location: index.php');
}

function form_fail(&$form, $input)
{
    $form['message'] = 'Failed to log in';
}

$viewLogin = new Form($form);
$viewNavigation = new Navigation();

$form_values = sanitize_form_values($viewLogin->getData());

if ($form_values) {
    $result = validate_form($viewLogin->getData(), $form_values);
}

$login_html = $viewLogin->render();
$navigation_html = $viewNavigation->render();

?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login</title>
        <link rel="stylesheet" href="assets/css/style.css">
    </head>
    <body>
        <?php print $navigation_html; ?>
        <main>
            <div class="wrapper">
                <?php print $login_html; ?>
            </div>
        </main>
    </body>
</html>