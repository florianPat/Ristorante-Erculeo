<?php

require 'Classes/ProductOrder.php';

$productOrder = new ProductOrder('test');
$tableName = 'orders';
$productOrder->getRowFor('SELECT * FROM ' . $tableName, $productOrder->computeFirstRowToShow($tableName));