<?php
namespace App\Views;

use Core\View;
class Navigation extends View
{
 public function render(string $template_path = ROOT . '/app/templates/navigation.tpl.php')
 {
     return parent::render($template_path);
 }
}