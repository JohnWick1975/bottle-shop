<?php


namespace App\Views\Forms\Tables;

use App\Drinks\Model;
use Core\View;
use App\Views\Forms\DeleteForm;

class TableData extends Table
{
    public function __construct(array $table = [])
    {
        $data = [
            'attr' => [
                'class' => 'drinks-table'
            ],

            'headings' => [
                'ID',
                'Name',
                'Percents',
                'Size',
                'In stock',
                'Price',
                'Action'
            ],
            'rows' => $this->getTableData()
        ];

        parent::__construct($data);
    }

    public function getTableData(): array
    {
        $drinks = Model::getWhere([]);

        $drinks_array = [];

        foreach ($drinks as $drink_key => $drink) {

            $link = [
                'title' => 'Edit',
                'attr' => [
                    'class' => 'links',
                    'target' => '_blank',
                    'href' => "edit.php?id=$drink->id"
                ]
            ];

            $edit = new View($link);

            $delete_form = new DeleteForm();

            $delete_form->getData()['fields']['id']['value'] = $drink->id;


            $drinks_array[] = [
                'id' => $drink->id,
                'name' => $drink->name,
                'percentage' => $drink->percentage,
                'size' => $drink->size,
                'amount' => $drink->amount,
                'price' => $drink->price,
                'edit' => [$edit->render(ROOT . '/core/templates/link.tpl.php'), $delete_form->render()]
            ];
        }

        return $drinks_array;
    }
}