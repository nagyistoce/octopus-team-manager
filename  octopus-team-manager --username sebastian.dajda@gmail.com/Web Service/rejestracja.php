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

$zmienna_przyslana = $_REQUEST['login'];
$zmienna_przyslana2 = $_REQUEST['password'];

$query = "insert into uzytkownicy (Login, Haslo)values('".$zmienna_przyslana."','".$zmienna_przyslana2."')";

$result = mysql_query($query);
if (!$result)
{
die ('Blad zapytania do SQL');
}


?>