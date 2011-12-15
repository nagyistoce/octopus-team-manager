<?php
include('mysqli.php');
include('conf.php');

$dbquery = $_REQUEST['sql'];

try
{
	$ms = new mysqli_db($host, $user, $password, $dbname);
	if(ereg('SELECT', $dbquery)) 
		print(json_encode($ms->query_select($dbquery)));
	else
		$ms->query($dbquery);
}
catch (Exception $error)
{
	echo 'MYSQL Error!';
}
?>