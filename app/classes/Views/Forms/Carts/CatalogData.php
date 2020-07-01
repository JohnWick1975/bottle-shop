<?php


namespace App\Views\Forms\Carts;

use App\Drinks\Model;
use Core\Views\Form;

class CatalogData extends Catalog
{
    public function __construct($catalog = [])
    {
        $data = $this->getCatalog();

        parent::__construct($data);
    }

    public function getCatalog()
    {
        $drinks = Model::getWhere([]);
        $cards_data = [];



        foreach ($drinks as $drink) {
            $add_item = new AddItem();

            $add_item->getData()['fields']['id']['value'] = $drink->id;

            $add = new Form($add_item->getData());



            $cards_data[] = [
                'price' => $drink->price,
                'image' => $drink->image,
                'name' => $drink->name,
                'percentage' => $drink->percentage,
                'size' => $drink->size,
                'amount' => $drink->amount,
                'button' => $add->render()
            ];
        }

        return $cards_data;
    }
}