<?php

require 'DatabaseInteractor.php';

class ProductOrder
{
	private $databaseInteractor;

	function __construct($databaseName)
	{
		$this->databaseInteractor = new DatabaseInteractor($databaseName);
	}

	private function makeColum($string)
	{
		echo('<td><p style="font-size: 20px">' . $string . '</p></td>');
	}

	function showRowNamesInTable($tableName)
	{
		$firstRowToShow = 0;

		echo('<tr>');
		$columNames = $this->databaseInteractor->getColumNames($tableName);
		foreach($columNames as $element)
		{
			switch ($element) {
				case 'id':
				{
					++$firstRowToShow;
				}
				break;
				default:
				{
					$this->makeColum($element);
					break;
				}
			}
		}
		echo('</tr>');

		return $firstRowToShow;
	}

	function computeFirstRowToShow($tableName)
	{
		$firstRowToShow = 0;

		$columNames = $this->databaseInteractor->getColumNames($tableName);
		foreach($columNames as $element)
		{
			switch ($element) {
				case 'id':
				{
					++$firstRowToShow;
				}
				break;
				default:
				{
					break;
				}
			}
		}

		return $firstRowToShow;
	}

	function getRowFor($query, $firstRowToShow)
	{
		$rows = $this->databaseInteractor->queryResult($query);
		$size = count($rows[0]);
		foreach($rows as $row)
		{
			echo('<tr>');
			for($i = $firstRowToShow; $i < $size; ++$i)
			{
				$this->makeColum($row[$i]);
			}
			echo('</tr>');
		}
	}

	function showProductsInTable($tableName, $query)
	{
		echo('<table>');

		$firstRowToShow = $this->showRowNamesInTable($tableName);

		$this->getRowFor($query, $firstRowToShow);

		echo('</table>');
	}

	function showDropdownListFor($element, $tableName, $formName)
	{
		echo('<select name="' . $formName . '">');
		$this->databaseInteractor->queryResultAndUse('SELECT ' . $element . ', id FROM ' . $tableName, function($row) {
			echo('<option value="' . $row[1] . '">' . $row[0] . '</option>');
		});
		echo('</select>');
	}

	function processOrder()
	{
		if(!isset($_GET['pizzaId']) || !isset($_GET['sizeId']))
		{
			echo('not all get vars are set');
			return false;
		}

		$res = $this->databaseInteractor->prepare('SELECT * FROM pizza WHERE id=?');
		$bindValue = $_GET['pizzaId'];
		if(!$res->bind_param("i", $bindValue))
		{
		    echo ('Binding parameters failed: (' . $res->errno . ') ' . $res->error);
		    return false;
		}
		if(!$res->execute())
		{
		    echo ('Executing parameters failed: (' . $res->errno . ') ' . $res->error);
		    return false;
		}
		if($res->get_result()->num_rows == 0)
		{
			echo('pizza id is not set correctly!');
			return false;
		}

		$bindValue = $_GET['sizeId'];
		if(!$res->execute())
		{
		    echo ('Executing parameters failed: (' . $res->errno . ') ' . $res->error);
		    return false;
		}
		if($res->get_result()->num_rows == 0)
		{
			echo('size id is not set correctly!');
		}

		return $this->databaseInteractor->query('INSERT INTO orders (name, size) VALUES (' . $_GET['pizzaId'] . ', ' . $_GET['sizeId'] . ')');
	}
}