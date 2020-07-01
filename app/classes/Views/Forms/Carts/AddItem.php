<?php


namespace App\Views\Forms\Carts;


use Core\Views\Form;

class AddItem extends Form
{
    public function __construct($data = [])
    {
        $add_item_form = [
            'attr' => [
                'method' => 'POST',
                'class' => 'add-item-form'
            ],
            'fields' => [
                'id' => [
                    'type' => 'hidden',
                ]
            ],
            'buttons' => [
                'submit' => [
                    'title' => 'Add to Cart',
                ]
            ],
            'callbacks' => [
                'success' => 'add_success'
            ]
        ];

        parent::__construct($add_item_form);
    }
}