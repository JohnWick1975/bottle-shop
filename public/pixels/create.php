<?php

require_once '../../bootloader.php';

if (!\App\App::$session->getUser()) {
    print json_encode('neprisijungs');
    exit();
}

$form = [
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
        ]
    ],
    'validators' => [
        'validate_pixel_modifiable'
    ],
    'callbacks' => [
        'success' => 'form_success',
        'fail' => 'form_fail'
    ]
];

function form_success($form, $input)
{
    $pixel = new \App\Pixels\Pixel($input);
    $pixel->email = \App\App::$session->getUser()->email;
    $id = \App\Pixels\Model::insert($pixel);
    print json_encode($id);
}

function form_fail($form, $input)
{
    print 'neveikia';
}

$form_values = sanitize_form_values($form);

if ($form_values) {
    validate_form($form, $form_values);
} else {
    print 'nieko nebuvo POST\'e';
}