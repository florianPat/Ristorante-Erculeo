<?php
	require 'Classes/ProductOrder.php';

	$productOrder = new ProductOrder('test');
?>

<div class="PictureAndDescription">
	<form action="/index.php" method="get">
		<input type="checkbox" name="page" value="BestellungAufgeben" style="display: none" checked>
		<?php
			$productOrder->showDropdownListFor('name', 'pizza', 'pizzaId');
			$productOrder->showDropdownListFor('size', 'sizes', 'sizeId');
		?>
		<input type="submit" value="Bestellen" />
	</form>
</div>