<?php
class mysqli_db
	{
	public function __construct($host, $user, $password, $dbname)
		{
		// Łączymy się z bazą danych
		IF(!$this->mysqli = new mysqli($host, $user, $password))
			{
			$this->error = true;
			// W przypadku niepowodzenia połączenia wygeneruj wyjątek
			throw new Exception('Błąd Połączenia z Bazą Danych - '.$this->mysqli->error, $this->mysqli->errno);
			}
		// wybieramy bazę danych
		IF(!$this->mysqli->select_db($dbname))
			{
			$this->error = true;
			// W przypadku niepowodzenia wybrania bazy wygeneruj wyjątek
			throw new Exception('Nie można wybrać bazy danych - '.$this->mysqli->error, $this->mysqli->errno);
			}
		// ustawiamy "tryb" transakcji dla tabel InnoDB
		$this->mysqli->autocommit(false);
		$this->mysqli->query('SET AUTOCOMMIT = 0');
		$this->mysqli->query('BEGIN');
		}
	// Wykonywanie zapytań nie zwracających wartości (nie-Select)
	public function query($query)
		{
		IF(!ereg('SELECT', $query) and !$this->error)
			{
			IF(!$result = $this->mysqli->query($query))
				{
				$this->error = true;
				throw new Exception('Błąd wykonania zapytania - ('.$query.') - '.$this->mysqli->error, $this->mysqli->errno);
				}
			else
				{
				return true;
				}
			}
		}
	// Zapytania z SELECT zwrócą nam od razu tablicę asocjacyjną z wynikami
	public function query_select($query)
		{
		IF(!$this->error)
			{
			IF(!$result = $this->mysqli->query($query))
				{
				$this->error = true;
				throw new Exception('Błąd wykonania zapytania - ('.$query.') - '.$this->mysqli->error, $this->mysqli->errno);
				}
			while($row = $result->fetch_assoc())
				{
				$return[] = $row;
				}
			unset($result);
			unset($row);
			return $return;
			}
		}
	// ID pola autoincrement użyte w ostatnim zapytaniu INSERT
	public function insert_id()
		{
		return $this->mysqli->insert_id;
		}
	public function escape($string)
		{
		return  $this->mysqli->real_escape_string($string);
		}
	// Destruktor
	public function __destruct()
		{
		IF(!$this->error)
			{
			$this->mysqli->query('COMMIT');
			}
		else
			{
			$this->mysqli->query('ROLLBACK');
			}
		unset($this->mysqli);
		unset($this->error);
		}
	}
?>