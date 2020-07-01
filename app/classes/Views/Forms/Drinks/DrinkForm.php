<?php

namespace App\Views\Forms\Drinks;

use Core\Views\Form;

class DrinkForm extends Form
{
    public function __construct($data = [])
    {
        $form = [
            'attr' => [
                'method' => 'POST',
                'class' => 'create-edit'
            ],
            'title' => 'Add',
            'fields' => [
                'name' => [
                    'type' => 'text',
                    'label' => 'Name of Drink:',
                    'validators' => [
                        'validate_field_not_empty'
                    ],
                    'extra' => [
                        'attr' => [
                            'placeholder' => 'Exp. Lithuanica',
                        ]
                    ]
                ],
                'percentage' => [
                    'type' => 'text',
                    'label' => 'Alk. percentage:',
                    'validators' => [
                        'validate_field_not_empty'
                    ],
                    'extra' => [
                        'attr' => [
                            'placeholder' => 'Exp. 40'
                        ]
                    ],
                ],
                'size' => [
                    'type' => 'text',
                    'label' => 'Size (ml):',
                    'validators' => [
                        'validate_field_not_empty'
                    ],
                    'extra' => [
                        'attr' => [
                            'placeholder' => 'Exp. 700'
                        ]
                    ],
                ],
                'amount' => [
                    'type' => 'text',
                    'label' => 'Amount:',
                    'validators' => [
                        'validate_field_not_empty'
                    ],
                    'extra' => [
                        'attr' => [
                            'placeholder' => '10'
                        ]
                    ],
                ],
                'price' => [
                    'type' => 'text',
                    'label' => 'Price €:',
                    'validators' => [
                        'validate_field_not_empty'
                    ],
                    'extra' => [
                        'attr' => [
                            'placeholder' => '14.99'
                        ]
                    ],
                ],
                'image' => [
                    'type' => 'text',
                    'label' => 'Picture:',
                    'validators' => [
                        'validate_field_not_empty'
                    ],
                    'extra' => [
                        'attr' => [
                            'placeholder' => 'Exp. http://....'
                        ]
                    ],
                ],
            ],
            'buttons' => [
                'submit' => [

                ]
            ],
            'callbacks' => [
                'success' => 'form_success',
                'fail' => 'form_fail'
            ]
        ];

        parent::__construct($form);
    }
}