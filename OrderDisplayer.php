<div class="PictureAndDescription">
	<table>
	<?php
		require 'Classes/ProductOrder.php';

		$productOrder = new ProductOrder('test');
		$productOrder->showRowNamesInTable('orders');
	?>
		<tr id="firstRow" style="visibility: hidden;"></tr>
	</table>
</div>

<script type="text/javascript">
	let xhttp;

	if (window.XMLHttpRequest)
	{
	   xhttp = new XMLHttpRequest();
	}
	else
	{
	   xhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}

	function callback()
	{
		xhttp.open("GET", "GetOrders.php?timestamp=" + Date.now(), true);
		xhttp.send();
	}

	xhttp.onreadystatechange = function()
	{
		if (this.readyState == 4 && this.status == 200)
		{
			$('#firstRow').after(this.responseText);
			setTimeout(callback, 5000);
		}
	};
	xhttp.open("GET", "GetOrders.php?timestamp=0", true);
	xhttp.send();
</script>