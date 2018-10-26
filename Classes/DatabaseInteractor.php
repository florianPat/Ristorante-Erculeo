<?php

class DatabaseInteractor
{
	private $mysqli;

	private function showError($errorText)
	{
		echo($errorText . ' (' . $this->mysqli->errno . ') ' . $this->mysqli->error);
	}

	function __construct($databaseName)
	{
		$this->mysqli = new mysqli('localhost', 'root', '', $databaseName);
		if($this->mysqli->connect_errno)
		{
			echo("Failed to connect to MySQL: (" . $this->mysqli->connect_errno . ") " . $this->mysqli->connect_error);
		}
	}

	function __destruct()
	{
		if(!$this->mysqli->close())
		{
			$this->showError('Failed to close the database connection!');
		}
	}

	function query($queryResult)
	{
		$res = $this->mysqli->query($queryResult);

		if(!$res)
		{
			$this->showError('Failed to query!');
		}

		return $res;
	}

	function queryResult($queryResult)
	{
		$res = $this->mysqli->query($queryResult);

		if(!$res)
		{
			$this->showError('Failed to query!');
		}

		$result = $res->fetch_all();

		$res->free_result();

		return $result;
	}

	function queryResultAndUse($queryResult, $function)
	{
		$res = $this->mysqli->query($queryResult);

		if(!$res)
		{
			$this->showError('Failed to query!');
		}

		while($row = $res->fetch_array())
		{
			$function($row);
		}

		$res->free_result();
	}

	function getColumNames($tableName)
	{
		$res = $this->mysqli->query('SELECT * FROM ' . $tableName . ' LIMIT 1');

		if(!$res)
		{
			$this->showError('Failed to query!');
		}

		$colums = $res->fetch_fields();

		$result = array();

		foreach($colums as $element)
		{
			array_push($result, $element->name);
		}

		$res->free_result();

		return $result;
	}

	function prepare($query)
	{
		$res = $this->mysqli->prepare($query);

		if(!$res)
		{
			$this->showError('Failed to query!');
		}

		return $res;
	}
}