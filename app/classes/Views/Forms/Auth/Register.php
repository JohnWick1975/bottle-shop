<?php

namespace App\Views\Forms\Auth;

use Core\Views\Form;

class Register extends Form
{
    public function __construct($data = [])
    {
        $data = [
            'attr' => [
                'method' => 'POST',
                'class' => 'register'
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

        parent::__construct($data);
    }
}