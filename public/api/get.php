<?php

 require_once '../../bootloader.php';

 use App\Drinks\Model;

 $drinks = Model::getWhere([]);

 print json_encode($drinks);
