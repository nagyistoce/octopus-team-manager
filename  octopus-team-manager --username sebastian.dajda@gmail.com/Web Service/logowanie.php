
<?php

include('login.php');

$connect = mysql_connect($db_host, $db_username, $db_password);
if (!$connect)
{
    die ('Nie mo¿na po³¹czyæ siê z baz¹ danych');
}

$db_select = mysql_select_db($db_database);
if (!$db_select)
{
    die ('Baza danych nie istnieje');
}

$query = 'SELECT * FROM uzytkownicy WHERE Login like "O%"';
$result = mysql_query($query);
if (!$result)
{
    die ('Blad zapytania do SQL');
}

while($rekord = mysql_fetch_array($result))
           $output[]=$rekord;
		   
	    print(json_encode($output));  

mysql_close($connect);

?>