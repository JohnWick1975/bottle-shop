<?php

namespace Core\Views;

use Core\View;
class Form extends View
{
    public function render($template_path = ROOT . '/core/templates/form.tpl.php')
    {
        return parent::render($template_path);
    }
}