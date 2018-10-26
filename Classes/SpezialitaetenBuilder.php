<?php

class SpezialitaetenBuilder
{
	static function buildList()
	{
		$path = '/opt/lampp/htdocs/Spezialitaeten/';
		assert(is_dir($path));
		$files = scandir($path);

		foreach($files as $filename)
		{
			if(strpos($filename, '_') || strlen($filename) === 2 || strlen($filename) === 1)
			{
				continue;
			}
			$dotPos = strrpos($filename, '.');
			if($dotPos === false)
			{
				continue;
			}
			else
			{
				$extension = substr($filename, $dotPos + 1);
				if(strlen($extension) > 0)
				{
					assert($extension === 'png' || $extension === 'jpeg');
				}

				echo('<div class="PictureAndDescription"><img src="Spezialitaeten/' . $filename . '" width="50%" /><p>' . substr($filename, 0, $dotPos) . '</p></div>');
			}
		}
	}
}