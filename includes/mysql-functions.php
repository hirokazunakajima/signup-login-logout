<?php
require("config.php");

// establish connection to db server and it will select database
// Returns : true or nothing(just error message)
function connect_db()
{
	global $dbhost,$dbuser,$dbpass,$dbname,$dblink;
	
	if($dblink = mysqli_connect($dbhost,$dbuser,$dbpass))
	{
		if(mysqli_select_db($dblink, $dbname))
		{
			return true;
		}
		else
		{
			die("Couldn't select database");
		}
	}
	else
	{
		die("Couldn't connect to server");
	}
}

// process any query I will pass.
// Returns: result if succeed , false if failed
function query($sql)
{
	global $dblink;
	
	if($result = mysqli_query($dblink,$sql))
	{
		return $result;
	}
	else
	{
		echo "query failed";
		return false;
	}
}

?>