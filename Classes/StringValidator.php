<?php 

class StringValidator
{
	public static function validate($string)
	{
		return ctype_alpha($string) ? $string : 'Home';
	}
}