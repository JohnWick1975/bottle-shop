<?php


namespace App\Views\Forms\Tables;

use Core\View;

class Table extends View
{


    public function render(string $template_path = ROOT . '/core/templates/table.tpl.php')
    {
        return parent::render($template_path);
    }
}



