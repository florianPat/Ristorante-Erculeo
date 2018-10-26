<?php

class NavBuilder
{
	function __construct($elements, $pageName)
	{
		echo('<nav><ul>');

		foreach($elements as $element)
		{
			$activeString = $element === $pageName ? 'class="active"' : '';
			
			echo('<li><a ' . $activeString . 'href="index.php?page=' . $element . '"">' . $element . '</a></li>');
		}

		echo('</ul></nav>');
	}
}