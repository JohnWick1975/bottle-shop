<?php

require_once '../../bootloader.php';

$pixels = \App\Pixels\Model::getWhere([]);

$json_string = json_encode($pixels);

print $json_string;