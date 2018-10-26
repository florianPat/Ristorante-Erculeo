<div class="PictureAndDescription">
	<h1 style="color: white">Ihre Bestellung wird übermittelt! Bitte warten...</h1>
</div>

<script type="text/javascript">
	let getSuperglobal = new URLSearchParams(window.location.href);
	let urlString = "BestellungBearbeiten.php";
	let first = true;

	for (let p of getSuperglobal) {
		if(p[0].includes("page"))
		{
			continue;
		}
		else
		{
			let concatString;
			if(first)
			{
				first = false;
				concatString = "?" + p[0] + "=" + p[1];
				urlString += (concatString);
			}
			else
			{
				concatString = "&" + p[0] + "=" + p[1];
				urlString += (concatString);
			}
		}
	}

	console.log(urlString);

	$.get(urlString, function(responseText) {
		$('h1').text(responseText);
	});
</script>