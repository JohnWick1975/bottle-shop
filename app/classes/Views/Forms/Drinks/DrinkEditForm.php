<?php


namespace App\Views\Forms\Drinks;


class DrinkEditForm extends DrinkForm
{
public function __construct($data = [])
{
    parent::__construct($data);
    $this->data['buttons']['submit']['title'] = 'Edit';
}
}