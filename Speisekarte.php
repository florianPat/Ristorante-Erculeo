<?php
	require 'Classes/ProductOrder.php';

	$productOrder = new ProductOrder('test');
?>

<div class="PictureAndDescription">
	<?php
		$tableName = 'pizza';
		$productOrder->showProductsInTable($tableName, 'SELECT * FROM ' . $tableName);
	?>
</div>
<div class="PictureAndDescription">
	<p>Du hast Hunger? Dann bestell doch einfach!<br></p>
	<input type="button" onclick="location.href='index.php?page=Bestellen';" value="Bestellen" />
</div>