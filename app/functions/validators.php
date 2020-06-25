<?php

function validate_pixel_modifiable(array $filtered_input, array &$form, array $params = null)
{
    $pixel = new \App\Pixels\Pixel($filtered_input);
    $pixel = App\App::$db->getRowWhere('pixels', [
        'x' => $pixel->x,
        'y' => $pixel->y
    ]);

    if ($pixel && $pixel['email'] !== $_SESSION['email']) {
        $form['message'] = 'Negalima perrašyti';
        return false;
    }

    return true;
}
