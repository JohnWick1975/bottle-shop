<?php


namespace App\Views\Forms\Carts;


use App\Cart\Items\Model;
use App\App;
use App\Views\Forms\DeleteForm;
use App\Views\Forms\Tables\Table;

class CartData extends Table
{
    public function __construct($data = [])
    {
        $data = [
            'attr' => [
                'class' => 'cart-table'
            ],

            'headings' => [
                'ID',
                'Name',
                'Price',
                'Action'
            ],
            'rows' => $this->getTableData()
        ];

        parent::__construct($data);
    }

    public function getTableData()
    {
        $items = Model::getWhere(['user_id' => App::$session->getUser()->id]);

        $row = [];

        foreach ($items as $item_id => $item) {

            $delete_form = new DeleteForm();
            $delete_form->getData()['fields']['id']['value'] = $item->id;

            $drink = $item->drink();

            $row[] = [
                'id' => $item_id,
                'name' => $drink->name,
                'price' => $drink->price,
                'button' => $delete_form->render()
            ];
        }

        return $row;
    }
}