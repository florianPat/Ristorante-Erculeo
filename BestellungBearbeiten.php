<?php

require 'Classes/ProductOrder.php';
$productOrder = new ProductOrder('test');

if($productOrder->processOrder())
{
	echo('Ihre Bestellung wurde erfolgreich übermittelt!');
}
else
{
	echo('Ihre Bestellung konnte leider nicht übermittelt werden!');
}