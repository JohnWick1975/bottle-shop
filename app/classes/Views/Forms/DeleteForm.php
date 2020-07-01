<?php


namespace App\Views\Forms;


use Core\Views\Form;

class DeleteForm extends Form
{
    public function __construct($data = [])
    {
        $delete_form = [
            'attr' => [
                'method' => 'POST',
                'class' => 'delete-form'
            ],
            'fields' => [
                'id' => [
                    'type' => 'hidden',
                ]
            ],
            'buttons' => [
                'submit' => [
                    'title' => '&#10006;'
                ]
            ],
            'callbacks' => [
                'success' => 'delete_success'
            ]
        ];
        parent::__construct($delete_form);
    }
}